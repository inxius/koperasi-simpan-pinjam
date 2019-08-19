<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Laporan Bulanan</title>

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
					<h1 class="page-header">Laporan Bulanan</h1>
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
				<!-- /.col-lg-12 -->
			<div class="row">

			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="row">
					<?php echo form_open('Petugas/get_laporan_bulanan/'); ?>
					<div class="col-lg-3 col-sm-3">
						<div class="form-group">
							<label>Bulan</label>
							<select class="form-control" name="bulan">
								<option value="1">Januari</option>
								<option value="2">Februari</option>
								<option value="3">Maret</option>
								<option value="4">April</option>
								<option value="5">Mei</option>
								<option value="6">Juni</option>
								<option value="7">Juli</option>
								<option value="8">Agustus</option>
								<option value="9">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
							</select>
						</div>
					</div>
					<div class="col-lg-3 col-sm-3">
						<div class="form-group">
							<label>Tahun</label>
							<select class="form-control" name="tahun">
								<option value="2018">2018</option>
								<option value="2019">2019</option>
								<option value="2020">2020</option>
								<option value="2021">2021</option>
								<option value="2022">2022</option>
								<option value="2023">2023</option>
								<option value="2024">2024</option>
							</select>
						</div>
					</div>
					<br>
					<button class="btn btn-primary">Proses</button>
					<?php echo form_close(); ?>

				</div>
				<hr>
				<?php if (isset($data_lapor)) {
					$bulan = $bulan;
					$tahun = $tahun;
					?>
					<div class="row">
						<div class="col-sm-2 col-md-2 col-lg-2">
							<a href="<?php echo base_url().'index.php/Petugas/download_laporan_bulanan/'.$bulan.'/'.$tahun.'/3'; ?>" target="_blank">
								<button class="btn btn-primary btn-block"><span class="glyphicon glyphicon-print" aria-hidden="true"> Print</button>
							</a>
						</div>
						<div class="col-sm-2 col-md-2 col-lg-2">
							<a href="<?php echo base_url().'index.php/Petugas/download_laporan_bulanan/'.$bulan.'/'.$tahun.'/2'; ?>" target="_blank">
								<button class="btn btn-primary btn-block"><span class="glyphicon glyphicon-save" aria-hidden="true">  Download PDF </button>
							</a>
							<br>
						</div>
					</div>
					<table class="table table-striped table-bordered table-hover" width="100%">
				    <thead class="text-center" style="background-color:#FFCCBC; font-size:10px">
				      <tr class="text-center">
				        <td rowspan="2"><br><br><b>No</b></td>
				        <td rowspan="2"><br><br><b>Nomor Anggota</b></td>
				        <td rowspan="2"><br><br><b>Nama</b></td>
				        <td rowspan="2"><br><br><b>JK</b></td>
				        <td rowspan="2"><br><br><b>Alamat</b></td>
				        <td colspan="4"><b>Simpanan</b></td>
				        <td colspan="7"><b>Pinjaman</b></td>
				      </tr>
				      <tr class="text-center" style="background-color:#FFCCBC; font-size:10px">
				        <td><b> Simpanan<br>Wajib</b></td>
				        <td><b> Simpanan<br>Sukarela</b></td>
				        <td><b> Total<br>Simp. Wajib</b></td>
				        <td><b> Total<br>Simp. Sukarela</b></td>
				        <td><b> Pinjaman</b></td>
				        <td><b> Tanggal<br>Pinjam</b></td>
				        <td><b> Jml<br>Angsur</b></td>
				        <td><b> Sisa<br>Tang. Pinjaman</b></td>
				        <td><b> Angs.<br>Ke-</b></td>
				        <td><b> Angsuran</b></td>
				        <td><b> Jasa</b></td>
				      </tr>
				    </thead>
				    <tbody>
				      <?php $iterasi = 1; ?>
				      <?php foreach ($data_lapor as $anggota) { ?>
				        <tr class="noExl" style="font-size:10px">
				          <td class="text-center"><?php echo $iterasi; ?></td>
				          <td><?php echo $anggota->nokta; ?> &emsp;</td>
				          <td><?php echo $anggota->nama; ?> &emsp;</td>
				          <td class="text-center"><?php echo $anggota->jk; ?></td>
				          <td><?php echo $anggota->alamat; ?> &emsp;</td>
				          <td class="text-right">
				            <?php
				              if (is_numeric($anggota->simp_wajib)) {
				                echo number_format($anggota->simp_wajib, 0, ".", ".");
				              }
				              else {
				                echo $anggota->simp_wajib;
				              }
				             ?>
				          </td>
				          <td class="text-right">
				            <?php
				              if (is_numeric($anggota->simp_suka)) {
				                echo number_format($anggota->simp_suka, 0, ".", ".");
				              }
				              else {
				                echo $anggota->simp_suka;
				              }
				             ?>
				          </td>
				          <td class="text-right">
				            <?php
				              if (is_numeric($anggota->total_simp_wajib)) {
				                echo number_format($anggota->total_simp_wajib, 0, ".", ".");
				              }
				              else {
				                echo $anggota->total_simp_wajib;
				              }
				             ?>
				          </td>
				          <td class="text-right">
				            <?php
				              if (is_numeric($anggota->total_simp_suka)) {
				                echo number_format($anggota->total_simp_suka, 0, ".", ".");
				              }
				              else {
				                echo $anggota->total_simp_suka;
				              }
				             ?>
				          </td>
				          <td class="text-right">
				            <?php
				              if (is_numeric($anggota->tang_pinjam)) {
				                echo number_format($anggota->pinjaman, 0, ".", ".");
				              }
				              else {
				                echo $anggota->tang_pinjam;
				              }
				             ?>
				          </td>
				          <td class="text-center"><?php echo $anggota->tanggal_pinjam ?></td>
				          <td class="text-center"><?php echo $anggota->lama ?></td>
				          <td class="text-right">
				            <?php
				              if (is_numeric($anggota->tang_pinjam)) {
				                echo number_format($anggota->tang_pinjam, 0, ".", ".");
				              }
				              else {
				                echo $anggota->tang_pinjam;
				              }
				             ?>
				          </td>
				          <td class="text-center"><?php echo $anggota->angsuran_ke ?></td>
				          <td class="text-right">
				            <?php
				              if (is_numeric($anggota->angsuran)) {
				                echo number_format($anggota->angsuran, 0, ".", ".");
				              }
				              else {
				                echo $anggota->angsuran;
				              }
				             ?>
				          </td>
				          <td class="text-right">
				            <?php
				              if (is_numeric($anggota->jasa)) {
				                echo number_format($anggota->jasa, 0, ".", ".");
				              }
				              else {
				                echo $anggota->jasa;
				              }
				             ?>
				          </td>
				        </tr>
				      <?php $iterasi++; } ?>
				    </tbody>
				  </table>
					<?php
				}?>
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /#page-wrapper -->

	</div>
	<!-- /#wrapper -->

	<!-- jQuery -->
	<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/jquery/jszip.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/jquery/FileSaver.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/jquery/excel-gen.js"></script>

	<script type="text/javascript">
	myExcel = new ExcelGen({
		"src_id": "tabelData"
	});
		function exportToExcel(){
			excel.generate();
		}
	</script>

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
