<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta name="description" content="">
  	<meta name="author" content="">
    <title>Syarat Dasar</title>

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
            <div class="col-lg-8 col-sm-8">
              <h2 class="page-header">Syarat Dasar</h2>
            </div>
            <div class="col-lg-4 col-sm-4">
              <?php if ($this->session->userdata('message') != null) { ?>
                <br>
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->userdata('message');
                      $this->session->unset_userdata('message');
                     ?>
                </div>
              <?php } ?>
            </div>
          </div>

          <div class="panel-body">
            <div class="row">
              <div class="col-md-4 col-sm-4 col-md-offset-3 col-sm-offset-3">
                <?php echo form_open('Pengurus/aksi_edit_dasar'); ?>
                <?php foreach ($data_dasar as $dasar) { ?>
                  <div class="form-group">
                    <!-- <label>Nomor Anggota</label> -->
                    <input type="hidden" class="form-control" name="id_dasar" value="<?php echo $dasar->id_dasar ?>">
                  </div>
                  <div class="form-group">
                    <label>Simpanan Wajib</label>
                    <div class="form-group input-group">
                      <span class="input-group-addon">Rp</span>
                      <input type="text" pattern="[0-9]+" class="form-control" name="nilai_simp_wajib" value="<?php echo $dasar->nilai_simp_wajib ?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Simpanan Pokok</label>
                    <div class="form-group input-group">
                      <span class="input-group-addon">Rp</span>
                      <input type="text" pattern="[0-9]+" class="form-control" name="nilai_simp_pokok" value="<?php echo $dasar->nilai_simp_pokok ?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Batas Bunga</label>
                    <div class="form-group input-group">
                      <span class="input-group-addon">Rp</span>
                      <input type="text" pattern="[0-9]+" class="form-control" name="batas_bunga" value="<?php echo $dasar->batas_bunga ?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Bunga 1</label>
                    <div class="form-group input-group">
                      <input type="text" pattern="[0-9-.]+" class="form-control" name="bunga1" value="<?php echo $dasar->bunga1 ?>" required>
                      <span class="input-group-addon">%</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Bunga2</label>
                    <div class="form-group input-group">
                      <input type="text" pattern="[0-9-.]+" class="form-control" name="bunga2" value="<?php echo $dasar->bunga2 ?>" required>
                      <span class="input-group-addon">%</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Max Bulan Pinjam</label>
                    <div class="form-group input-group">
                      <input type="text" pattern="[0-9]+" class="form-control" name="max_bln" value="<?php echo $dasar->max_bln ?>" required>
                      <span class="input-group-addon">Bulan</span>
                    </div>
                  </div>
                <?php } ?>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary btn-block">Ubah</button>
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
