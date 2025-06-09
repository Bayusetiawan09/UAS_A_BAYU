<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Pelanggan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('pelanggan'); ?>">Pelanggan</a></li>
                    <li class="breadcrumb-item active">Tambah Pelanggan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Pelanggan</h3>
        </div>
        <!-- form start -->
        <form method="post" action="<?= base_url('pelanggan/tambah'); ?>">
            <div class="card-body">

                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama pelanggan" value="<?= set_value('nama'); ?>">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat"><?= set_value('alamat'); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="no_telepon">Nomor Telepon</label>
                    <input type="text" class="form-control" id="no_telepon" name="no_telepon" placeholder="Masukkan nomor telepon" value="<?= set_value('no_telepon'); ?>">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a href="<?= base_url('pelanggan'); ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</section><!-- /.content -->
</div>
