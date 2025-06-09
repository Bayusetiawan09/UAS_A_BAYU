<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pelanggan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Pelanggan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Pelanggan</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">

            <a href="<?= base_url('pelanggan/tambah'); ?>" class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i> Tambah Pelanggan
            </a>

            <?php if (!empty($pelanggan)): ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID Pelanggan</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pelanggan as $p): ?>
                            <tr>
                                <td><?= $p->id_pelanggan ?></td>
                                <td><?= $p->nama ?></td>
                                <td><?= $p->alamat ?></td>
                                <td><?= $p->no_telepon ?></td>
                                <td>
                                    <a href="<?= base_url('pelanggan/edit/' . $p->id_pelanggan); ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="<?= base_url('pelanggan/hapus/' . $p->id_pelanggan); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pelanggan ini?');">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-center">Belum ada pelanggan yang tersedia.</p>
            <?php endif; ?>

        </div>
    </div><!-- /.card -->
</section><!-- /.content -->
</div>
