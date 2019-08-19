<html>
<head>
	<title>tanda bukti transaksi</title>
  <link href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<page size="A4"></page>
</head>
<body>

	<center>
		<h2>KOPERASI SIMPAN PINJAM BKM SINDUADI</h2>
    <hr>
		<h4>TANDA BUKTI TRANSAKSI</h4>
	</center>

	<br/>

  <table>
    <tr>
      <td>Nomor Anggota &emsp; &emsp;</td>
      <td><?php echo $this->session->flashdata('nokta_cetak'); ?></td>
    </tr>
    <tr>
      <td>Nama &emsp; &emsp;</td>
      <td><?php echo $this->session->flashdata('nama_anggota'); ?></td>
    </tr>
  </table>
  <hr>
  <table>
    <tr>
      <td>No &emsp;</td>
      <td>Transaksi &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;</td>
      <td>Nominal &emsp; &emsp;</td>
    </tr>
    <?php if ($this->session->flashdata('transaksi1') != NULL) {
      ?>
      <tr>
        <td>1</td>
        <td><?php echo $this->session->flashdata('transaksi1'); ?></td>
        <td>Rp. <?php echo number_format($this->session->flashdata('nominal1'), 0, ".", "."); ?></td>
      </tr>
      <?php
    } ?>
    <?php if ($this->session->flashdata('transaksi2') != NULL) {
      ?>
      <tr>
        <td>2</td>
        <td><?php echo $this->session->flashdata('transaksi2'); ?></td>
        <td>Rp. <?php echo number_format($this->session->flashdata('nominal2'), 0, ".", "."); ?></td>
      </tr>
      <?php
    } ?>
    <?php if ($this->session->flashdata('transaksi3') != NULL) {
      ?>
      <tr>
        <td>3</td>
        <td><?php echo $this->session->flashdata('transaksi3'); ?></td>
        <td>Rp. <?php echo number_format($this->session->flashdata('nominal3'), 0, ".", "."); ?></td>
      </tr>
      <?php
    } ?>
  </table>
  <br>
  <hr>
      <table>
        <tr class="text-center">
          <td>&emsp; &emsp; &emsp; Petugas</td>
          <td>&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;</td>
          <td>Yogyakarta, <?php echo date('Y-m-d');?> <br> Penyetor </td>
        </tr>
        <tr>
          <td> <br><br> </td>
          <td> <br><br> </td>
        </tr>
        <tr class="text-center">
          <td>&emsp; &emsp; &emsp; <?php echo $this->session->flashdata('nama_petugas'); ?></td>
          <td></td>
          <td><?php echo $this->session->flashdata('nama_anggota'); ?></td>
        </tr>
      </table>
  <br>

  <p>----------------------------------------------------------------------------------------------------------------------------------------------------------</p>
  <center>
    <h2>KOPERASI SIMPAN PINJAM BKM SINDUADI</h2>
    <hr>
    <h4>TANDA BUKTI TRANSAKSI</h4>
  </center>

  <br/>

  <table>
    <tr>
      <td>Nomor Anggota &emsp; &emsp;</td>
      <td><?php echo $this->session->flashdata('nokta_cetak'); ?></td>
    </tr>
    <tr>
      <td>Nama &emsp; &emsp;</td>
      <td><?php echo $this->session->flashdata('nama_anggota'); ?></td>
    </tr>
  </table>
  <hr>
  <table>
    <tr>
      <td>No &emsp;</td>
      <td>Transaksi &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;</td>
      <td>Nominal &emsp; &emsp;</td>
    </tr>
    <?php if ($this->session->flashdata('transaksi1') != NULL) {
      ?>
      <tr>
        <td>1</td>
        <td><?php echo $this->session->flashdata('transaksi1'); ?></td>
        <td>Rp. <?php echo number_format($this->session->flashdata('nominal1'), 0, ".", "."); ?></td>
      </tr>
      <?php
    } ?>
    <?php if ($this->session->flashdata('transaksi2') != NULL) {
      ?>
      <tr>
        <td>2</td>
        <td><?php echo $this->session->flashdata('transaksi2'); ?></td>
        <td>Rp. <?php echo number_format($this->session->flashdata('nominal2'), 0, ".", "."); ?></td>
      </tr>
      <?php
    } ?>
    <?php if ($this->session->flashdata('transaksi3') != NULL) {
      ?>
      <tr>
        <td>3</td>
        <td><?php echo $this->session->flashdata('transaksi3'); ?></td>
        <td>Rp. <?php echo number_format($this->session->flashdata('nominal3'), 0, ".", "."); ?></td>
      </tr>
      <?php
    } ?>
  </table>
  <br>
  <hr>
  <table>
    <tr class="text-center">
      <td>&emsp; &emsp; &emsp; Petugas</td>
      <td>&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;</td>
      <td>Yogyakarta, <?php echo date('Y-m-d');?> <br> Penyetor </td>
    </tr>
    <tr>
      <td> <br><br> </td>
      <td> <br><br> </td>
    </tr>
    <tr class="text-center">
      <td>&emsp; &emsp; &emsp; <?php echo $this->session->flashdata('nama_petugas'); ?></td>
      <td></td>
      <td><?php echo $this->session->flashdata('nama_anggota'); ?></td>
    </tr>
  </table>
	<script>
		window.print();
	</script>

</body>
</html>
