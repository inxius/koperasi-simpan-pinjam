<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login Anggota</title>

  <!-- Bootstrap Core CSS -->
  <link href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="<?php echo base_url()?>assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="<?php echo base_url()?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="<?php echo base_url()?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Login Anggota</h3>
          </div>
          <div class="panel-body">
            <?php echo form_open('Anggota/aksi_login'); ?>
              <div class="form-group">
                <input class="form-control" placeholder="Nomor Anggota" name="nokta" type="text" autofocus>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Password" name="password" type="password" value="">
              </div>
              <hr>
              <div class="text-center">
                <?php echo "Captcha<br>"; $a = rand(1,10); $b = rand(1,10);?>
                <?php echo $a." + ".$b." = <br><br>"; ?>
                <input type="hidden" name="a" value="<?php echo $a ?>">
                <input type="hidden" name="b" value="<?php echo $b ?>">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Captcha" name="captcha" type="text" value="">
              </div>
              <!-- Change this to a button or input when using this as a form -->
              <hr>
              <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
              <div class="text-center">
                <?php
                if (isset($pesan)) {
                  echo "<hr>";
                  echo $pesan;
                }
                ?>
              </div>
            <?php echo form_close(); ?>
            <br>
            <div class="text-center">
              <a href="<?php echo base_url().'index.php/Sinduadi/' ?>">Login Karyawan</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

  <!-- Metis Menu Plugin JavaScript -->
  <script src="<?php echo base_url() ?>assets/vendor/metisMenu/metisMenu.min.js"></script>

  <!-- Custom Theme JavaScript -->
  <script src="<?php echo base_url() ?>assets/dist/js/sb-admin-2.js"></script>

</body>

</html>
