<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Produk</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Produk</li>
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
            <h3 class="card-title">Daftar Produk</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">

            <a href="<?= base_url('produk/tambah'); ?>" class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i> Tambah Produk
            </a>

            <?php if (!empty($produk)): ?>
                <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID Produk</th>
            <th>Nama Produk</th>
            <th>Kode Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($produk as $p): ?>
            <tr>
                <td><?= $p->id_produk ?></td>
                <td><?= $p->nama_produk ?></td>
                <td><?= $p->kode_produk ?></td>
                <td>Rp.<?= number_format($p->harga,0,',','.'); ?></td>
                <td><?= $p->stok ?></td>
                <td>
                    <a href="<?= base_url('produk/edit/' . $p->id_produk); ?>" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="<?= base_url('produk/hapus/' . $p->id_produk); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?');">
                        <i class="fas fa-trash"></i> Hapus
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

            <?php else: ?>
                <p class="text-center">Belum ada produk yang tersedia.</p>
            <?php endif; ?>

        </div>
    </div><!-- /.card -->
</section><!-- /.content -->
            </div>
