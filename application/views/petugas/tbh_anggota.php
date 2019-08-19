<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta name="description" content="">
  	<meta name="author" content="">
    <title>Tambah Anggota</title>

    <!-- Bootstrap Core CSS -->
  	<link href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  	<!-- MetisMenu CSS -->
  	<link href="<?php echo base_url() ?>assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  	<!-- Custom CSS -->
  	<link href="<?php echo base_url() ?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

  	<!-- Morris Charts CSS -->
  	<link href="<?php echo base_url() ?>assets/vendor/morrisjs/morris.css" rel="stylesheet">

  	<!-- Custom Fonts -->
  	<link href="<?php echo base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div id="wrapper">
      <div id="page-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">Tambah Anggota</h1>
            </div>
          </div>

          <div class="panel-body">
            <div class="row">
              <div class="col-md-4 col-sm-4 col-md-offset-3 col-sm-offset-3">
                <?php echo form_open('Petugas/aksi_tambah_anggota'); ?>
                <div class="form-group">
                    <label>Nomor Anggota = <?php echo $nomor; ?></label>
                    <input type="hidden" class="form-control" name="nokta" value="<?php echo $nomor; ?>">
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" pattern="[A-Z a-z]+" class="form-control" name="nama" required>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="jk" id="optionsRadios1" value="L" checked>Laki - Laki
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="jk" id="optionsRadios2" value="P">Perempuan
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" rows="3" name="alamat" required></textarea>
                </div>
                <div class="form-group">
                    <label>No Telp</label>
                    <input type="text" pattern="[0-9]+" class="form-control" name="no_telp" required>
                </div>
                <div class="form-group">
                    <label>Pekerjaan</label>
                    <input type="text" pattern="[A-Z a-z]+" class="form-control" name="pekerjaan" required>
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary btn-lg btn-block">Tambah</button>
                </div>
                <?php echo form_close(); ?>
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

  	<!-- Morris Charts JavaScript -->
  	<script src="<?php echo base_url() ?>assets/vendor/raphael/raphael.min.js"></script>
  	<script src="<?php echo base_url() ?>assets/vendor/morrisjs/morris.min.js"></script>
  	<script src="<?php echo base_url() ?>assets/data/morris-data.js"></script>

  	<!-- Custom Theme JavaScript -->
  	<script src="<?php echo base_url() ?>assets/dist/js/sb-admin-2.js"></script>
  </body>
</html>
