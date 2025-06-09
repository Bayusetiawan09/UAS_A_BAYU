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
        
        <!-- Box Pesanan Sales -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $total_pesanan_sales; ?></h3>
              <p>Pesanan Anda</p>
            </div>
            <div class="icon">
              <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="<?= base_url('sales_order'); ?>" class="small-box-footer">
              Lihat Pesanan Saya <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>
</div>
