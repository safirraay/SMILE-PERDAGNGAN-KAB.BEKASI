@extends('layouts.app-backend')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endpush

@section('header')
<div class="row">
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Total Post</h5><span
                            class="h2 font-weight-bold mb-0">{{ $total }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow"><i
                                class="fas fa-newspaper"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Berita</h5><span
                            class="h2 font-weight-bold mb-0">{{ $berita }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-info text-white rounded-circle shadow"><i class="fas fa-rss"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Pengumuman</h5><span
                            class="h2 font-weight-bold mb-0">{{ $pengumuman }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow"><i
                                class="fas fa-bullhorn"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Published</h5><span
                            class="h2 font-weight-bold mb-0">{{ $published }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-success text-white rounded-circle shadow"><i
                                class="fas fa-check-circle"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header border-0">
                <h3 class="mb-0"><i class="fas fa-filter mr-2"></i>Filter Postingan</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="category_filter" class="form-control-label">Filter berdasarkan kategori:</label>
                    <select class="form-control select2" id="category_filter">
                        <option value="semua">Semua Kategori</option>
                        <option value="Berita">Berita</option>
                        <option value="Pengumuman">Pengumuman</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">{{ $title }}</h3>
                    <a href="{{ route('posts.create') }}" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Tulis
                        Baru</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-items-center w-100" id="posts-table">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Penulis</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.select2').select2({ theme: 'bootstrap-5', width: '100%' });
    var table = $('#posts-table').DataTable({
        processing: true, serverSide: true,
        ajax: { url: '{{ route('posts.data') }}', data: function (d) { d.category = $('#category_filter').val(); }},
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'title', name: 'title' },
            { data: 'category', name: 'category' },
            { data: 'author', name: 'user.name' },
            { data: 'published_at', name: 'published_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
    $('#category_filter').on('change', function() { table.draw(); });
});
function deletePost(id) {
    Swal.fire({
        title: 'Anda yakin?', text: "Postingan yang dihapus tidak dapat dikembalikan!", icon: 'warning',
        showCancelButton: true, confirmButtonColor: '#d33', cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!', cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/posts/${id}`, type: 'POST', data: { _method: 'DELETE', _token: "{{ csrf_token() }}" },
                success: function(response) {
                    iziToast.success({ title: 'Berhasil!', message: response.success, position: 'topRight' });
                    $('#posts-table').DataTable().ajax.reload();
                },
                error: function(xhr) { iziToast.error({ title: 'Gagal!', message: 'Terjadi kesalahan.', position: 'topRight' }); }
            });
        }
    })
}
</script>
@endpush