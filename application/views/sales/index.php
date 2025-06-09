<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Sales</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active">Sales</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Sales</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">

            <a href="<?= base_url('sales/tambah'); ?>" class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i> Tambah Sales
            </a>
          
            <?php if (!empty($sales)) : ?>
  <div class="table-responsive">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Sales</th>
          <th>ID Sales Person</th>
          <th>Username Sales</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; foreach ($sales as $s) : ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $s->nama_sales; ?></td>
            <td><?= $s->id_sales_person; ?></td>
            <td><?= isset($s->username) ? $s->username : 'Tidak ada'; ?></td>
            <td>
              <a href="<?= base_url('sales/edit/' . $s->id_sales); ?>" class="btn btn-warning btn-sm">
                <i class="fas fa-edit"></i> Edit
              </a>
              <a href="<?= base_url('sales/hapus/' . $s->id_sales); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');">
                <i class="fas fa-trash"></i> Hapus
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php else : ?>
  <div class="alert alert-info">Belum ada data sales.</div>
<?php endif; ?>

      </div>
    </div>
  </section>
</div>
