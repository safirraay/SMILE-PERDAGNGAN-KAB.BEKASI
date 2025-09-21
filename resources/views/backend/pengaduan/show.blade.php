@extends('layouts.app-backend')

@section('content')
<div class="row">
    <div class="col-lg-7">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Detail Pengaduan</h3>
                <div>
                    @if ($pengaduan->status == '0') <span class="badge badge-danger">Masuk</span>
                    @elseif ($pengaduan->status == 'proses') <span class="badge badge-warning">Diproses</span>
                    @else <span class="badge badge-success">Selesai</span>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <h4 class="mb-3">{{ $pengaduan->title }}</h4>
                <dl class="row">
                    <dt class="col-sm-4">Pelapor</dt>
                    <dd class="col-sm-8">: {{ optional(optional($pengaduan->masyarakat)->user)->name ?? 'N/A' }}</dd>
                    <dt class="col-sm-4">NIK</dt>
                    <dd class="col-sm-8">: {{ optional($pengaduan->masyarakat)->nik ?? 'N/A' }}</dd>
                    <hr class="col-12 my-2">
                    <dt class="col-sm-4">Tanggal Lapor</dt>
                    <dd class="col-sm-8">: {{ \Carbon\Carbon::parse($pengaduan->report_date)->isoFormat('dddd, D MMMM
                        Y') }}</dd>
                    <dt class="col-sm-4">Tanggal Kejadian</dt>
                    <dd class="col-sm-8">: {{ \Carbon\Carbon::parse($pengaduan->incident_date)->isoFormat('dddd, D MMMM
                        Y') }}</dd>
                    <dt class="col-sm-4">Lokasi Kejadian</dt>
                    <dd class="col-sm-8">: {{ $pengaduan->location }}</dd>
                    <hr class="col-12 my-2">
                    <dt class="col-sm-12">Isi Laporan:</dt>
                    <dd class="col-sm-12 mt-2">{{ $pengaduan->content }}</dd>
                </dl>
                @if($pengaduan->photo)
                <hr>
                <h5>Foto Bukti:</h5>
                <a href="{{ Storage::url($pengaduan->photo) }}" target="_blank">
                    <img src="{{ Storage::url($pengaduan->photo) }}" alt="Foto Bukti" class="img-fluid rounded"
                        style="max-height: 400px;">
                </a>
                @endif
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-secondary"><i
                        class="fas fa-arrow-left mr-2"></i>Kembali</a>
                <div>
                    @if(in_array(Auth::user()->level, ['admin', 'petugas']) && $pengaduan->status != 'selesai')
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tanggapanModal"><i
                            class="fas fa-reply mr-2"></i>Beri Tanggapan</button>
                    @elseif(Auth::user()->level == 'masyarakat' && $pengaduan->status == '0')
                    <a href="{{ route('pengaduan.edit', $pengaduan->id) }}" class="btn btn-primary"><i
                            class="fas fa-edit mr-2"></i>Edit Pengaduan</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="mb-0">Riwayat Tanggapan</h3>
            </div>
            <div class="card-body">
                @if($pengaduan->tanggapan->isEmpty())
                <div class="alert alert-warning text-center" role="alert"><i class="fas fa-info-circle mr-2"></i>Belum
                    ada tanggapan dari petugas.</div>
                @else
                <div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed">
                    @foreach($pengaduan->tanggapan->sortBy('created_at') as $item)
                    <div class="timeline-block">
                        <span class="timeline-step badge-success"><i class="ni ni-bell-55"></i></span>
                        <div class="timeline-content">
                            <div class="d-flex justify-content-between pt-1">
                                <div><span class="text-sm font-weight-bold">{{ $item->user->name }} ({{
                                        ucfirst($item->user->level) }})</span></div>
                                <small class="text-muted"><i class="fas fa-clock mr-1"></i>{{
                                    \Carbon\Carbon::parse($item->response_date)->diffForHumans() }}</small>
                            </div>
                            <p class="text-sm mt-1 mb-0">{{ $item->response }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@if(in_array(Auth::user()->level, ['admin', 'petugas']))
<div class="modal fade" id="tanggapanModal" tabindex="-1" role="dialog" aria-labelledby="tanggapanModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tanggapanModalLabel">Formulir Tanggapan & Verifikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('tanggapan.store') }}" method="POST">
                @csrf
                <input type="hidden" name="pengaduan_id" value="{{ $pengaduan->id }}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="response" class="form-control-label">Isi Tanggapan</label>
                        <textarea name="response" id="response"
                            class="form-control @error('response') is-invalid @enderror" rows="4"
                            placeholder="Ketikkan tanggapan Anda untuk pengaduan ini..."
                            required>{{ old('response') }}</textarea>
                        @error('response')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="status" class="form-control-label">Perbarui Status Pengaduan</label>
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror"
                            required>
                            <option value="proses" {{ $pengaduan->status == 'proses' || $pengaduan->status == '0' ?
                                'selected' : '' }}>Proses</option>
                            <option value="selesai" {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>Selesai
                            </option>
                        </select>
                        @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Kirim Tanggapan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection