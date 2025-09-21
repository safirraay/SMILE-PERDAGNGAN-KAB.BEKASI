@extends('layouts.app-backend')

@section('content')
<div class="row">
    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
        {{-- Kartu Profil Utama --}}
        <div class="card card-profile shadow">
            <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                    <div class="card-profile-image">
                        <a href="#">
                            <img src="{{ $user->avatar ? Storage::url($user->avatar) : asset('assets/backend/img/avatars/user-default.png') }}"
                                alt="User Avatar" class="rounded-circle"
                                style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #fff;">
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                {{-- Placeholder untuk tombol-tombol di masa depan jika diperlukan --}}
            </div>
            <div class="card-body pt-0 pt-md-4">
                <div class="row">
                    <div class="col">
                        <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                            <div>
                                <span class="heading">{{ $pengaduanCount }}</span>
                                @if($user->level == 'masyarakat')
                                <span class="description">Pengaduan</span>
                                @elseif($user->level == 'petugas')
                                <span class="description">Tanggapan</span>
                                @else
                                <span class="description">Total Laporan</span>
                                @endif
                            </div>
                            <div>
                                <span class="heading">{{ $user->created_at->diffForHumans() }}</span>
                                <span class="description">Bergabung</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <h3>{{ $user->name }}</h3>
                    <div class="h5 font-weight-300">
                        <i class="ni location_pin mr-2"></i>{{ $user->email }}
                    </div>
                    <div class="h5 mt-4">
                        <i class="ni business_briefcase-24 mr-2"></i>Jabatan - {{ ucfirst($user->level) }}
                    </div>
                    <hr class="my-4">
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                        <i class="fas fa-user-edit mr-2"></i>Edit Profil
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-8 order-xl-1">
        {{-- Kartu Detail Informasi --}}
        <div class="card shadow">
            <div class="card-header border-0">
                <h3 class="mb-0">Profil Saya</h3>
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

                        <dt class="col-sm-4">Terdaftar Sejak</dt>
                        <dd class="col-sm-8">{{ $user->created_at->isoFormat('D MMMM Y') }}</dd>
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
        </div>
    </div>
</div>
@endsection