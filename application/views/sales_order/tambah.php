<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Orderan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('sales_order'); ?>">Sales Order</a></li>
            <li class="breadcrumb-item active">Tambah</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Tambah Orderan</h3>
      </div>
      <div class="card-body">

        <?php if (!empty($error)): ?>
          <div class="alert alert-danger"><?= $error; ?></div>
        <?php endif; ?>

        <form action="<?= base_url('sales_order/tambah'); ?>" method="post" id="formOrder">
          <div class="form-group">
            <label for="id_pelanggan">Nama Pelanggan</label>
            <select name="id_pelanggan" class="form-control" required>
              <option value="">-- Pilih Pelanggan --</option>
              <?php foreach ($pelanggan as $p): ?>
                <option value="<?= $p->id_pelanggan; ?>"><?= $p->nama; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
  <label for="id_produk">Nama Produk</label>
  <select name="id_produk" class="form-control" id="id_produk" required>
    <option value="" data-harga="0" data-stok="0">-- Pilih Produk --</option>
    <?php foreach ($produk as $pr): ?>
      <option value="<?= $pr->id_produk; ?>" data-harga="<?= $pr->harga; ?>" data-stok="<?= $pr->stok; ?>">
        <?= $pr->nama_produk; ?>
      </option>
    <?php endforeach; ?>
  </select>
  <small id="stokInfo" class="form-text text-muted"></small> <!-- Info stok produk -->
</div>

<div class="form-group">
  <label for="jumlah">Jumlah</label>
  <input type="number" name="jumlah" class="form-control" id="jumlah" min="1" required>
  <small id="peringatanJumlah" class="form-text" style="color: red; display: none;"></small> <!-- Peringatan jumlah -->
</div>

<div class="form-group">
  <label for="harga_total">Harga Total</label>
  <input type="text" id="harga_total" class="form-control" readonly>
</div>

          <button type="submit" class="btn btn-success">Simpan</button>
          <a href="<?= base_url('sales_order'); ?>" class="btn btn-secondary">Kembali</a>
        </form>

      </div>
    </div>
  </section>
</div>

<script>
  const produkSelect = document.getElementById('id_produk');
  const jumlahInput = document.getElementById('jumlah');
  const hargaTotalInput = document.getElementById('harga_total');
  const stokInfo = document.getElementById('stokInfo');
  const peringatanJumlah = document.getElementById('peringatanJumlah');

  let stok = 0;
  let harga = 0;

  produkSelect.addEventListener('change', () => {
    const selectedOption = produkSelect.options[produkSelect.selectedIndex];
    stok = parseInt(selectedOption.getAttribute('data-stok')) || 0;
    harga = parseInt(selectedOption.getAttribute('data-harga')) || 0;

    if (produkSelect.value === "") {
      stokInfo.textContent = "";
      peringatanJumlah.style.display = 'none';
      hargaTotalInput.value = '';
      jumlahInput.value = '';
    } else {
      stokInfo.textContent = `Stok tersedia: ${stok}`;
      peringatanJumlah.style.display = 'none';
      hargaTotalInput.value = '';
      jumlahInput.value = '';
    }
  });

  jumlahInput.addEventListener('input', () => {
    const jumlah = parseInt(jumlahInput.value) || 0;

    if (jumlah > stok) {
      peringatanJumlah.textContent = `Jumlah melebihi stok yang tersedia (${stok}).`;
      peringatanJumlah.style.display = 'block';
      hargaTotalInput.value = '';
    } else {
      peringatanJumlah.style.display = 'none';
      hargaTotalInput.value = (harga > 0 && jumlah > 0) ? `Rp ${harga * jumlah}` : '';
    }
  });

</script>
