<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta name="description" content="">
  	<meta name="author" content="">
    <title>Rincian Data Anggota</title>

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
            <div class="col-lg-7 col-sm-7">
              <h2 class="page-header">Rincian Data Anggota</h2>
            </div>
            <div class="col-lg-5 col-sm-5">
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
              <!-- <div class="col-md-2 col-sm-2">
                <a href="<?php echo base_url().'index.php/sinduadi/rincianAnggota/'.$nokta.'/2'; ?>" target="_blank">
                  <button class="btn btn-primary btn-block">Print</button>
                </a>
                <br>
              </div>
            </div> -->
            <div class="row">
              <div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">

                <?php foreach ($data_anggota as $anggota) { ?>
                    <?php $nokta = $anggota->nokta; ?>
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
                      <tr>
                        <td><h5>Jenis Kelamin</h5></td>
                        <td><h5>&emsp; = &emsp;</h5></td>
                        <td><h5><?php echo $anggota->jk; ?></h5></td>
                      </tr>
                      <tr>
                        <td><h5>No. Telp</h5></td>
                        <td><h5>&emsp; = &emsp;</h5></td>
                        <td><h5><?php echo $anggota->no_telp ?></h5></td>
                      </tr>
                      <tr>
                        <td><h5>Pekerjaan</h5></td>
                        <td><h5>&emsp; = &emsp;</h5></td>
                        <td><h5><?php echo $anggota->pekerjaan ?></h5></td>
                      </tr>
                    </table>
                  </div>
                <?php } ?>
                </div>
                <div class="col-md-4 col-sm-4">
                  <div class="form-group">
                    <?php if ($data_pinjam == NULL){
                      ?>
                        <br><br>
                      <?php
                    } ?>
                    <table border="0">
                      <tr>
                        <td><h5>Saldo Simp. Wajib</h5></td>
                        <td><h5>&emsp; = &emsp;</h5></td>
                        <td><h5>Rp. <?php echo number_format($anggota->saldo_simp_wajib, 0, ".", "."); ?>,-</h5></td>
                      </tr>
                      <tr>
                        <td><h5>Saldo Simp. Sukarela</h5></td>
                        <td><h5>&emsp; = &emsp;</h5></td>
                        <td><h5>Rp. <?php echo number_format($anggota->saldo_simp_sukarela, 0, ".", "."); ?>,-</h5></td>
                      </tr>
                      <?php foreach ($data_pinjam as $pinjam) {
                        ?>
                        <tr>
                          <td><h5>Pinjaman</h5></td>
                          <td><h5>&emsp; = &emsp;</h5></td>
                          <td><h5>Rp. <?php echo number_format($pinjam->nominal, 0, ".", "."); ?>,-</h5></td>
                        </tr>
                        <tr>
                          <td><h5>Tanggal Pinjam</h5></td>
                          <td><h5>&emsp; = &emsp;</h5></td>
                          <td><h5><?php echo $pinjam->tanggal ?></h5></td>
                        </tr>
                        <tr>
                          <td><h5>Bunga</h5></td>
                          <td><h5>&emsp; = &emsp;</h5></td>
                          <td><h5><?php echo $pinjam->bunga ?> %</h5></td>
                        </tr>
                        <?php
                      } ?>
                      <tr>
                        <td><h5>Sisa Tangg.Pinjam</h5></td>
                        <td><h5>&emsp; = &emsp;</h5></td>
                        <td><h5>Rp. <?php echo number_format($anggota->tang_pinjam, 0, ".", "."); ?>,-</h5></td>
                      </tr>
                      <tr>
                        <td><h5>Sisa Tangg. Jasa</h5></td>
                        <td><h5>&emsp; = &emsp;</h5></td>
                        <td><h5>Rp. <?php echo number_format($anggota->tang_jasa, 0, ".", "."); ?>,-</h5></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <div class="row">
                <hr>
              </div>
              <div class="col-md-2 col-sm-2">
                <a href="<?php echo base_url().'index.php/Petugas/rincianAnggota/'.$nokta.'/2'; ?>" target="_blank">
                  <button class="btn btn-primary btn-block"><span class="glyphicon glyphicon-print" aria-hidden="true"> Print</button>
                </a>
                <br>
              </div>
              <div class="col-sm-2 col-md-2 col-lg-2">
                <a href="<?php echo base_url().'index.php/Petugas/rincianAnggota/'.$nokta.'/3'; ?>" target="_blank">
                  <button class="btn btn-primary btn-block"><span class="glyphicon glyphicon-save" aria-hidden="true">  Download PDF </button>
                </a>
                <br>
              </div>
            </div>
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover">
                    <thead class="text-center" style="background-color:#FFCCBC; font-size:12px">
                      <tr>
                        <td><b>No</b></td>
                        <td><b>Tanggal</b></td>
                        <td><b>Nominal Transaksi</b></td>
                        <td><b>Jenis Transaksi</b></td>
                        <td><b>Petugas</b></td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $iterasi = 1;
                      foreach ($data_lapor as $lapor) {
                        ?>
                        <tr>
                          <td><?php echo $iterasi; ?></td>
                          <td><?php echo $lapor->tanggal; ?></td>
                          <td>Rp. <?php echo number_format($lapor->nominal, 0, ".", "."); ?>,-</td>
                          <td><?php echo $lapor->transaksi; ?></td>
                          <td><?php echo $lapor->petugas; ?></td>

                        </tr>
                      <?php $iterasi++; } ?>
                    </tbody>
                  </table>

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
