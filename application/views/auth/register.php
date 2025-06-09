<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>AdminLTE 3 | Form Registrasi</title>

    <!-- Google Font: Source Sans Pro -->
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="<?= base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css'); ?>"
    />

    <!-- Ionicons -->
    <link
        rel="stylesheet"
        href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
    />

    <!-- Tempusdominus Bootstrap 4 -->
    <link
        rel="stylesheet"
        href="<?= base_url('assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>"
    />

    <!-- iCheck Bootstrap -->
    <link
        rel="stylesheet"
        href="<?= base_url('assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>"
    />

    <!-- JQVMap -->
    <link
        rel="stylesheet"
        href="<?= base_url('assets/adminlte/plugins/jqvmap/jqvmap.min.css'); ?>"
    />

    <!-- AdminLTE -->
    <link
        rel="stylesheet"
        href="<?= base_url('assets/adminlte/dist/css/adminlte.min.css'); ?>"
    />

    <!-- Overlay Scrollbars -->
    <link
        rel="stylesheet"
        href="<?= base_url('assets/adminlte/plugins/overlayScrollbars/css/overlayScrollbars.min.css'); ?>"
    />

    <!-- Date Range Picker -->
    <link
        rel="stylesheet"
        href="<?= base_url('assets/adminlte/plugins/daterangepicker/daterangepicker.css'); ?>"
    />

    <!-- Summernote -->
    <link
        rel="stylesheet"
        href="<?= base_url('assets/adminlte/plugins/summernote/summernote-bs4.css'); ?>"
    />
</head>

<body>
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 align-items-center">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Login?</a></li>
                        <li class="breadcrumb-item active">Form Registrasi</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title">
                                <i class="fas fa-user-plus mr-2"></i>Form Registrasi
                            </h3>
                        </div>

                        <div class="card-body">
                           
                        <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('success'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('error'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php endif; ?>


                            <form action="<?= base_url('auth/process_register'); ?>" method="POST" novalidate>
                                <div class="form-group">
                                    <label for="username"><i class="fas fa-user mr-1"></i> Username</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="username"
                                        id="username"
                                        placeholder="Masukkan username"
                                        required
                                    />
                                </div>

                                <div class="form-group">
                                    <label for="password"><i class="fas fa-lock mr-1"></i> Password</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        name="password"
                                        id="password"
                                        placeholder="Masukkan password"
                                        required
                                    />
                                </div>

                                <div class="form-group">
                                    <label for="confirm_password"
                                        ><i class="fas fa-lock mr-1"></i> Konfirmasi Password</label
                                    >
                                    <input
                                        type="password"
                                        class="form-control"
                                        name="confirm_password"
                                        id="confirm_password"
                                        placeholder="Ulangi password"
                                        required
                                    />
                                </div>

                                <div class="form-group">
                                    <label for="role"><i class="fas fa-user-tag mr-1"></i> Role</label>
                                    <select class="form-control" name="role" id="role" required>
                                        <option value="" disabled selected>-- Pilih Role --</option>
                                        <option value="admin">Admin</option>
                                        <option value="sales">Sales</option>
                                        <option value="manager">Manager</option>
                                    </select>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save mr-1"></i> Simpan
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="card-footer text-center">
                            <small class="text-muted"
                                >Pastikan data diisi dengan benar sebelum menekan tombol simpan.</small
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

