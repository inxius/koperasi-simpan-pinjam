<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta name="description" content="">
  	<meta name="author" content="">
    <title>Transaksi Pengajuan Pinjaman</title>

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
              <h1 class="page-header">Transaksi Pengajuan Pinjaman</h1>
            </div>
          </div>

          <div class="panel-body">
            <div class="row">
              <div class="col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4">
                <?php echo form_open('Petugas/aksi_pinjam'); ?>
                <?php foreach ($data_anggota as $anggota) { ?>
                  <div class="form-group">
                    <!-- <label>Nomor Anggota</label> -->
                    <input type="hidden" class="form-control" name="nokta" value="<?php echo $anggota->nokta ?>">
                  </div>
                  <div class="form-group">
                    <table border="0">
                      <tr>
                        <td><h5>Nomor Anggota</h5></td>
                        <td><h5>&emsp; = &emsp;</h5></td>
                        <td><h5><?php echo $anggota->nokta ?></h5></td>
                      </tr>
                      <tr>
                        <td><h5>Nama</h5></td>
                        <td><h5>&emsp; = &emsp;</h5></td>
                        <td><h5><?php echo $anggota->nama ?></h5></td>
                      </tr>
                      <tr>
                        <td><h5>Alamat</h5></td>
                        <td><h5>&emsp; = &emsp;</h5></td>
                        <td><h5><?php echo $anggota->alamat ?></h5></td>
                      </tr>
                    </table>
                  </div>
                  <div class="form-group">
                    <label>Nominal Pengajuan</label>
                    <div class="form-group input-group">
                      <span class="input-group-addon">Rp</span>
                      <input type="text" class="form-control" name="nominal_pengajuan" value="" placeholder="Nominal Pengajuan">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Jumlah Angsuran</label>
                    <!-- <input type="text" class="form-control" name="lama_pinjam" value="" placeholder="Jumlah Angsuran"> -->
                    <select class="form-control" name="lama_pinjam">
                      <?php
                        foreach ($data_syarat as $syarat) {
                          $lama = $syarat->max_bln;
                        }

                        for ($i=1; $i <= $lama; $i++) {
                          ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                          <?php
                        }
                       ?>
                    </select>
                  </div>

                  <!-- <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="pass" required>
                  </div> -->
                <?php } ?>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary btn-lg btn-block">Proses</button>
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
