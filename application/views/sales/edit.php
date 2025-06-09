<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Sales</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('sales'); ?>">Sales</a></li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Form Edit Sales</h3>
      </div>
      <div class="card-body">
        <form action="<?= base_url('sales/edit/' . $sales->id_sales); ?>" method="post">
          <div class="form-group">
            <label for="nama_sales">Nama Sales</label>
            <input type="text" name="nama_sales" class="form-control" value="<?= $sales->nama_sales; ?>" required>
          </div>
          <div class="form-group">
            <label for="id_sales_person">ID Sales Person</label>
            <input type="text" name="id_sales_person" class="form-control" value="<?= $sales->id_sales_person; ?>" required>
          </div>
          <button type="submit" class="btn btn-warning">Update</button>
          <a href="<?= base_url('sales'); ?>" class="btn btn-secondary">Kembali</a>
        </form>
      </div>
    </div>
  </section>
</div>
