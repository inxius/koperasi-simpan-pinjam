<html>
<head>
	<title>Laporan Bulanan</title>
  <link href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
  if ($bulan == 1) {
    $bulan = "Januari";
  }
  if ($bulan == 2) {
    $bulan = "February";
  }
  if ($bulan == 3) {
    $bulan = "Maret";
  }
  if ($bulan == 4) {
    $bulan = "April";
  }
  if ($bulan == 5) {
    $bulan = "Mei";
  }
  if ($bulan == 6) {
    $bulan = "Juni";
  }
  if ($bulan == 7) {
    $bulan = "Juli";
  }
  if ($bulan == 8) {
    $bulan = "Agustus";
  }
  if ($bulan == 9) {
    $bulan = "September";
  }
  if ($bulan == 10) {
    $bulan = "Oktober";
  }
  if ($bulan == 11) {
    $bulan = "November";
  }
  if ($bulan == 12) {
    $bulan = "Desember";
  }
 ?>
	<center>
		<h4>KOPERASI SIMPAN PINJAM BKM SINDUADI</h4>
		<h4>Laporan Bulan <?php echo $bulan; ?> Tahun <?php echo $tahun; ?></h4>
		<hr>
	</center>

	<br/>

  <table border="1" width="100%">
    <thead>
      <tr class="text-center">
        <td rowspan="2">No</td>
        <td rowspan="2">Nomor Anggota</td>
        <td rowspan="2">Nama</td>
        <td rowspan="2">JK</td>
        <td rowspan="2">Alamat</td>
        <td colspan="4">Simpanan</td>
        <td colspan="7">Pinjaman</td>
      </tr>
      <tr class="text-center">
        <td><font size="2"> Simpanan<br>Wajib<font></td>
        <td><font size="2"> Simpanan<br>Sukarela<font></td>
        <td><font size="2"> Total<br>Simp. Wajib<font></td>
        <td><font size="2"> Total<br>Simp. Sukarela<font></td>
        <td><font size="2"> Pinjaman<font></td>
        <td><font size="2"> Tanggal<br>Pinjam<font></td>
        <td><font size="2"> Jml<br>Angsur<font></td>
        <td><font size="2"> Sisa<br>Tang. Pinjaman<font></td>
        <td><font size="2"> Angs.<br>Ke-<font></td>
        <td><font size="2"> Angsuran<font></td>
        <td><font size="2"> Jasa<font></td>
      </tr>
    </thead>
    <tbody>
      <?php $iterasi = 1; ?>
      <?php foreach ($data_lapor as $anggota) { ?>
        <tr class="noExl">
          <td class="text-center"><font size="2"><?php echo $iterasi; ?><font></td>
          <td><font size="2"><?php echo $anggota->nokta; ?> &emsp;<font></td>
          <td><font size="2"><?php echo $anggota->nama; ?> &emsp;<font></td>
          <td class="text-center"><font size="2"><?php echo $anggota->jk; ?><font></td>
          <td><font size="2"><?php echo $anggota->alamat; ?> &emsp;<font></td>
          <td class="text-right"><font size="2">
            <?php
              if (is_numeric($anggota->simp_wajib)) {
                echo number_format($anggota->simp_wajib, 0, ".", ".");
              }
              else {
                echo $anggota->simp_wajib;
              }
             ?>
          <font></td>
          <td class="text-right"><font size="2">
            <?php
              if (is_numeric($anggota->simp_suka)) {
                echo number_format($anggota->simp_suka, 0, ".", ".");
              }
              else {
                echo $anggota->simp_suka;
              }
             ?>
          <font></td>
          <td class="text-right"><font size="2">
            <?php
              if (is_numeric($anggota->total_simp_wajib)) {
                echo number_format($anggota->total_simp_wajib, 0, ".", ".");
              }
              else {
                echo $anggota->total_simp_wajib;
              }
             ?>
          <font></td>
          <td class="text-right"><font size="2">
            <?php
              if (is_numeric($anggota->total_simp_suka)) {
                echo number_format($anggota->total_simp_suka, 0, ".", ".");
              }
              else {
                echo $anggota->total_simp_suka;
              }
             ?>
          <font></td>
          <td class="text-right"><font size="2">
            <?php
              if (is_numeric($anggota->pinjaman)) {
                echo number_format($anggota->pinjaman, 0, ".", ".");
              }
              else {
                echo $anggota->pinjaman;
              }
             ?>
          <font></td>
          <td class="text-center"><font size="2"><?php echo $anggota->tanggal_pinjam ?><font></td>
          <td class="text-center"><font size="2"><?php echo $anggota->lama ?><font></td>
          <td class="text-right"><font size="2">
            <?php
              if (is_numeric($anggota->tang_pinjam)) {
                echo number_format($anggota->tang_pinjam, 0, ".", ".");
              }
              else {
                echo $anggota->tang_pinjam;
              }
             ?>
          <font></td>
          <td class="text-center"><font size="2"><?php echo $anggota->angsuran_ke ?><font></td>
          <td class="text-right"><font size="2">
            <?php
              if (is_numeric($anggota->angsuran)) {
                echo number_format($anggota->angsuran, 0, ".", ".");
              }
              else {
                echo $anggota->angsuran;
              }
             ?>
          <font></td>
          <td class="text-right"><font size="2">
            <?php
              if (is_numeric($anggota->jasa)) {
                echo number_format($anggota->jasa, 0, ".", ".");
              }
              else {
                echo $anggota->jasa;
              }
             ?>
          <font></td>
        </tr>
      <?php $iterasi++; } ?>
    </tbody>
  </table>

	<!-- <script>
		window.print();
	</script> -->

</body>
</html>
