<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manajemen Pesanan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active">Pesanan</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Daftar Pesanan</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>

      <div class="card-body">
        <?php if (!empty($orders)) : ?>
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Order</th>
                  <th>Nama Pelanggan</th>
                  <th>Produk</th>
                  <th>Jumlah</th>
                  <th>Total Harga</th>
                  <th>Nama Sales</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($orders as $order) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= date('d-m-Y', strtotime($order->created_at)); ?></td>
                    <td><?= htmlspecialchars($order->nama); ?></td>
                    <td><?= htmlspecialchars($order->nama_produk); ?></td>
                    <td><?= (int)$order->jumlah; ?></td>
                    <td>Rp <?= number_format($order->jumlah * $order->harga_total, 0, ',', '.'); ?></td>
                    <td><?= htmlspecialchars($order->nama_sales ?: '-'); ?></td>
                    <td>
                      <form action="<?= base_url('pesanan/update_status'); ?>" method="post" class="form-inline">
                        <input type="hidden" name="id_order" value="<?= $order->id_order; ?>">
                        <select name="status_order" class="form-control form-control-sm mr-2" required>
                          <option value="draft" <?= $order->status == 'draft' ? 'selected' : ''; ?>>Draft</option>
                          <option value="dikirim" <?= $order->status == 'dikirim' ? 'selected' : ''; ?>>Dikirim</option>
                          <option value="selesai" <?= $order->status == 'selesai' ? 'selected' : ''; ?>>Selesai</option>
                          <option value="dibatalkan" <?= $order->status == 'dibatalkan' ? 'selected' : ''; ?>>Dibatalkan</option>
                        </select>
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                      </form>
                    </td>
                    <td>
                      <a href="<?= base_url('pesanan/delete/' . $order->id_order); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus pesanan ini?')">
                        <i class="fas fa-trash"></i> Hapus
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        <?php else : ?>
          <div class="alert alert-info">Belum ada data pesanan.</div>
        <?php endif; ?>
      </div>
    </div>
  </section>
</div>
