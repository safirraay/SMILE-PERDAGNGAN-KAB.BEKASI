@extends('layouts.app-backend')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <form action="{{ route('pengaduan.update', $pengaduan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="mb-0">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-control-label">Judul Pengaduan</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i
                                        class="ni ni-ruler-pencil"></i></span></div><input type="text" name="title"
                                id="title" class="form-control @error('title') is-invalid @enderror"
                                placeholder="Ketik judul pengaduan..." value="{{ old('title', $pengaduan->title) }}"
                                required>
                        </div>
                        @error('title')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="incident_date" class="form-control-label">Tanggal Kejadian</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="ni ni-calendar-grid-58"></i></span></div><input
                                        name="incident_date" id="incident_date"
                                        class="form-control datepicker @error('incident_date') is-invalid @enderror"
                                        placeholder="Pilih tanggal" type="text"
                                        value="{{ old('incident_date', \Carbon\Carbon::parse($pengaduan->incident_date)->format('Y-m-d')) }}"
                                        required>
                                </div>
                                @error('incident_date')<div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="location" class="form-control-label">Lokasi Kejadian</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="ni ni-pin-3"></i></span></div><input type="text" name="location"
                                        id="location" class="form-control @error('location') is-invalid @enderror"
                                        placeholder="Contoh: Jl. Merdeka No. 10"
                                        value="{{ old('location', $pengaduan->location) }}" required>
                                </div>
                                @error('location')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="form-control-label">Isi Laporan / Pengaduan</label>
                        <textarea name="content" id="content"
                            class="form-control @error('content') is-invalid @enderror" rows="5"
                            placeholder="Tuliskan laporan Anda secara detail..."
                            required>{{ old('content', $pengaduan->content) }}</textarea>
                        @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="photo" class="form-control-label">Ganti Foto Bukti (Opsional)</label>
                        <div class="custom-file"><input type="file" name="photo"
                                class="custom-file-input @error('photo') is-invalid @enderror" id="photo" lang="id"
                                accept="image/*"><label class="custom-file-label text-left" for="photo">Pilih gambar
                                baru...</label></div>
                        @error('photo')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('pengaduan.show', $pengaduan->id) }}" class="btn btn-secondary"><i
                            class="fas fa-arrow-left mr-2"></i>Batal</a>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Simpan
                        Perubahan</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-4">
        <div class="card shadow">
            <div class="card-header">
                <h5 class="card-title mb-0">Preview Foto</h5>
            </div>
            <div class="card-body text-center p-4">
                <img src="{{ $pengaduan->photo ? Storage::url($pengaduan->photo) : asset('assets/backend/img/image-default.png') }}"
                    alt="preview" class="img-fluid rounded" id="photo-preview"
                    style="max-height: 300px; border: 1px solid #ddd;">
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
    $('.datepicker').datepicker({ format: 'yyyy-mm-dd', autoclose: true, todayHighlight: true });
    $('#photo').on('change', function(event){
        var fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').html(fileName || 'Pilih gambar baru...');
        if (event.target.files[0]) {
            var output = document.getElementById('photo-preview');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() { URL.revokeObjectURL(output.src) }
        }
    });
});
</script>
@endpush