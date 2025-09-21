@extends('layouts.app-backend')

@section('content')
<div class="row">
    <div class="col-md-8">
        <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="mb-0">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-control-label">Judul Foto</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i
                                        class="ni ni-ruler-pencil"></i></span></div><input type="text" name="title"
                                id="title" class="form-control @error('title') is-invalid @enderror"
                                placeholder="Ketik judul foto..." value="{{ old('title', $gallery->title) }}" required>
                        </div>
                        @error('title')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-control-label">Deskripsi (Opsional)</label>
                        <textarea name="description" id="description"
                            class="form-control @error('description') is-invalid @enderror" rows="3"
                            placeholder="Ketik deskripsi singkat mengenai foto...">{{ old('description', $gallery->description) }}</textarea>
                        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="image" class="form-control-label">Ganti File Gambar (Opsional)</label>
                        <div class="custom-file"><input type="file" name="image"
                                class="custom-file-input @error('image') is-invalid @enderror" id="image" lang="id"
                                accept="image/*"><label class="custom-file-label text-left" for="image">Pilih gambar
                                baru...</label></div>
                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti gambar. Ukuran maks
                            2MB.</small>
                        @error('image')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('gallery.index') }}" class="btn btn-secondary"><i
                            class="fas fa-arrow-left mr-2"></i>Batal</a>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Simpan
                        Perubahan</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-image mr-2"></i>Preview Gambar</h5>
            </div>
            <div class="card-body text-center p-4">
                <img src="{{ Storage::url($gallery->image) }}" alt="preview" class="img-fluid rounded"
                    id="image-preview" style="border: 1px solid #ddd;">
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
    $('#image').on('change', function(event){
        var fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').html(fileName || 'Pilih gambar baru...');
        if (event.target.files[0]) {
            var output = document.getElementById('image-preview');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() { URL.revokeObjectURL(output.src) }
        }
    });
});
</script>
@endpush