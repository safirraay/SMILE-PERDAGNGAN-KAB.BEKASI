

<?php $__env->startPush('css'); ?>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <form action="<?php echo e(route('users.update', $user->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="mb-0"><?php echo e($title); ?> - <span class="text-primary"><?php echo e($user->name); ?></span></h3>
                </div>
                <div class="card-body">
                    <h6 class="heading-small text-muted mb-4">Informasi Akun Pengguna</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="name">Nama Lengkap</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i
                                                            class="ni ni-single-02"></i></span></div>
                                                <input type="text" name="name" id="name"
                                                    class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    placeholder="Nama Lengkap" value="<?php echo e(old('name', $user->name)); ?>"
                                                    required>
                                            </div>
                                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="username">Username</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i
                                                            class="ni ni-circle-08"></i></span></div>
                                                <input type="text" name="username" id="username"
                                                    class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    placeholder="Username"
                                                    value="<?php echo e(old('username', $user->username)); ?>" required>
                                            </div>
                                            <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="email">Email</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i
                                                            class="ni ni-email-83"></i></span></div>
                                                <input type="email" name="email" id="email"
                                                    class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    placeholder="email@example.com"
                                                    value="<?php echo e(old('email', $user->email)); ?>" required>
                                            </div>
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="phone_number">No. Telpon</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i
                                                            class="ni ni-mobile-button"></i></span></div>
                                                <input type="text" name="phone_number" id="phone_number"
                                                    class="form-control <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    placeholder="No. Telpon"
                                                    value="<?php echo e(old('phone_number', $user->phone_number)); ?>" required>
                                            </div>
                                            <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="level">Peran / Level</label>
                                            <select name="level" id="level"
                                                class="form-control select2 <?php $__errorArgs = ['level'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                required data-placeholder="Pilih Peran">
                                                <option></option>
                                                <option value="admin" <?php echo e(old('level', $user->level) == 'admin' ?
                                                    'selected' : ''); ?>>Admin</option>
                                                <option value="petugas" <?php echo e(old('level', $user->level) == 'petugas' ?
                                                    'selected' : ''); ?>>Petugas</option>
                                                <option value="masyarakat" <?php echo e(old('level', $user->level) == 'masyarakat'
                                                    ? 'selected' : ''); ?>>Masyarakat</option>
                                            </select>
                                            <?php $__errorArgs = ['level'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 text-center">
                                <div class="form-group">
                                    <label class="form-control-label">Avatar</label>
                                    <img src="<?php echo e($user->avatar ? Storage::url($user->avatar) : asset('assets/backend/img/avatars/user-default.png')); ?>"
                                        alt="preview" class="img-thumbnail rounded-circle mb-3" id="avatar-preview"
                                        style="width:150px; height:150px; object-fit: cover;">
                                    <div class="custom-file">
                                        <input type="file" name="avatar"
                                            class="custom-file-input <?php $__errorArgs = ['avatar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="avatar"
                                            lang="id" accept="image/*">
                                        <label class="custom-file-label text-left" for="avatar">Pilih gambar
                                            baru</label>
                                    </div>
                                    <?php $__errorArgs = ['avatar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <small class="text-muted">Kosongkan password jika tidak ingin mengubahnya.</small>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="password">Password Baru</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="ni ni-lock-circle-open"></i></span></div>
                                        <input type="password" name="password" id="password"
                                            class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            placeholder="Min. 8 karakter">
                                    </div>
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="password_confirmation">Konfirmasi Password
                                        Baru</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="ni ni-lock-circle-open"></i></span></div>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control" placeholder="Ulangi password baru">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div id="masyarakat-form"
                        style="display: <?php echo e(old('level', $user->level) == 'masyarakat' ? 'block' : 'none'); ?>;">
                        <hr class="my-4" />
                        <h6 class="heading-small text-muted mb-4">Informasi Kependudukan</h6>
                        <div class="pl-lg-4">
                            <?php
                            $masyarakat = optional($user->masyarakat);
                            $village = optional($masyarakat->village);
                            $district = optional($village->district);
                            $regency = optional($district->regency);
                            $province = optional($regency->province);
                            $selectedProvinceId = old('province_id', $province->id);
                            $selectedRegencyId = old('regency_id', $regency->id);
                            $selectedDistrictId = old('district_id', $district->id);
                            $selectedVillageId = old('village_id', $village->id);
                            ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="nik">NIK</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i
                                                        class="ni ni-badge"></i></span></div>
                                            <input class="form-control <?php $__errorArgs = ['nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                placeholder="16 digit NIK" type="text" name="nik" id="nik"
                                                value="<?php echo e(old('nik', $masyarakat->nik)); ?>">
                                        </div>
                                        <?php $__errorArgs = ['nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="gender">Jenis Kelamin</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i
                                                        class="ni ni-favourite-28"></i></span></div>
                                            <select name="gender" id="gender"
                                                class="form-control <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="laki-laki" <?php echo e(old('gender', $masyarakat->gender) ==
                                                    'laki-laki' ? 'selected' : ''); ?>>Laki-laki</option>
                                                <option value="perempuan" <?php echo e(old('gender', $masyarakat->gender) ==
                                                    'perempuan' ? 'selected' : ''); ?>>Perempuan</option>
                                            </select>
                                        </div>
                                        <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="address">Alamat Lengkap</label>
                                        <textarea name="address" id="address"
                                            class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="3"
                                            placeholder="Nama jalan, nomor rumah, dll."><?php echo e(old('address', $masyarakat->address)); ?></textarea>
                                        <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="rt">RT</label>
                                        <input type="text" name="rt" id="rt"
                                            class="form-control <?php $__errorArgs = ['rt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="001"
                                            value="<?php echo e(old('rt', $masyarakat->rt)); ?>">
                                        <?php $__errorArgs = ['rt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="rw">RW</label>
                                        <input type="text" name="rw" id="rw"
                                            class="form-control <?php $__errorArgs = ['rw'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="002"
                                            value="<?php echo e(old('rw', $masyarakat->rw)); ?>">
                                        <?php $__errorArgs = ['rw'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="postal_code">Kode Pos</label>
                                        <input type="text" name="postal_code" id="postal_code"
                                            class="form-control <?php $__errorArgs = ['postal_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            placeholder="12345"
                                            value="<?php echo e(old('postal_code', $masyarakat->postal_code)); ?>">
                                        <?php $__errorArgs = ['postal_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="province_id">Provinsi</label>
                                        <select name="province_id" id="province_id"
                                            class="form-control select2 <?php $__errorArgs = ['province_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            disabled>
                                            <?php if($province): ?>
                                            <option value="<?php echo e($province->id); ?>" selected><?php echo e($province->name); ?></option>
                                            <?php endif; ?>
                                        </select>
                                        <?php if($province): ?>
                                        <input type="hidden" name="province_id" value="<?php echo e($province->id); ?>">
                                        <?php endif; ?>
                                        <?php $__errorArgs = ['province_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="regency_id">Kabupaten/Kota</label>
                                        <select name="regency_id" id="regency_id"
                                            class="form-control select2 <?php $__errorArgs = ['regency_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <option value="">Pilih Kabupaten/Kota</option>
                                            <?php $__currentLoopData = $regencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $regencyItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($regencyItem->id); ?>" <?php echo e($selectedRegencyId==$regencyItem->
                                                id ? 'selected' : ''); ?>><?php echo e($regencyItem->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['regency_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="district_id">Kecamatan</label>
                                        <select name="district_id" id="district_id"
                                            class="form-control select2 <?php $__errorArgs = ['district_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <option value="">Pilih Kecamatan</option>
                                        </select>
                                        <?php $__errorArgs = ['district_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="village_id">Desa/Kelurahan</label>
                                        <select name="village_id" id="village_id"
                                            class="form-control select2 <?php $__errorArgs = ['village_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <option value="">Pilih Desa/Kelurahan</option>
                                        </select>
                                        <?php $__errorArgs = ['village_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="<?php echo e(route('users.index')); ?>" class="btn btn-secondary"><i
                            class="fas fa-arrow-left mr-2"></i>Batal</a>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Simpan
                        Perubahan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.select2').select2({ theme: 'bootstrap-5' });
    $('#avatar').on('change', function(event){
        var fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').html(fileName || 'Pilih gambar baru');
        if(event.target.files[0]){
            var output = document.getElementById('avatar-preview');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() { URL.revokeObjectURL(output.src) }
        }
    });

    function toggleMasyarakatForm() {
        if ($('#level').val() === 'masyarakat') {
            $('#masyarakat-form').slideDown();
            $('#masyarakat-form').find('input, select, textarea').not('#province_id').prop('required', true);
        } else {
            $('#masyarakat-form').slideUp();
            $('#masyarakat-form').find('input, select, textarea').prop('required', false);
        }
    }
    $('#level').on('change', toggleMasyarakatForm);

    let initialDistrictId = '<?php echo e($selectedDistrictId); ?>';
    let initialVillageId = '<?php echo e($selectedVillageId); ?>';

    function loadDistricts(regencyId, selectedId) {
        if (regencyId) {
            $.post("<?php echo e(route('get-districts')); ?>", { _token: "<?php echo e(csrf_token()); ?>", regency_id: regencyId }, function(data) {
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
            $.post("<?php echo e(route('get-villages')); ?>", { _token: "<?php echo e(csrf_token()); ?>", district_id: districtId }, function(data) {
                $('#village_id').empty().append('<option value="">Pilih Desa/Kelurahan</option>');
                $.each(data, function(key, value) {
                    $('#village_id').append($('<option>', { value: value.id, text: value.name, selected: value.id == selectedId }));
                });
                $('#village_id').prop('disabled', false);
            });
        }
    }

    if ($('#regency_id').val()) {
        loadDistricts($('#regency_id').val(), initialDistrictId);
        if(initialDistrictId) {
            loadVillages(initialDistrictId, initialVillageId);
        }
    }

    $('#regency_id').on('change', function() {
        loadDistricts($(this).val(), null);
        $('#village_id').empty().append('<option value="">Pilih Desa/Kelurahan</option>').prop('disabled', true);
    });

    $('#district_id').on('change', function() {
        loadVillages($(this).val(), null);
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app-backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\app_smileperdagangan_laravel8\resources\views/backend/users/edit.blade.php ENDPATH**/ ?>