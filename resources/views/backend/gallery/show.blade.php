@extends('layouts.app-backend')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="mb-0">{{ $title }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5 text-center">
                        <h4 class="mb-3">Gambar</h4>
                        <a href="{{ Storage::url($gallery->image) }}" target="_blank" title="Lihat gambar ukuran penuh">
                            <img src="{{ Storage::url($gallery->image) }}" alt="{{ $gallery->title }}"
                                class="img-fluid rounded shadow-lg" style="max-height: 400px; border: 1px solid #ddd;">
                        </a>
                    </div>
                    <div class="col-md-7">
                        <h4 class="mb-3">Detail Informasi</h4>
                        <dl class="row">
                            <dt class="col-sm-4">Judul</dt>
                            <dd class="col-sm-8">{{ $gallery->title }}</dd>

                            <dt class="col-sm-4">Deskripsi</dt>
                            <dd class="col-sm-8">{{ $gallery->description ?? '-' }}</dd>

                            <dt class="col-sm-4">Tanggal Unggah</dt>
                            <dd class="col-sm-8">{{ $gallery->created_at->isoFormat('D MMMM Y, HH:mm') }}</dd>

                            <dt class="col-sm-4">Terakhir Diperbarui</dt>
                            <dd class="col-sm-8">{{ $gallery->updated_at->isoFormat('D MMMM Y, HH:mm') }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="{{ route('gallery.index') }}" class="btn btn-secondary"><i
                        class="fas fa-arrow-left mr-2"></i>Kembali</a>
                <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-primary"><i
                        class="fas fa-edit mr-2"></i>Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection