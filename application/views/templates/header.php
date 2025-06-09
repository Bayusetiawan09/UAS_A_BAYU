<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>PT.MAJU JAYA</title>

		<!-- Google Font: Source Sans Pro -->
		<link
			rel="stylesheet"
			href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
		/>
		<!-- Font Awesome -->
		<link
			rel="stylesheet"
			href="<?= base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css'); ?>" />

		<!-- Ionicons -->
		<link
			rel="stylesheet"
			href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />

		<!-- Tempusdominus Bootstrap 4 -->
		<link
			rel="stylesheet"
			href="<?= base_url('assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>" />

		<!-- iCheck Bootstrap -->
		<link
			rel="stylesheet"
			href="<?= base_url('assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>" />

		<!-- JQVMap -->
		<link
			rel="stylesheet"
			href="<?= base_url('assets/adminlte/plugins/jqvmap/jqvmap.min.css'); ?>" />

		<!-- AdminLTE -->
		<link
			rel="stylesheet"
			href="<?= base_url('assets/adminlte/dist/css/adminlte.min.css'); ?>" />

		<!-- Overlay Scrollbars -->
		<link
			rel="stylesheet"
			href="<?= base_url('assets/adminlte/plugins/overlayScrollbars/css/overlayScrollbars.min.css'); ?>" />

		<!-- Date Range Picker -->
		<link
			rel="stylesheet"
			href="<?= base_url('assets/adminlte/plugins/daterangepicker/daterangepicker.css'); ?>" />

		<!-- Summernote -->
		<link
			rel="stylesheet"
			href="<?= base_url('assets/adminlte/plugins/summernote/summernote-bs4.css'); ?>" />


	</head>
	<?php if ($this->session->flashdata('welcome')): ?>
  <div id="welcome-alert" class="alert alert-success alert-dismissible fade show" role="alert">
    <?= $this->session->flashdata('welcome'); ?>
    <button type="button" class="close" data-dismiss="alert">&times;</button>
  </div>
<?php endif; ?>


		<!-- Site wrapper -->
		<div class="wrapper">
			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
				<!-- Left navbar links -->
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" data-widget="pushmenu" href="#" role="button"
							><i class="fas fa-bars"></i
						></a>
					</li>
					<?php
					$role = $this->session->userdata('role');
					$dashboard_url = '#';

					if ($role == 'admin') {
						$dashboard_url = base_url('admin/dashboard');
					} elseif ($role == 'sales') {
						$dashboard_url = base_url('sales/dashboard');
					} elseif ($role == 'manager') {
						$dashboard_url = base_url('manager/dashboard');
					}
					?>
					<li class="nav-item d-none d-sm-inline-block">
						<a class="nav-link" href="<?= $dashboard_url; ?>">Home</a>
					</li>
					<li class="nav-item d-none d-sm-inline-block">
						<a href="#" class="nav-link">Contact</a>
					</li>
				</ul>

				<!-- Right navbar links -->
				<ul class="navbar-nav ml-auto">					
					<li class="nav-item">
						<a class="nav-link" data-widget="fullscreen" href="#" role="button">
							<i class="fas fa-expand-arrows-alt"></i>
						</a>
					</li>
					
				</ul>
			</nav>
			<!-- /.navbar -->

			
<?php
$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'guest';
$brand_text = '';
$display_name = '';

if ($role === 'sales') {
    $brand_text = 'Sales';
    $display_name = isset($_SESSION['nama_sales']) ? $_SESSION['nama_sales'] : 'Sales';
} elseif ($role === 'admin') {
    $brand_text = 'Admin';
    $display_name = isset($_SESSION['username']) ? $_SESSION['username'] : 'Admin';
} elseif ($role === 'manager') {
    $brand_text = 'Manager';
    $display_name = isset($_SESSION['username']) ? $_SESSION['username'] : 'Manager';
} else {
    $brand_text = 'User';
    $display_name = 'Guest';
}
?>

					<!-- Sidebar -->
					<aside class="main-sidebar sidebar-dark-primary elevation-4">
					<a href="#" class="brand-link">
						<span class="brand-text font-weight-light text-center d-block"><?= htmlspecialchars($brand_text); ?></span>
					</a>

					<div class="sidebar">
						<div class="user-panel">
						</div>


					<!-- Sidebar Menu -->
					<nav class="mt-2">
						<?php $level = $this->session->userdata('role'); ?>
						<ul
							class="nav nav-pills nav-sidebar flex-column"
							data-widget="treeview"
							role="menu"
							data-accordion="false"
						>
							<li class="nav-item menu-open">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>
										Dashboard
										<i class="right fas fa-angle-left"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
								<?php if($level == 'admin'): ?>
							<li class="nav-item">
								<a href="<?= base_url('produk'); ?>" class="nav-link <?= ($this->uri->segment(1) == 'produk') ? 'active' : ''; ?>">
									<i class="fas fa-box-open nav-icon"></i>
									<p>Produk</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="<?= base_url('pelanggan'); ?>" class="nav-link <?= ($this->uri->segment(1) == 'pelanggan') ? 'active' : ''; ?>">
									<i class="fas fa-users nav-icon"></i>
									<p>Pelanggan</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="<?= base_url('sales'); ?>" class="nav-link <?= ($this->uri->segment(1) == 'sales') ? 'active' : ''; ?>">
									<i class="fas fa-user-tie nav-icon"></i>
									<p>Sales</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="<?= base_url('pesanan'); ?>" class="nav-link <?= ($this->uri->segment(1) == 'pesanan') ? 'active' : ''; ?>">
									<i class="fas fa-file-invoice-dollar nav-icon"></i>
									<p>Pesanan</p>
								</a>
							</li>
						<?php endif; ?>

						<?php if ($level == 'sales'): ?>
						<li class="nav-item">
						<a href="<?= base_url('sales_order'); ?>" class="nav-link <?= ($this->uri->segment(1) == 'sales_order') ? 'active' : ''; ?>">
							<i class="fas fa-file-invoice-dollar nav-icon"></i>
							<p>Sales Order</p>
						</a>
						</li>
						<?php endif; ?>


						<?php if ($level == 'manager'): ?>
						<li class="nav-item">
						<a href="<?= base_url('Laporan'); ?>" class="nav-link <?= ($this->uri->segment(1) == 'Laporan') ? 'active' : ''; ?>">
							<i class="fas fa-box-open nav-icon"></i>
							<p>Laporan</p>
						</a>
						</li>
						<?php endif; ?>




								</ul>
								<li class="nav-item">
									<a href="<?= base_url('auth/logout'); ?>" class="nav-link">
										<i class="nav-icon fas fa-sign-out-alt"></i>
										<p>Logout</p>
									</a>
								</li>
						</ul>
					</nav>
					<!-- /.sidebar-menu -->
				</div>
				<!-- /.sidebar -->

			</aside>
