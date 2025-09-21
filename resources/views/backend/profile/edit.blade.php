@extends('layouts.app-backend')

@push('css')
{{-- CDN untuk Select2 --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 {{ !session('tab') ? 'active' : '' }}" id="tab-edit-profile"
                        data-toggle="tab" href="#content-edit-profile" role="tab" aria-controls="content-edit-profile"
                        aria-selected="true">
                        <i class="ni ni-single-02 mr-2"></i>Edit Profil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 {{ session('tab') == 'password' ? 'active' : '' }}"
                        id="tab-change-password" data-toggle="tab" href="#content-change-password" role="tab"
                        aria-controls="content-change-password" aria-selected="false">
                        <i class="ni ni-lock-circle-open mr-2"></i>Ubah Password
                    </a>
                </li>
            </ul>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    {{-- TAB KONTEN EDIT PROFIL --}}
                    <div class="tab-pane fade {{ !session('tab') ? 'show active' : '' }}" id="content-edit-profile"
                        role="tabpanel">
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <h6 class="heading-small text-muted mb-4">Informasi Pengguna</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-4 text-center">
                                        <div class="form-group">
                                            <label class="form-control-label">Foto Profil</label>
                                            <img src="{{ $user->avatar ? Storage::url($user->avatar) : asset('assets/backend/img/avatars/user-default.png') }}"
                                                alt="preview" class="img-thumbnail rounded-circle mb-3"
                                                id="avatar-preview"
                                                style="width:150px; height:150px; object-fit: cover;">
                                            <div class="custom-file">
                                                <input type="file" name="avatar"
                                                    class="custom-file-input @error('avatar') is-invalid @enderror"
                                                    id="avatar" lang="id" accept="image/*">
                                                <label class="custom-file-label text-left" for="avatar">Pilih
                                                    gambar</label>
                                            </div>
                                            @error('avatar')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="name">Nama Lengkap</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span
                                                                class="input-group-text"><i
                                                                    class="ni ni-single-02"></i></span></div>
                                                        <input type="text" name="name" id="name"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            placeholder="Nama Lengkap"
                                                            value="{{ old('name', $user->name) }}" required>
                                                    </div>
                                                    @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="username">Username</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span
                                                                class="input-group-text"><i
                                                                    class="ni ni-circle-08"></i></span></div>
                                                        <input type="text" name="username" id="username"
                                                            class="form-control @error('username') is-invalid @enderror"
                                                            placeholder="Username"
                                                            value="{{ old('username', $user->username) }}" required>
                                                    </div>
                                                    @error('username')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="email">Email</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span
                                                                class="input-group-text"><i
                                                                    class="ni ni-email-83"></i></span></div>
                                                        <input type="email" name="email" id="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            placeholder="email@example.com"
                                                            value="{{ old('email', $user->email) }}" required>
                                                    </div>
                                                    @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="phone_number">No.
                                                        Telpon</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span
                                                                class="input-group-text"><i
                                                                    class="ni ni-mobile-button"></i></span></div>
                                                        <input type="text" name="phone_number" id="phone_number"
                                                            class="form-control @error('phone_number') is-invalid @enderror"
                                                            placeholder="No. Telpon"
                                                            value="{{ old('phone_number', $user->phone_number) }}"
                                                            required>
                                                    </div>
                                                    @error('phone_number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Form Khusus untuk Masyarakat --}}
                            @if ($user->level == 'masyarakat' && $user->masyarakat)
                            <hr class="my-4" />
                            <h6 class="heading-small text-muted mb-4">Informasi Kependudukan & Alamat</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="nik">NIK</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i
                                                            class="ni ni-badge"></i></span></div>
                                                <input class="form-control @error('nik') is-invalid @enderror"
                                                    placeholder="16 digit NIK" type="text" name="nik" id="nik"
                                                    value="{{ old('nik', $user->masyarakat->nik) }}" required>
                                            </div>
                                            @error('nik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="gender">Jenis Kelamin</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i
                                                            class="ni ni-favourite-28"></i></span></div>
                                                <select name="gender" id="gender"
                                                    class="form-control @error('gender') is-invalid @enderror" required>
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="laki-laki" {{ old('gender', $user->
                                                        masyarakat->gender) == 'laki-laki' ? 'selected' : ''
                                                        }}>Laki-laki</option>
                                                    <option value="perempuan" {{ old('gender', $user->
                                                        masyarakat->gender) == 'perempuan' ? 'selected' : ''
                                                        }}>Perempuan</option>
                                                </select>
                                            </div>
                                            @error('gender')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="address">Alamat Lengkap</label>
                                            <textarea name="address" id="address"
                                                class="form-control @error('address') is-invalid @enderror" rows="3"
                                                placeholder="Nama jalan, nomor rumah, dll."
                                                required>{{ old('address', $user->masyarakat->address) }}</textarea>
                                            @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label" for="rt">RT</label>
                                            <input type="text" name="rt" id="rt"
                                                class="form-control @error('rt') is-invalid @enderror" placeholder="001"
                                                value="{{ old('rt', $user->masyarakat->rt) }}" required>
                                            @error('rt')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label" for="rw">RW</label>
                                            <input type="text" name="rw" id="rw"
                                                class="form-control @error('rw') is-invalid @enderror" placeholder="002"
                                                value="{{ old('rw', $user->masyarakat->rw) }}" required>
                                            @error('rw')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="postal_code">Kode Pos</label>
                                            <input type="text" name="postal_code" id="postal_code"
                                                class="form-control @error('postal_code') is-invalid @enderror"
                                                placeholder="12345"
                                                value="{{ old('postal_code', $user->masyarakat->postal_code) }}"
                                                required>
                                            @error('postal_code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="province_id">Provinsi</label>
                                            <select name="province_id" id="province_id"
                                                class="form-control select2 @error('province_id') is-invalid @enderror"
                                                required disabled>
                                                @if ($province)
                                                <option value="{{ $province->id }}" selected>{{ $province->name }}
                                                </option>
                                                @endif
                                            </select>
                                            @if ($province)
                                            <input type="hidden" name="province_id" value="{{ $province->id }}">
                                            @endif
                                            @error('province_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="regency_id">Kabupaten/Kota</label>
                                            <select name="regency_id" id="regency_id"
                                                class="form-control select2 @error('regency_id') is-invalid @enderror"
                                                required>
                                                <option value="">Pilih Kabupaten/Kota</option>
                                                @foreach ($regencies as $regencyItem)
                                                <option value="{{ $regencyItem->id }}" {{ old('regency_id',
                                                    optional(optional($user->
                                                    masyarakat->village)->district)->regency_id) == $regencyItem->id ?
                                                    'selected' : '' }}>{{ $regencyItem->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('regency_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="district_id">Kecamatan</label>
                                            <select name="district_id" id="district_id"
                                                class="form-control select2 @error('district_id') is-invalid @enderror"
                                                required>
                                                <option value="">Pilih Kecamatan</option>
                                            </select>
                                            @error('district_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="village_id">Desa/Kelurahan</label>
                                            <select name="village_id" id="village_id"
                                                class="form-control select2 @error('village_id') is-invalid @enderror"
                                                required>
                                                <option value="">Pilih Desa/Kelurahan</option>
                                            </select>
                                            @error('village_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="text-right">
                                <a href="{{ route('profile.show') }}" class="btn btn-secondary"><i
                                        class="fas fa-arrow-left mr-2"></i>Batal</a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Simpan
                                    Perubahan</button>
                            </div>
                        </form>
                    </div>

                    {{-- TAB KONTEN UBAH PASSWORD --}}
                    <div class="tab-pane fade {{ session('tab') == 'password' ? 'show active' : '' }}"
                        id="content-change-password" role="tabpanel">
                        <form action="{{ route('profile.update-password') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="current_password">Password Saat Ini</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="ni ni-lock-circle-open"></i></span></div>
                                        <input type="password" name="current_password" id="current_password"
                                            class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
                                            placeholder="Masukkan password Anda saat ini" required>
                                    </div>
                                    @error('current_password', 'updatePassword')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="password">Password Baru</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="ni ni-key-25"></i></span></div>
                                        <input type="password" name="password" id="password"
                                            class="form-control @error('password', 'updatePassword') is-invalid @enderror"
                                            placeholder="Min. 8 karakter" required>
                                    </div>
                                    @error('password', 'updatePassword')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="password_confirmation">Konfirmasi Password
                                        Baru</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="ni ni-key-25"></i></span></div>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control" placeholder="Ulangi password baru" required>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <a href="{{ route('profile.show') }}" class="btn btn-secondary"><i
                                        class="fas fa-arrow-left mr-2"></i>Batal</a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Ubah
                                    Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.select2').select2({ theme: 'bootstrap-5' });

    $('#avatar').on('change', function(event){
        var fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').html(fileName || 'Pilih gambar');
        if(event.target.files[0]){
            var output = document.getElementById('avatar-preview');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() { URL.revokeObjectURL(output.src) }
        }
    });

    @if(Auth::user()->level == 'masyarakat' && Auth::user()->masyarakat)
        let initialRegencyId = '{{ old('regency_id', optional(optional($user->masyarakat->village)->district)->regency_id) }}';
        let initialDistrictId = '{{ old('district_id', optional($user->masyarakat->village)->district_id) }}';
        let initialVillageId = '{{ old('village_id', $user->masyarakat->village_id) }}';

        function loadDistricts(regencyId, selectedId) {
            if (regencyId) {
                $.post("{{ route('get-districts') }}", { _token: "{{ csrf_token() }}", regency_id: regencyId }, function(data) {
                    $('#district_id').empty().append('<option value="">Pilih Kecamatan</option>');
                    $.each(data, function(key, value) {
                        $('#district_id').append($('<option>', { value: value.id, text: value.name, selected: value.id == selectedId }));
                    });
                    $('#district_id').prop('disabled', false).trigger('change');
                });
            }
        }

        function loadVillages(districtId, selectedId) {
            if (districtId) {
                $.post("{{ route('get-villages') }}", { _token: "{{ csrf_token() }}", district_id: districtId }, function(data) {
                    $('#village_id').empty().append('<option value="">Pilih Desa/Kelurahan</option>');
                    $.each(data, function(key, value) {
                        $('#village_id').append($('<option>', { value: value.id, text: value.name, selected: value.id == selectedId }));
                    });
                    $('#village_id').prop('disabled', false);
                });
            }
        }

        // Initial Load on page open
        if ($('#regency_id').val()) {
            loadDistricts($('#regency_id').val(), initialDistrictId);
            if(initialDistrictId) {
                loadVillages(initialDistrictId, initialVillageId);
            }
        }

        // Event listener for user interaction
        $('#regency_id').on('change', function() {
            loadDistricts($(this).val(), null);
            $('#village_id').empty().append('<option value="">Pilih Desa/Kelurahan</option>').prop('disabled', true);
        });

        $('#district_id').on('change', function() {
            loadVillages($(this).val(), null);
        });
    @endif
});
</script>
@endpush