<div class="content-wrapper" style="padding: 15px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
  <section class="content-header" style="margin-bottom: 20px;">
    <h1>Laporan Penjualan</h1>
  </section>

  <section class="content">
    <form action="<?= base_url('laporan/generate'); ?>" method="get" target="_blank" class="mb-4">
      <div class="row" style="display: flex; gap: 15px; flex-wrap: wrap;">
        <div class="col-md-3" style="flex: 1 1 200px;">
          <label for="id_sales">Sales</label>
          <select name="id_sales" id="id_sales" class="form-control" style="width: 100%; padding: 6px;">
            <option value="">-- Semua Sales --</option>
            <?php foreach ($sales as $s): ?>
              <option value="<?= $s->id_sales; ?>"><?= htmlspecialchars($s->nama_sales); ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="col-md-3" style="flex: 1 1 200px;">
          <label for="id_produk">Produk</label>
          <select name="id_produk" id="id_produk" class="form-control" style="width: 100%; padding: 6px;">
            <option value="">-- Semua Produk --</option>
            <?php foreach ($produk as $p): ?>
              <option value="<?= $p->id_produk; ?>"><?= htmlspecialchars($p->nama_produk); ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="col-md-3" style="flex: 1 1 200px;">
          <label for="start_date">Periode (Dari)</label>
          <input type="date" id="start_date" name="start_date" class="form-control" style="width: 100%; padding: 6px;">
        </div>

        <div class="col-md-3" style="flex: 1 1 200px;">
          <label for="end_date">Sampai</label>
          <input type="date" id="end_date" name="end_date" class="form-control" style="width: 100%; padding: 6px;">
        </div>
      </div>

      <div class="mt-3" style="margin-top: 20px;">
      <button type="submit" style="
      background-color: white; 
      border: 2px solid #d9534f; 
      color: #d9534f; 
      display: inline-flex; 
      align-items: center; 
      gap: 8px; 
      padding: 6px 12px; 
      font-weight: 600;
      border-radius: 4px;
      cursor: pointer;
      ">
      <i class="fas fa-file-pdf" style="color: #d9534f; font-size: 1.2em;"></i>
      Export PDF
    </button>


      </div>
    </form>
  </section>
</div>
