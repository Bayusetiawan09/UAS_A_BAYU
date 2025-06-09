<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Status Pesanan</h1>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">
        <form action="<?= base_url('pesanan/update_status'); ?>" method="post">
          <input type="hidden" name="id_order" value="<?= $pesanan->id_order; ?>">

          <div class="form-group">
            <label>Nama Pelanggan</label>
            <input type="text" class="form-control" value="<?= $pesanan->nama_pelanggan; ?>" readonly>
          </div>

          <div class="form-group">
            <label>Produk</label>
            <input type="text" class="form-control" value="<?= $pesanan->nama_produk; ?>" readonly>
          </div>

          <div class="form-group">
            <label>Jumlah</label>
            <input type="number" class="form-control" value="<?= $pesanan->jumlah; ?>" readonly>
          </div>

          <div class="form-group">
            <label>Total Harga</label>
            <input type="text" class="form-control" value="Rp <?= number_format($pesanan->harga_total, 0, ',', '.'); ?>" readonly>
          </div>

          <div class="form-group">
            <label>Sales</label>
            <input type="text" class="form-control" value="<?= $pesanan->nama_sales ?: '-'; ?>" readonly>
          </div>

          <div class="form-group">
            <label>Status</label>
            <select name="status_order" class="form-control" required>
              <option value="pending" <?= $pesanan->status == 'pending' ? 'selected' : ''; ?>>Pending</option>
              <option value="proses" <?= $pesanan->status == 'proses' ? 'selected' : ''; ?>>Proses</option>
              <option value="selesai" <?= $pesanan->status == 'selesai' ? 'selected' : ''; ?>>Selesai</option>
              <option value="batal" <?= $pesanan->status == 'batal' ? 'selected' : ''; ?>>Batal</option>
            </select>
          </div>

          <button type="submit" class="btn btn-success">Update Status</button>
          <a href="<?= base_url('pesanan'); ?>" class="btn btn-secondary">Kembali</a>
        </form>
      </div>
    </div>
  </section>
</div>
