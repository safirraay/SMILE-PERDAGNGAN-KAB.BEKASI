@extends('layouts.app-auth')

@section('content')
<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card bg-secondary shadow border-0">
                <div class="card-header bg-transparent pb-5">
                    <div class="text-muted text-center mt-2">
                        <big>Lupa Password Anda?</big>
                    </div>
                </div>
                <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center text-muted mb-4">
                        <p>Untuk keamanan data, reset password hanya dapat dilakukan oleh Administrator. Silakan hubungi
                            Administrator melalui salah satu kontak di bawah ini untuk meminta reset password.</p>
                    </div>

                    <div class="list-group">
                        <a href="https://wa.me/6281234567890?text=Halo%20Admin,%20saya%20ingin%20meminta%20reset%20password%20untuk%20akun%20saya."
                            target="_blank" class="list-group-item list-group-item-action d-flex align-items-center">
                            <div class="icon icon-shape bg-success text-white rounded-circle shadow mr-3">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <div>
                                <h4 class="mb-0">WhatsApp</h4>
                                <small>+62 812-xxxx-xxxx (Admin)</small>
                            </div>
                        </a>
                        <a href="mailto:admin@example.com?subject=Permintaan Reset Password"
                            class="list-group-item list-group-item-action d-flex align-items-center">
                            <div class="icon icon-shape bg-primary text-white rounded-circle shadow mr-3">
                                <i class="ni ni-email-83"></i>
                            </div>
                            <div>
                                <h4 class="mb-0">Email</h4>
                                <small>admin@example.com</small>
                            </div>
                        </a>
                        <a href="https://t.me/username_admin" target="_blank"
                            class="list-group-item list-group-item-action d-flex align-items-center">
                            <div class="icon icon-shape bg-info text-white rounded-circle shadow mr-3">
                                <i class="fab fa-telegram-plane"></i>
                            </div>
                            <div>
                                <h4 class="mb-0">Telegram</h4>
                                <small>@username_admin</small>
                            </div>
                        </a>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('auth.index') }}" class="btn btn-secondary">Kembali ke Halaman Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection