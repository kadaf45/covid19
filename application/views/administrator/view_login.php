<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/backend/logo/babar.png" type="image/x-icon" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/lte/plugin/fontawesome/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/lte/plugin/icheck/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/lte/css/adminlte.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/bootstrap4/css/bootstrap.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/animate.min.css">

  <!--    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/lte/plugin/chart.js/Chart.css"> -->
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <img class="mb-4" src="<?php echo base_url(); ?>assets/backend/logo/babar.png" alt="" width="72" height="100%">
      <h3 class=""><a href="<?php echo base_url(); ?>administrator"><b>GUGUS TUGAS <br><small>Covid-19 BANGKA BARAT</small></b></h3></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Masuk untuk memulai sesi Anda</p>

        <?php
        if ($this->input->post('email') != '') {
          echo "<div class='alert alert-warning'><center>$title</center></div>";
        } elseif ($this->input->post('a') != '') {
          echo "<div class='alert alert-danger'><center>$title</center></div>";
        }

        echo form_open('administrator');
        ?>

        <div class="input-group mb-3">
          <input type="text" class="form-control" name='a' placeholder="Username" required autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name='b' placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name='submit' class="btn btn-primary btn-block btn-flat">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
        <br>
        <a href="<?php echo base_url(); ?>" class="float-left btn btn-success btn-flat">&crarr; Kembali ke Home<a />
          <a href="#" class="float-right btn btn-warning btn-flat" data-toggle="modal" data-target="#lupapass">Lupa Password<a />
      </div>
      <!-- /.login-card-body -->

    </div>
    <p class="mt-auto mb-3 text-muted align-items-center">&copy; 2020. &hearts; TIM IT DISKOMINFO BANGKA BARAT.</p>
  </div>

  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets/backend/lte/plugin/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>assets/backend/bootstrap4/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/backend/lte/js/adminlte.min.js"></script>

  <div class="modal fade" id="lupapass">

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Lupa Password Login ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <?php
          $attributes = array('class' => 'form-horizontal');
          echo form_open('administrator/lupapassword', $attributes);
          ?>
          <div class="form-group">
            <center style='color:red'>Masukkan Email yang terkait dengan akun!</center><br>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>
              <input style='text-transform:lowercase;' type="email" name="lupa" class="form-control">
            </div>
          </div>


        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Kembali Login</button>
          <button type="submit" name='lupa' class="btn btn-primary">Kirim Permintaan</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <?php echo form_close(); ?>





  </div>
  </div>
  </div>
  </div>


</body>

</html>