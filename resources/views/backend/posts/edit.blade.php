@extends('layouts.app-backend')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
{{-- [UPDATE] Menambahkan CSS QuillJS --}}
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@section('content')
<form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" id="post-form">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="mb-0">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-control-label">Judul</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i
                                        class="ni ni-ruler-pencil"></i></span></div>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror" placeholder="Ketik judul..."
                                value="{{ old('title', $post->title) }}" required>
                        </div>
                        @error('title')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="body" class="form-control-label">Isi Konten</label>
                        {{-- [UPDATE] Mengganti textarea dengan div untuk QuillJS dan mengisi konten yang ada --}}
                        <div id="editor-container" style="height: 350px;">{!! old('body', $post->body) !!}</div>
                        <input type="hidden" name="body" id="body-input">
                        @error('body')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-cog mr-2"></i>Pengaturan</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="category" class="form-control-label">Kategori</label>
                        <select name="category" id="category"
                            class="form-control select2 @error('category') is-invalid @enderror" required
                            data-placeholder="Pilih Kategori">
                            <option></option>
                            <option value="Berita" {{ old('category', $post->category) == 'Berita' ? 'selected' : ''
                                }}>Berita</option>
                            <option value="Pengumuman" {{ old('category', $post->category) == 'Pengumuman' ? 'selected'
                                : '' }}>Pengumuman</option>
                        </select>
                        @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="image" class="form-control-label">Gambar Utama</label>
                        <img src="{{ $post->image ? Storage::url($post->image) : asset('assets/backend/img/image-default.png') }}"
                            alt="preview" class="img-fluid rounded mb-2" id="image-preview"
                            style="border: 1px solid #ddd;">
                        <div class="custom-file">
                            <input type="file" name="image"
                                class="custom-file-input @error('image') is-invalid @enderror" id="image" lang="id"
                                accept="image/*">
                            <label class="custom-file-label text-left" for="image">Pilih gambar baru...</label>
                        </div>
                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
                        @error('image')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('posts.index') }}" class="btn btn-secondary"><i
                                class="fas fa-arrow-left mr-2"></i>Batal</a>
                        <div>
                            @if($post->published_at)
                            <button type="submit" name="draft" class="btn btn-outline-primary">Simpan sebagai
                                Draft</button>
                            @endif
                            <button type="submit" name="publish" class="btn btn-primary"><i
                                    class="fas fa-save mr-2"></i>Simpan & Publish</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{-- [UPDATE] Menambahkan JS QuillJS --}}
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script>
    $(document).ready(function() {
    $('.select2').select2({ theme: 'bootstrap-5' });

    // [UPDATE] Inisialisasi QuillJS
    var quill = new Quill('#editor-container', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, false] }],
                ['bold', 'italic', 'underline'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                ['link', 'image'],
                ['clean']
            ]
        }
    });

    // [UPDATE] Hubungkan QuillJS dengan form submission
    var form = document.getElementById('post-form');
    form.onsubmit = function() {
        var bodyInput = document.getElementById('body-input');
        bodyInput.value = quill.root.innerHTML;
    };

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