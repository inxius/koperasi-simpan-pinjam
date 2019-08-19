<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Data Petugas</title>

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
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-8 col-sm-8">
					<h1 class="page-header">Data Karyawan</h1>
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
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead class="text-center" style="background-color:#FFCCBC; font-size:12px">
							<tr>
								<td><b>No</b></td>
								<td><b>Username</b></td>
								<td><b>Nama</b></td>
								<td><b>JK</b></td>
								<td><b>Alamat</b></td>
								<td><b>No Telpon</b></td>
								<td><b>Level</b></td>
								<td><b>Aksi</b></td>
							</tr>
						</thead>
						<tbody>
							<?php $iterasi = 1;
							if (isset($data_petugas)) {
								$dt_petugas = $data_petugas;
							}
							elseif (isset($data_search)) {
								$dt_petugas = $data_search;
							}
							else {
								$dt_petugas = [];
							} ?>
							<?php foreach ($dt_petugas as $petugas) { ?>
								<tr>
									<td><?php echo $iterasi; ?></td>
									<td><?php echo $petugas->username_karyawan; ?></td>
									<td><?php echo $petugas->nama; ?></td>
									<td><?php echo $petugas->jk; ?></td>
									<td><?php echo $petugas->alamat; ?></td>
									<td><?php echo $petugas->no_telp; ?></td>
									<td><?php echo $petugas->level; ?></td>
									<td class="text-center">
										<a href="<?php echo base_url().'index.php/pengurus/edt_petugas/'.$petugas->username_karyawan; ?>">
											<button type="button" class="btn btn-success btn-sm"> <span class="glyphicon glyphicon-cog" aria-hidden="true"></span></button>
										</a>
										<a href="<?php echo base_url().'Pengurus/reset_pass_petugas/'.$petugas->username_karyawan; ?>">
											<button type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
										</a>
									</td>
								</tr>
							<?php $iterasi++; } ?>
						</tbody>
					</table>
				</div>
				<!-- /.table-responsive -->
			</div>
			<!-- /.panel-body -->
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
