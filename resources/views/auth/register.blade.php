@extends('layouts.app-auth')

@push('css')
{{-- CDN Select2 --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endpush

@section('content')
<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card bg-secondary shadow border-0">
                <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center text-muted mb-4">
                        <big>Form Registrasi Masyarakat</big>
                    </div>
                    <form role="form" action="{{ route('register.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            {{-- NIK --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-control-label" for="nik">NIK</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                        </div>
                                        <input class="form-control @error('nik') is-invalid @enderror"
                                            placeholder="16 digit NIK" type="text" name="nik" id="nik"
                                            value="{{ old('nik') }}" required>
                                        @error('nik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- Nama Lengkap --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-control-label" for="name">Nama Lengkap</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                        </div>
                                        <input class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Nama sesuai KTP" type="text" name="name" id="name"
                                            value="{{ old('name') }}" required>
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- Username --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-control-label" for="username">Username</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                        </div>
                                        <input class="form-control @error('username') is-invalid @enderror"
                                            placeholder="Username untuk login" type="text" name="username" id="username"
                                            value="{{ old('username') }}" required>
                                        @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- Email --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-control-label" for="email">Email</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Email aktif" type="email" name="email" id="email"
                                            value="{{ old('email') }}" required>
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- No Telpon --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-control-label" for="phone_number">No. Telpon</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                                        </div>
                                        <input class="form-control @error('phone_number') is-invalid @enderror"
                                            placeholder="Contoh: 08123456789" type="text" name="phone_number"
                                            id="phone_number" value="{{ old('phone_number') }}" required>
                                        @error('phone_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- Jenis Kelamin --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-control-label" for="gender">Jenis Kelamin</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-favourite-28"></i></span>
                                        </div>
                                        <select name="gender" id="gender"
                                            class="form-control @error('gender') is-invalid @enderror" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="laki-laki" {{ old('gender')=='laki-laki' ? 'selected' : ''
                                                }}>Laki-laki</option>
                                            <option value="perempuan" {{ old('gender')=='perempuan' ? 'selected' : ''
                                                }}>Perempuan</option>
                                        </select>
                                        @error('gender')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- Alamat --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="address">Alamat Lengkap</label>
                                    <textarea name="address" id="address"
                                        class="form-control form-control-alternative @error('address') is-invalid @enderror"
                                        rows="3" placeholder="Nama jalan, nomor rumah, dll."
                                        required>{{ old('address') }}</textarea>
                                    @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- RT / RW --}}
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label" for="rt">RT</label>
                                    <input type="text" name="rt" id="rt"
                                        class="form-control form-control-alternative @error('rt') is-invalid @enderror"
                                        placeholder="001" value="{{ old('rt') }}" required>
                                    @error('rt')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label" for="rw">RW</label>
                                    <input type="text" name="rw" id="rw"
                                        class="form-control form-control-alternative @error('rw') is-invalid @enderror"
                                        placeholder="002" value="{{ old('rw') }}" required>
                                    @error('rw')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- Kode Pos --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="postal_code">Kode Pos</label>
                                    <input type="text" name="postal_code" id="postal_code"
                                        class="form-control form-control-alternative @error('postal_code') is-invalid @enderror"
                                        placeholder="12345" value="{{ old('postal_code') }}" required>
                                    @error('postal_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- Provinsi --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="province_id">Provinsi</label>
                                    <select name="province_id" id="province_id"
                                        class="form-control select2 @error('province_id') is-invalid @enderror" required
                                        disabled>
                                        @if ($province)
                                        <option value="{{ $province->id }}" selected>{{ $province->name }}</option>
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
                            {{-- Kabupaten/Kota --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="regency_id">Kabupaten/Kota</label>
                                    <select name="regency_id" id="regency_id"
                                        class="form-control select2 @error('regency_id') is-invalid @enderror" required>
                                        <option value="">Pilih Kabupaten/Kota</option>
                                        @foreach ($regencies as $regency)
                                        <option value="{{ $regency->id }}" {{ old('regency_id')==$regency->id ?
                                            'selected' : '' }}>{{ $regency->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('regency_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- Kecamatan --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="district_id">Kecamatan</label>
                                    <select name="district_id" id="district_id"
                                        class="form-control select2 @error('district_id') is-invalid @enderror" required
                                        disabled>
                                        <option value="">Pilih Kecamatan</option>
                                    </select>
                                    @error('district_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- Desa/Kelurahan --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="village_id">Desa/Kelurahan</label>
                                    <select name="village_id" id="village_id"
                                        class="form-control select2 @error('village_id') is-invalid @enderror" required
                                        disabled>
                                        <option value="">Pilih Desa/Kelurahan</option>
                                    </select>
                                    @error('village_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- Password --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="password">Password</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Min. 8 karakter" type="password" name="password" id="password"
                                            required>
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- Konfirmasi Password --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="password_confirmation">Konfirmasi
                                        Password</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Ulangi password" type="password"
                                            name="password_confirmation" id="password_confirmation" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4">Buat Akun</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-center">
                    <a href="{{ route('auth.index') }}" class="text-light"><small>Sudah punya akun? Login di
                            sini</small></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
{{-- CDN Select2 --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        // Inisialisasi Select2
        $('.select2').select2({
            theme: 'bootstrap-5'
        });

        $('#regency_id').on('change', function() {
            let regencyId = $(this).val();
            if (regencyId) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('get-districts') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        regency_id: regencyId
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#district_id').empty().append(
                            '<option value="">Pilih Kecamatan</option>');
                        $('#village_id').empty().append(
                            '<option value="">Pilih Desa/Kelurahan</option>').prop(
                            'disabled', true);
                        if (response) {
                            $.each(response, function(key, value) {
                                $('#district_id').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                            $('#district_id').prop('disabled', false);
                        }
                    }
                });
            } else {
                $('#district_id').empty().append('<option value="">Pilih Kecamatan</option>').prop(
                    'disabled', true);
                $('#village_id').empty().append('<option value="">Pilih Desa/Kelurahan</option>')
                    .prop('disabled', true);
            }
        });

        $('#district_id').on('change', function() {
            let districtId = $(this).val();
            if (districtId) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('get-villages') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        district_id: districtId
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#village_id').empty().append(
                            '<option value="">Pilih Desa/Kelurahan</option>');
                        if (response) {
                            $.each(response, function(key, value) {
                                $('#village_id').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                            $('#village_id').prop('disabled', false);
                        }
                    }
                });
            } else {
                $('#village_id').empty().append('<option value="">Pilih Desa/Kelurahan</option>')
                    .prop('disabled', true);
            }
        });
    });
</script>
@endpush