<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.0.1">
  <title><?= $login ?></title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url(); ?>/assets/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/fontawesome/css/all.css">

  <link rel="stylesheet" href="<?= base_url(); ?>assets/js/jquery-ui/jquery-ui.min.css">
  <script src="<?= base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/jquery-ui/jquery-ui.min.js"></script>


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .login {
      border-style: solid;
      border-color: #ccc;
      border-radius: 2%;
      min-height: 350px;
      width: 400px;
      padding: 25px;
      margin: 20px auto;
      box-shadow: 0 2px 7px rgba(0, 0, 0, 0.1);
    }

    * {
      background-color: skyblue;
    }

    .form-check {
      text-align: left;
      margin-left: 22px;
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="<?= base_url(); ?>assets/css/signin.css" rel="stylesheet">

</head>

<body class="text-center">

  <div class="login">
    <?php if ($this->session->flashdata('gagal')) { ?>
      <div class="row mt-2">
        <div class="col-sm-12">
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal Login</strong> <?= $this->session->flashdata('gagal'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
    <?php } ?>
    <form class="form-signin" action="<?= base_url(); ?>login/cek_login" method="POST">
      <img class="mb-4" src="img/logo.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <div class="form-group">
        <label for="username" class="font-weight-bold">Username</label>
        <div class="input-group-prepend input-group-sm"><span class="input-group-addon mr-2"><i class="fas fa-user"></i></span>
          <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
        </div>
      </div>

      <div class="form-group">
        <label for="password" class="font-weight-bold">Password</label>
        <div class="input-group-prepend input-group-sm"><span class="input-group-addon mr-2"><i class="fas fa-lock"></i></span>
          <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
          <label class="form-check-label" for="defaultCheck1">
            Show Password
          </label>
        </div>
      </div>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <hr>
      <p class="mt-3 mb-3 text-success font-weight-bold">&copy; SMK TPG 2 Bekasi</p>
    </form>
  </div>
</body>

<script type="text/javascript">
  $(document).ready(function() {
    $('.form-check-input').click(function() {
      if ($(this).is(':checked')) {
        $('#password').attr('type', 'text');
      } else {
        $('#password').attr('type', 'password');
      }
    });
  });
</script>

</html>