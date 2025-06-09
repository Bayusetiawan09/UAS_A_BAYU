<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login PT. Maju jaya</title>

  <!-- Google Font: Source Sans Pro -->
  <link
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    rel="stylesheet"
  />
  <!-- Font Awesome -->
  <link
    rel="stylesheet"
    href="<?= base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css'); ?>"
  />
  <!-- icheck bootstrap -->
  <link
    rel="stylesheet"
    href="<?= base_url('assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>"
  />
  <!-- Theme style -->
  <link
    rel="stylesheet"
    href="<?= base_url('assets/adminlte/dist/css/adminlte.min.css'); ?>"
  />

  <style>
    /* Custom center form vertically */
    .login-page {
      background: #f4f6f9;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .login-card-body {
      padding: 2rem;
      border-radius: 0.5rem;
      box-shadow: 0 0 15px rgb(0 0 0 / 0.1);
    }
    /* Customize input placeholder */
    input::placeholder {
      color: #6c757d;
    }
  </style>
</head>
<body class="hold-transition login-page">
  <!-- Flash Message -->
  <?php if ($this->session->flashdata('success')): ?>
    <div
      id="flash-message"
      class="alert alert-success alert-dismissible fade show"
      role="alert"
      style="position: fixed; top: 20px; right: 20px; min-width: 250px; z-index: 1050;"
    >
      <?= $this->session->flashdata('success'); ?>
      <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert"
        aria-label="Close"
      ></button>
    </div>
  <?php endif; ?>

  <?php if ($this->session->flashdata('error')): ?>
    <div
      id="flash-message"
      class="alert alert-danger alert-dismissible fade show"
      role="alert"
      style="position: fixed; top: 20px; right: 20px; min-width: 250px; z-index: 1050;"
    >
      <?= $this->session->flashdata('error'); ?>
      <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert"
        aria-label="Close"
      ></button>
    </div>
  <?php endif; ?>

  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>PT.MAJU JAYA</b></a>
    </div>

    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="<?= site_url('auth/process_login')?>" method="post">
          <div class="input-group mb-3">
            <input
              type="text"
              name="username"
              class="form-control"
              placeholder="Username"
              required
              autofocus
            />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input
              type="password"
              name="password"
              class="form-control"
              placeholder="Password"
              required
            />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" name="remember" />
                <label for="remember">Remember Me</label>
              </div>
            </div>

            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">
                Sign In
              </button>
            </div>
          </div>
        </form>
        <p class="mb-0">
          <a href="<?= base_url('auth/register'); ?>" class="text-center">Sudah punya akun?register akun?</a>
        </p>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script
    src="<?= base_url('assets/adminlte/plugins/jquery/jquery.min.js'); ?>"
  ></script>
  <!-- Bootstrap 4 -->
  <script
    src="<?= base_url('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"
  ></script>
  <!-- AdminLTE App -->
  <script
    src="<?= base_url('assets/adminlte/dist/js/adminlte.min.js'); ?>"
  ></script>

  <script>
    setTimeout(() => {
      const flash = document.getElementById('flash-message');
      if (flash) {
        flash.style.transition = 'opacity 0.5s ease';
        flash.style.opacity = '0';
        setTimeout(() => {
          flash.remove();
        }, 500);
      }
    }, 3000);
  </script>
</body>
</html>
