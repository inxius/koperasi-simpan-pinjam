<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta name="description" content="">
  	<meta name="author" content="">
    <title>Transaksi Verifikasi Pinjaman</title>

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
              <h2 class="page-header">Transaksi Verifikasi Pinjaman</h2>
            </div>
          </div>

          <div class="panel-body">
            <div class="row">
              <div class="col-md-5 col-sm-5 col-md-offset-3 col-sm-offset-3">
                <?php echo form_open('pengurus/aksi_setujui_pinjaman'); ?>
                <?php foreach ($data_anggota as $anggota) { ?>
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $anggota->id_trans_pinjam ?>">
                    <input type="hidden" class="form-control" name="nokta" value="<?php echo $anggota->nokta ?>">
                    <input type="hidden" class="form-control" name="bunga" value="<?php echo $anggota->bunga ?>">
                    <input type="hidden" class="form-control" name="lama" value="<?php echo $anggota->lama ?>">
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
                      <tr>
                        <td><h5>Tanggal Pengajuan</h5></td>
                        <td><h5>&emsp; = &emsp;</h5></td>
                        <td><h5><?php echo $anggota->tanggal ?></h5></td>
                      </tr>
                      <tr>
                        <td><h5>Nominal Pengajuan</h5></td>
                        <td><h5>&emsp; = &emsp;</h5></td>
                        <td><h5>Rp. <?php echo number_format($anggota->nominal, 0, ".", "."); ?>,-</h5></td>
                      </tr>
                      <tr>
                        <td><h5>Bunga</h5></td>
                        <td><h5>&emsp; = &emsp;</h5></td>
                        <td><h5><?php echo $anggota->bunga ?> %</h5></td>
                      </tr>
                      <tr>
                        <td><h5>Jumlah Angsuran</h5></td>
                        <td><h5>&emsp; = &emsp;</h5></td>
                        <td><h5><?php echo $anggota->lama ?> Bulan</h5></td>
                      </tr>
                    </table>
                  </div>
                  <?php } ?>
                  <?php if (!isset($data_pinjam))
                  {?>
                    <div class="form-group">
                      <table border="0">
                        <tr>
                          <td><h5>Riwayat Pinjaman</h5></td>
                          <td><h5>&emsp;&emsp;= &emsp;</h5></td>
                          <td><h5><b>Tidak Ada Tanggungan</b></h5></td>
                        </tr>
                      </table>
                    </div>
                  <?php }
                  else {
                    ?>
                    <div class="form-group">
                      <table border="0">
                        <tr>
                          <td><h5>Riwayat Pinjaman</h5></td>
                          <td><h5>&emsp;&emsp;= &emsp;</h5></td>
                          <td><h5><b>Tidak Memenuhi Syarat, <a href="#" data-toggle="modal" data-target="#myModal">Rincian</a></b></h5></td>
                        </tr>
                      </table>
                    </div>
                    <?php
                  } ?>
                  <br>
                  <div class="form-group">
                    <label>Realisasi Pinjaman</label>
                    <div class="form-group input-group">
                      <span class="input-group-addon">Rp</span>
                      <input type="text" pattern="[0-9]+" class="form-control" name="nominal_realisasi" value="" placeholder="Realisasi Pinjaman">
                    </div>
                  </div>

                <div class="text-center">
                  <?php if (isset($data_pinjam)){?>
                    <fieldset disabled>
                      <button type="submit" class="btn btn-primary btn-lg btn-block">Setujui</button>
                    </fieldset>
                    <?php }
                      elseif (!isset($data_pinjam)) {
                      ?>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Setujui</button>
                      <?php
                      }?>
                </div>
                <?php echo form_close(); ?>
                <br>
                <?php echo form_open('Pengurus/aksi_tolak_pinjaman'); ?>
                <?php foreach ($data_anggota as $anggota) { ?>
                  <input type="hidden" class="form-control" name="id" value="<?php echo $anggota->id_trans_pinjam ?>">
                <?php } ?>
                <div class="text-center">
                  <button type="submit" class="btn btn-danger btn-lg btn-block">Tolak</button>
                </div>
                <?php echo form_close(); ?>
              </div>
            </div>
          </div>
      </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Rincian Tanggungan Pinjaman</h4>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="container">
                      <?php foreach ($data_anggota as $anggota) {
                        ?>
                        <table>
                          <tr>
                            <td><h5>Sisa Tanggungan Pinjaman</h5></td>
                            <td><h5>&emsp;&emsp;= &emsp;</h5></td>
                            <td><h5><b>Rp. <?php echo $anggota->tang_pinjam + $anggota->tang_jasa; ?>,-</b></h5></td>
                          </tr>
                        </table>
                        <?php
                      } ?>
                      <?php foreach ($data_pinjam as $pinjam) {
                        ?>
                        <table>
                          <tr>
                            <td><h5>Lama Angsuran</h5></td>
                            <td><h5>&emsp;&emsp;= &emsp;</h5></td>
                            <td><h5><b><?php echo $pinjam->lama; ?> Kali</b></h5></td>
                          </tr>
                        </table>
                        <?php
                      } ?>
                      <br>
                      <div class="">
                        <h5><b>Riwayat Angsuran</b></h5>
                        <br>
                      </div>
                    </div>
                  </div>
                  <table class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <td>No</td>
                        <td>Nominal Angsuran</td>
                        <td>Tanggal</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $iterasi = 1;
                       ?>
                      <?php foreach ($data_angsur as $angsur) { ?>
                            <tr>
                              <td><?php echo $iterasi; ?></td>
                              <td>Rp. <?php echo $angsur->angsuran_pokok + $angsur->jasa; ?>,-</td>
                              <td><?php echo $angsur->tanggal; ?></td>
                            </tr>
                      <?php $iterasi++; } ?>
                    </tbody>
                  </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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
