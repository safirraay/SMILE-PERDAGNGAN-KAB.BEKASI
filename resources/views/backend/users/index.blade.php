@extends('layouts.app-backend')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endpush

@section('header')
{{-- Card Statistik --}}
<div class="row">
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Total User</h5><span
                            class="h2 font-weight-bold mb-0">{{ $total }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow"><i
                                class="fas fa-users"></i></div>
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
                        <h5 class="card-title text-uppercase text-muted mb-0">Admin</h5><span
                            class="h2 font-weight-bold mb-0">{{ $admin }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow"><i
                                class="fas fa-user-shield"></i></div>
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
                        <h5 class="card-title text-uppercase text-muted mb-0">Petugas</h5><span
                            class="h2 font-weight-bold mb-0">{{ $petugas }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-info text-white rounded-circle shadow"><i
                                class="fas fa-user-tie"></i></div>
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
                        <h5 class="card-title text-uppercase text-muted mb-0">Masyarakat</h5><span
                            class="h2 font-weight-bold mb-0">{{ $masyarakat }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-secondary text-white rounded-circle shadow"><i
                                class="fas fa-user"></i></div>
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
        {{-- Card Filter --}}
        <div class="card shadow mb-4">
            <div class="card-header border-0">
                <h3 class="mb-0"><i class="fas fa-filter mr-2"></i>Filter Pengguna</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="level_filter" class="form-control-label">Filter berdasarkan peran:</label>
                    <select class="form-control select2" id="level_filter">
                        <option value="semua">Semua Peran</option>
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                        <option value="masyarakat">Masyarakat</option>
                    </select>
                </div>
            </div>
        </div>

        {{-- Card Tabel Data --}}
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">{{ $title }}</h3>
                    <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Tambah
                        Pengguna</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-items-center w-100" id="users-table">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Avatar</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Peran</th>
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
    var table = $('#users-table').DataTable({
        processing: true, serverSide: true,
        ajax: { url: '{{ route('users.data') }}', data: function (d) { d.level = $('#level_filter').val(); }},
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'avatar', name: 'avatar', orderable: false, searchable: false },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'level', name: 'level' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
    $('#level_filter').on('change', function() { table.draw(); });
});
function deleteUser(id) {
    Swal.fire({
        title: 'Anda yakin?', text: "Data pengguna yang dihapus tidak dapat dikembalikan!", icon: 'warning',
        showCancelButton: true, confirmButtonColor: '#d33', cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!', cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/users/${id}`, type: 'POST', data: { _method: 'DELETE', _token: "{{ csrf_token() }}" },
                success: function(response) {
                    iziToast.success({ title: 'Berhasil!', message: response.success, position: 'topRight' });
                    $('#users-table').DataTable().ajax.reload();
                },
                error: function(xhr) {
                    iziToast.error({ title: 'Gagal!', message: xhr.responseJSON.error, position: 'topRight' });
                }
            });
        }
    })
}
</script>
@endpush