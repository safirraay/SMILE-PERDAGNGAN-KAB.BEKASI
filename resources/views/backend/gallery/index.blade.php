@extends('layouts.app-backend')

@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">{{ $title }}</h3>
                    <a href="{{ route('gallery.create') }}" class="btn btn-primary"><i
                            class="fas fa-plus mr-2"></i>Tambah Foto</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-items-center w-100" id="gallery-table">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
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
<script>
    $(document).ready(function() {
    $('#gallery-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('gallery.data') }}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'image_preview', name: 'image_preview', orderable: false, searchable: false },
            { data: 'title', name: 'title' },
            { data: 'description', name: 'description' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
});

function deleteGallery(id) {
    Swal.fire({
        title: 'Anda yakin?', text: "Data galeri yang dihapus tidak dapat dikembalikan!", icon: 'warning',
        showCancelButton: true, confirmButtonColor: '#d33', cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!', cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/admin/gallery/${id}`, type: 'POST', data: { _method: 'DELETE', _token: "{{ csrf_token() }}" },
                success: function(response) {
                    iziToast.success({ title: 'Berhasil!', message: response.success, position: 'topRight' });
                    $('#gallery-table').DataTable().ajax.reload();
                },
                error: function(xhr) {
                    iziToast.error({ title: 'Gagal!', message: 'Terjadi kesalahan.', position: 'topRight' });
                }
            });
        }
    })
}
</script>
@endpush