<div class="content-wrapper">
  <!-- Header -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <!-- Content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- Produk -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $total_produk; ?></h3>
              <p>Produk</p>
            </div>
            <div class="icon">
              <i class="fas fa-box"></i>
            </div>
            <a href="<?= base_url('produk'); ?>" class="small-box-footer">
              Lihat Detail <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <!-- Pelanggan -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $total_pelanggan; ?></h3>
              <p>Pelanggan</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="<?= base_url('pelanggan'); ?>" class="small-box-footer">
              Lihat Detail <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <!-- Sales -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?= $total_sales; ?></h3>
              <p>Sales</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-tie"></i>
            </div>
            <a href="<?= base_url('sales'); ?>" class="small-box-footer">
              Lihat Detail <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <!-- Pesanan -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $total_pesanan; ?></h3>
              <p>Pesanan</p>
            </div>
            <div class="icon">
              <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="<?= base_url('pesanan'); ?>" class="small-box-footer">
              Lihat Detail <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
