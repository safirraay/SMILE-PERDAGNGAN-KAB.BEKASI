@extends('layouts.app-backend')

@section('content')
<div class="row">
    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
        {{-- Kartu Profil Utama --}}
        <div class="card card-profile shadow">
            <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                    <div class="card-profile-image"><a href="#"><img
                                src="{{ $user->avatar ? Storage::url($user->avatar) : asset('assets/backend/img/avatars/user-default.png') }}"
                                alt="User Avatar" class="rounded-circle"
                                style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #fff;"></a>
                    </div>
                </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                <div class="d-flex justify-content-between">
                    <a href="mailto:{{ $user->email }}" class="btn btn-sm btn-info mr-4"><i
                            class="fas fa-envelope mr-2"></i>Hubungi</a>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-default float-right"><i
                            class="fas fa-user-edit mr-2"></i>Edit Pengguna</a>
                </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
                <div class="row">
                    <div class="col">
                        <div class="card-profile-stats d-flex justify-content-center mt-md-5"></div>
                    </div>
                </div>
                <div class="text-center">
                    <h3>{{ $user->name }}</h3>
                    <div class="h5 font-weight-300"><i class="ni location_pin mr-2"></i>{{ $user->email }}</div>
                    <div class="h5 mt-4"><i class="ni business_briefcase-24 mr-2"></i>Jabatan - {{ ucfirst($user->level)
                        }}</div>
                    <div><i class="ni education_hat mr-2"></i>Terdaftar sejak {{ $user->created_at->isoFormat('D MMMM
                        Y') }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-8 order-xl-1">
        {{-- Kartu Detail Informasi --}}
        <div class="card shadow">
            <div class="card-header border-0">
                <h3 class="mb-0">{{ $title }} - <span class="text-primary">{{ $user->name }}</span></h3>
            </div>
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">Informasi Pengguna</h6>
                <div class="pl-lg-4">
                    <dl class="row">
                        <dt class="col-sm-4">Nama Lengkap</dt>
                        <dd class="col-sm-8">{{ $user->name }}</dd>
                        <dt class="col-sm-4">Username</dt>
                        <dd class="col-sm-8">{{ $user->username }}</dd>
                        <dt class="col-sm-4">Email</dt>
                        <dd class="col-sm-8">{{ $user->email }}</dd>
                        <dt class="col-sm-4">No. Telpon</dt>
                        <dd class="col-sm-8">{{ $user->phone_number }}</dd>
                    </dl>
                </div>

                @if ($user->level == 'masyarakat' && $user->masyarakat)
                <hr class="my-4" />
                <h6 class="heading-small text-muted mb-4">Informasi Kependudukan & Alamat</h6>
                <div class="pl-lg-4">
                    <dl class="row">
                        <dt class="col-sm-4">Nomor Induk Kependudukan (NIK)</dt>
                        <dd class="col-sm-8">{{ $user->masyarakat->nik }}</dd>
                        <dt class="col-sm-4">Jenis Kelamin</dt>
                        <dd class="col-sm-8">{{ ucfirst($user->masyarakat->gender) }}</dd>
                        <dt class="col-sm-4">Alamat Lengkap</dt>
                        <dd class="col-sm-8">
                            @php
                            $masyarakat = $user->masyarakat;
                            $village = optional($masyarakat->village);
                            $district = optional($village->district);
                            $regency = optional($district->regency);
                            $province = optional($regency->province);
                            echo "{$masyarakat->address}, RT {$masyarakat->rt}/RW {$masyarakat->rw}, Kel.
                            {$village->name}, Kec. {$district->name}, {$regency->name}, {$province->name} -
                            {$masyarakat->postal_code}";
                            @endphp
                        </dd>
                    </dl>
                </div>
                @endif
            </div>
            <div class="card-footer">
                <a href="{{ route('users.index') }}" class="btn btn-secondary"><i
                        class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Pengguna</a>
            </div>
        </div>
    </div>
</div>
@endsection