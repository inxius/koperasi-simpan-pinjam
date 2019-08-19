<html>
  <head>
    <title></title>
    <link href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <center>
      <table>
        <tr>
          <td><img src="<?php echo base_url() ?>assets/img/logo.png" alt="" height="82" width="82"></td>
          <td></td>
          <td class="text-center">
            <h3>Kartu Pinjaman</h3>
            <h4>Koperasi Simpan Pinjam "BKM Sinduadi"</h4>
          </td>
          <td><img src="<?php echo base_url() ?>assets/img/logo.png" alt="" height="82" width="82"></td>
        </tr>
      </table>
    </center>


    <hr>
    <table>
      <?php foreach ($data_send as $anggota) {    ?>
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
        <td><h5>Jenis Kelamin</h5></td>
        <td><h5>&emsp; = &emsp;</h5></td>
        <td><h5><?php echo $anggota->jk; ?></h5></td>
      </tr>
      <tr>
        <td><h5>Alamat</h5></td>
        <td><h5>&emsp; = &emsp;</h5></td>
        <td><h5><?php echo $anggota->alamat; ?></h5></td>
      </tr>
      <tr>
        <td><h5>No. Telp</h5></td>
        <td><h5>&emsp; = &emsp;</h5></td>
        <td><h5><?php echo $anggota->no_telp; ?></h5></td>
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
    <hr>
    <table border="0" width="100%">
      <?php
      $k = 1;
      for ($i=0; $i < 12; $i++) {
        ?>
        <tr>
          <?php for ($j=0; $j < 4; $j++) {
            ?>
              <td>
                <div class="text-center" style="border:1px solid black;">
                  <br>
                  <h4>Angsuran Ke</h4>
                  <h4><?php echo $k; ?></h4>
                  <br>
                </div>
              </td>
            <?php $k++;
          } ?>
        </tr>
        <?php
      } ?>
    </table>

    <script>
      window.print();
    </script>
  </body>
</html>
