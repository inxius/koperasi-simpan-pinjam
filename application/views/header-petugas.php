<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body>

  <div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url().'Petugas/index' ?>">KSP BKM Sinduadi</a>
      </div>
      <!-- /.navbar-header -->
      <ul class="nav navbar-top-links navbar-right">

      </ul>
      <!-- /.navbar-top-links -->

      <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
          <ul class="nav" id="side-menu">
            <li>
              <a href="<?php echo base_url().'Petugas/vw_transaksi_umum' ?>"><i class="fa fa-dollar fa-fw"></i> Transaksi Umum</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-dollar fa-fw"></i> Pinjaman<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li>
                  <a href="<?php echo base_url().'Petugas/vw_transaksi_pinjam' ?>">Pengajuan Pinjaman</a>
                </li>
                <li>
                  <a href="<?php echo base_url().'Petugas/vw_transaksi_angsur' ?>">Angsuran</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#"><i class="fa fa-edit fa-fw"></i> Laporan<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li>
                  <a href="<?php echo base_url().'Petugas/laporan_bulanan' ?>">Laporan Bulanan</a>
                </li>
                <li>
                  <a href="<?php echo base_url().'Petugas/vw_laporanAnggota' ?>">Laporan Transaksi</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#"><i class="fa fa-user fa-fw"></i> Anggota<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li>
                  <a href="<?php echo base_url().'Petugas/vw_anggota' ?>">Data Anggota</a>
                </li>
                <li>
                  <a href="<?php echo base_url().'Petugas/tbh_anggota' ?>">Tambah Anggota</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#"><i class="fa fa-user fa-fw"></i> <?php echo $this->session->userdata('nama'); ?><span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li>
                  <a href="<?php echo base_url().'Sinduadi/ubah_password' ?>">Ubah Password</a>
                </li>
                <li>
                  <a href="<?php echo base_url().'Petugas/aksi_logout' ?>">Logout</a>
                </li>
              </ul>
              <!-- /.nav-second-level -->
            </li>
          </ul>
        </div>
        <!-- /.sidebar-collapse -->
      </div>
      <!-- /.navbar-static-side -->
    </nav>

    <!-- /#page-wrapper -->

  </div>
  <!-- /#wrapper -->

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
