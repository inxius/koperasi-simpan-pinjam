<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Data Anggota</title>

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

<body class="bg_home">

<?php
	foreach ($data_anggota as $anggota){
		$nokta = $anggota->nokta;
		$saldo_simp_wajib = $anggota->saldo_simp_wajib;
		$saldo_simp_suka = $anggota->saldo_simp_sukarela;
		$pinjaman = $anggota->tang_pinjam + $anggota->tang_jasa;
		$angsur = $anggota->tang_angsur;
	}
 ?>

	<div id="wrapper">
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo base_url().'index.php/anggota/index' ?>">KSP BKM Sinduadi</a>
			</div>
			<ul class="nav navbar-top-links navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-user">
						<li><a href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-user fa-fw"></i> Ubah Password</a>
						</li>
						<li class="divider"></li>
						<li><a href="<?php echo base_url().'index.php/anggota/aksi_logout' ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-sm-8">
					<h2 class="page-header">Hai <?php echo $this->session->userdata('nama'); ?></h2>
					<hr>
				</div>
				<!-- /.col-lg-12 -->
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
			<div class="row">
				<!-- Simpanan Wajib -->
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-12 text-center">
									<div class=""><h3>Rp. <?php echo number_format($saldo_simp_wajib, 0, ".", "."); ?>,-</h3></div>
									<div>Saldo Simpanan Wajib</div>
								</div>
							</div>
						</div>
						<a href="#" data-toggle="modal" data-target="#myModal">
							<div class="panel-footer">
								<!-- <button class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#myModal"> -->
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								<!-- </button> -->
							</div>
						</a>
					</div>
				</div>
				<!-- end Simpanan Wajib -->

				<!-- Simpanan Sukarela -->
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-green">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-12 text-center">
									<div class=""><h3>Rp. <?php echo number_format($saldo_simp_suka, 0, ".", "."); ?>,-</h3></div>
									<div>Saldo Simpanan Sukarela</div>
								</div>
							</div>
						</div>
						<a href="#" data-toggle="modal" data-target="#myModal1">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
				<!-- end Simpanan Sukarela -->

				<!-- Pinjaman -->
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-yellow">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-12 text-center">
									<div class=""><h3>Rp. <?php echo number_format($pinjaman, 0, ".", "."); ?>,-</h3></div>
									<div>Tanggungan Pinjaman</div>
								</div>
							</div>
						</div>
						<a href="#" data-toggle="modal" data-target="#myModal3">
							<div class="panel-footer">
								<!-- <button class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#myModal"> -->
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								<!-- </button> -->
							</div>
						</a>
						<!-- <a href="#"> -->
						<!-- </a> -->
					</div>
				</div>
				<!-- end Pinjaman -->

				<!-- Angsuran -->
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-red">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-12 text-center">
									<div class=""><h3>Rp. <?php echo number_format($angsur, 0, ".", "."); ?>,-</h3></div>
									<div>Angsuran /bulan</div>
								</div>
							</div>
						</div>
						<a href="#" data-toggle="modal" data-target="#myModal4">
							<div class="panel-footer">
								<!-- <button class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#myModal"> -->
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								<!-- </button> -->
							</div>
						</a>
						<!-- <a href="#"> -->
						<!-- </a> -->
					</div>
				</div>
				<!-- end Angsuran -->
			</div>

			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
							<div class="modal-content">
									<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Simpanan Wajib</h4>
									</div>
									<div class="modal-body">
										<table class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<td>No</td>
													<td>Nominal</td>
													<td>Petugas</td>
													<td>Tanggal</td>
												</tr>
											</thead>
											<tbody>
												<?php
	                        $iterasi = 1;
	                       ?>
	                      <?php foreach ($data_wajib as $wajib) { ?>
															<tr>
																<td><?php echo $iterasi; ?></td>
																<td>Rp. <?php echo number_format($wajib->nominal, 0, ".", "."); ?>,-</td>
																<td><?php echo $wajib->nama; ?></td>
																<td><?php echo $wajib->tanggal; ?></td>
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


			<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
							<div class="modal-content">
									<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Simpanan Sukarela</h4>
									</div>
									<div class="modal-body">
										<table class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<td>No</td>
													<td>Nominal</td>
													<td>Petugas</td>
													<td>Tanggal</td>
												</tr>
											</thead>
											<tbody>
												<?php
	                        $iterasi = 1;
	                       ?>
	                      <?php foreach ($data_suka as $suka) { ?>
															<tr>
																<td><?php echo $iterasi; ?></td>
																<td>Rp. <?php echo number_format($suka->nominal, 0, ".", "."); ?>,-</td>
																<td><?php echo $suka->nama; ?></td>
																<td><?php echo $suka->tanggal; ?></td>
															</tr>
	                      <?php $iterasi++; } ?>
											</tbody>
										</table>
									</div>
									<hr>
									<div class="modal-header">
											<h4 class="modal-title" id="myModalLabel">Transaksi Ambil</h4>
									</div>
									<div class="modal-body">
										<table class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<td>No</td>
													<td>Nominal</td>
													<td>Petugas</td>
													<td>Tanggal</td>
												</tr>
											</thead>
											<tbody>
												<?php
													$iterasi = 1;
												 ?>
												<?php foreach ($data_ambil as $ambil) { ?>
															<tr>
																<td><?php echo $iterasi; ?></td>
																<td>Rp. <?php echo number_format($ambil->nominal, 0, ".", "."); ?>,-</td>
																<td><?php echo $ambil->nama; ?></td>
																<td><?php echo $ambil->tanggal; ?></td>
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

			<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
							<div class="modal-content">
									<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Detail Pinjaman</h4>
									</div>
									<div class="modal-body">
									<center>
										<table>
								      <?php foreach ($data_pinjam as $anggota) {    ?>
								      <tr>
								        <td><h5>Nomor Anggota</h5></td>
								        <td><h5>&emsp; = &emsp;</h5></td>
								        <td><h5><?php echo $anggota->nokta; ?></h5></td>
								      </tr>
								      <tr>
								        <td><h5>Nama</h5></td>
								        <td><h5>&emsp; = &emsp;</h5></td>
								        <td><h5><?php echo $anggota->nama; ?></h5></td>
								      </tr>
								      <tr>
								        <td><h5>Tanggal Pinjam</h5></td>
								        <td><h5>&emsp; = &emsp;</h5></td>
								        <td><h5><?php echo $anggota->tanggal; ?></h5></td>
								      </tr>
								      <tr>
								        <td><h5>Pinjaman Pokok</h5></td>
								        <td><h5>&emsp; = &emsp;</h5></td>
								        <td><h5>Rp. <?php echo number_format($anggota->nominal, 0, ".", "."); ?>,-</h5></td>
								      </tr>
								      <tr>
								        <td><h5>Jasa</h5></td>
								        <td><h5>&emsp; = &emsp;</h5></td>
								        <td><h5>Rp.
								          <?php $jasa = ($anggota->lama * $anggota->bunga * $anggota->nominal)/100;
								              echo number_format($jasa, 0, ".", ".");
								            ?>
								        </h5></td>
								      </tr>
								      <tr>
								        <td><h5>Lama Angsuran</h5></td>
								        <td><h5>&emsp; = &emsp;</h5></td>
								        <td><h5><?php echo $anggota->lama; ?> Kali Angsuran</h5></td>
								      </tr>
								      <tr>
								        <td><h5>Angsuran</h5></td>
								        <td><h5>&emsp; = &emsp;</h5></td>
								        <td><h5>Rp. <?php echo number_format($anggota->tang_angsur, 0, ".", "."); ?>,-</h5></td>
								      </tr>
								    <?php } ?>
								    </table>
									</center>
									</div>
									<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
							</div>
							<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
			</div>

			<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
							<div class="modal-content">
									<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Angsuran</h4>
									</div>
									<div class="modal-body">
										<table class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<td>No</td>
													<td>Nominal</td>
													<td>Petugas</td>
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
																<td>Rp. <?php echo number_format($angsur->angsuran_pokok + $angsur->jasa, 0, ".", "."); ?>,-</td>
																<td><?php echo $angsur->nama; ?></td>
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

			<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
							<div class="modal-content">
									<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Ubah Password</h4>
									</div>
									<div class="modal-body">
										<table class="table table-striped table-bordered table-hover">
											<div class="row">
												<div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
													<?php echo form_open('Anggota/aksi_ubah_password'); ?>
													<div class="form-group">
														<label>Password Lama</label>
														<input type="password" class="form-control" name="pass_lama" required>
													</div>
													<div class="form-group">
														<label>Password Baru</label>
														<input type="password" class="form-control" name="pass_baru" required>
													</div>
													<div class="text-right">
														<!-- <button type="submit" class="btn btn-primary">Ubah</button> -->
													</div>

												</div>

											</div>
									</div>
									<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Ubah Password</button>
											<?php echo form_close(); ?>
									</div>
							</div>
							<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
			</div>

		</div>


		</div>
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

<style type="text/css">
.bg_home {
	background-color: #eee;
}

.navbar-default {
	background-color: #dee;
	font-size:18px;
}
</style>
