<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Sales Order</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active">Sales Order</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <!-- Daftar Order -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Daftar Orderan</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          
        </div>
      </div>

      <div class="card-body table-responsive">
        <div class="mb-3">
      <a href="<?= base_url('sales_order/tambah'); ?>" class="btn btn-primary">
        <i class="fas fa-cart-plus"></i> Tambah Orderan
      </a>
    </div>
        <?php if (!empty($orders)) : ?>
          <table class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga Total</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($orders as $o) : ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= date('d-m-Y', strtotime($o->created_at)); ?></td>
                  <td><?= htmlspecialchars($o->nama); ?></td>
                  <td><?= htmlspecialchars($o->nama_produk); ?></td>
                  <td><?= (int)$o->jumlah; ?></td>
                  <td>Rp <?= number_format($o->harga_total, 0, ',', '.'); ?></td>
                  <td>
                    <?php 
                      $badgeClass = 'warning';
                      if ($o->status === 'selesai') $badgeClass = 'success';
                      else if ($o->status === 'dibatalkan') $badgeClass = 'danger';
                    ?>
                    <span class="badge badge-<?= $badgeClass; ?>">
                      <?= ucfirst($o->status); ?>
                    </span>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else : ?>
          <div class="alert alert-info">Belum ada data orderan.</div>
        <?php endif; ?>
      </div>
    </div>
  </section>
</div>
