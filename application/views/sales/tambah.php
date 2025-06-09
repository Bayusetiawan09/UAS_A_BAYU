<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Sales</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('sales'); ?>">Sales</a></li>
            <li class="breadcrumb-item active">Tambah</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Tambah Sales</h3>
      </div>
      <div class="card-body">
        <form action="<?= base_url('sales/tambah'); ?>" method="post">
  <div class="form-group">
    <label for="username">Username Sales</label>
    <select name="id_sales" class="form-control" required>
  <option value="">-- Pilih Username Sales --</option>
  <?php foreach ($users_sales as $user): ?>
    <option value="<?= $user->id; ?>" <?= set_select('user_id', $user->id); ?>>
      <?= $user->username; ?>
    </option>
  <?php endforeach; ?>
</select>

  </div>

  <div class="form-group">
    <label for="nama_sales">Nama Sales</label>
    <input type="text" name="nama_sales" class="form-control" required>
  </div>

  <div class="form-group">
    <label for="id_sales_person">ID Sales Person</label>
    <input type="text" name="id_sales_person" class="form-control" required>
  </div>

  <button type="submit" class="btn btn-success">Simpan</button>
  <a href="<?= base_url('sales'); ?>" class="btn btn-secondary">Kembali</a>
</form>

      </div>
    </div>
  </section>
</div>
