<footer class="bg-light py-3 shadow-sm">
  <div class="container text-center">
    <div class="text-muted small">
      <strong>&copy; 2025 <a href="#" class="text-decoration-none">UAS SIM 2025 BAYU SETIAWAN</a>.</strong>
    </div>
  </div>
</footer>


		<!-- jQuery -->
		<script src="<?= base_url('assets/adminlte/plugins/jquery/jquery.min.js') ?>"></script>

		<!-- jQuery UI -->
		<script src="<?= base_url('assets/adminlte/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>

		<!-- Bridge untuk menghindari konflik dengan Bootstrap -->
		<script>
			$.widget.bridge('uibutton', $.ui.button);

		</script>
		<!-- Bootstrap 4 -->
		<script src="<?= base_url('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
		<!-- AdminLTE App -->
		<script src="<?= base_url('assets/adminlte/dist/js/adminlte.min.js') ?>"></script>
		<!-- AdminLTE for dashboard demo -->
		<script src="<?= base_url('assets/adminlte/dist/js/pages/dashboard.js') ?>"></script>
		<!-- AdminLTE for demo purposes (Opsional) -->
		<script src="<?= base_url('assets/adminlte/dist/js/demo.js') ?>"></script> 

		<!-- ChartJS -->
		<script src="<?= base_url('assets/adminlte/plugins/chart.js/Chart.min.js') ?>"></script>

		<!-- Sparkline -->
		<script src="<?= base_url('assets/adminlte/plugins/sparklines/sparklines.js') ?>"></script>

		<!-- JQVMap -->
		<script src="<?= base_url('assets/adminlte/plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
		<script src="<?= base_url('assets/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>

		<!-- jQuery Knob -->
		<script src="<?= base_url('assets/adminlte/plugins/jquery-knob/jquery.knob.min.js') ?>"></script>

		<!-- Date Range Picker -->
		<script src="<?= base_url('assets/adminlte/plugins/moment/moment.min.js') ?>"></script>
		<script src="<?= base_url('assets/adminlte/plugins/daterangepicker/daterangepicker.min.js') ?>"></script>

		<!-- Tempusdominus Bootstrap 4 -->
		<script src="<?= base_url('assets/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>

		<!-- Summernote -->
		<script src="<?= base_url('assets/adminlte/plugins/summernote/summernote-bs4.min.js') ?>"></script>

		<!-- OverlayScrollbars -->
		<script src="<?= base_url('assets/adminlte/plugins/overlayScrollbars/js/overlayScrollbars.min.js') ?>"></script>

		<script>
				<?php if ($this->session->flashdata('success')): ?>
					alert("<?= $this->session->flashdata('success'); ?>");
				<?php endif; ?>

				<?php if ($this->session->flashdata('error')): ?>
					alert("<?= $this->session->flashdata('error'); ?>");
				<?php endif; ?>
				</script>

<script>
    $(function () {
        // Inisialisasi Summernote
        $('.summernote').summernote({
            height: 300, // Tinggi editor
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'italic', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']], // Perbaiki typo: tanda titik menjadi koma
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']] // Hapus 'picture' yang duplikat
            ]
        });
    });


  $(document).ready(function() {
    setTimeout(function() {
      $('#welcome-alert').fadeOut('slow');
    }, 3000); // 3 detik
  });

</script>	
</body>
</html>


		

		



