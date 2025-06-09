<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Produk</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card shadow">
            <div class="card-header bg-warning">
                <h3 class="card-title">Form Edit Produk</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <form method="post" action="<?= base_url('produk/update/'.$produk->id_produk) ?>">
                    <div class="form-group mb-3">
                        <label>Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control" value="<?= $produk->nama_produk ?>" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Kode Produk</label>
                        <input type="text" name="kode_produk" class="form-control" value="<?= $produk->kode_produk ?>" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control" value="<?= $produk->harga ?>" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Stok</label>
                        <input type="number" name="stok" class="form-control" value="<?= $produk->stok ?>" required>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="<?= base_url('produk'); ?>" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>

            <div class="card-footer">
                <!-- Bisa isi dengan keterangan tambahan -->
            </div>
        </div>
    </section>
</div>
