<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('produk'); ?>">Produk</a></li>
                        <li class="breadcrumb-item active">Tambah Produk</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Tambah Produk</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <form action="<?= base_url('produk/tambah'); ?>" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" name="nama_produk" id="nama_produk" class="form-control" placeholder="Nama Produk" required>
                    </div>

                    <div class="form-group">
                        <label for="kode_produk">Kode Produk</label>
                        <input type="text" name="kode_produk" id="kode_produk" class="form-control" placeholder="Kode Produk" required>
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control" placeholder="Harga" required>
                    </div>

                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" name="stok" id="stok" class="form-control" placeholder="Stok" required>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="<?= base_url('produk'); ?>" class="btn btn-secondary ml-2">Batal</a>
                </div>
            </form>
        </div>

    </section>
</div>
