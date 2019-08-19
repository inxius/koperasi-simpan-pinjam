<?php
header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=laporan.xls");
 ?>

 <table border="1" width="100%">
   <thead>
     <tr class="noExl">
       <td>No</td>
       <td>Nomor Anggota</td>
       <td>Nama</td>
       <td>JK</td>
       <td>Alamat</td>
       <td>Simpanan Wajib</td>
       <td>Simpanan Sukarela</td>
       <td>Total Simpanan Wajib</td>
       <td>Total Simpanan Sukarela</td>
       <td>Sisa Tanggungan Pinjaman</td>
       <td>Angsuran</td>
       <td>Jasa</td>
     </tr>
   </thead>
   <tbody>
     <?php $iterasi = 1; ?>
     <?php foreach ($data_lapor as $anggota) { ?>
       <tr class="noExl">
         <td><?php echo $iterasi; ?></td>
         <td><?php echo $anggota->nokta; ?></td>
         <td><?php echo $anggota->nama; ?></td>
         <td><?php echo $anggota->jk; ?></td>
         <td><?php echo $anggota->alamat; ?></td>
         <td><?php echo $anggota->simp_wajib; ?></td>
         <td><?php echo $anggota->simp_suka; ?></td>
         <td><?php echo $anggota->total_simp_wajib; ?></td>
         <td><?php echo $anggota->total_simp_suka; ?></td>
         <td><?php echo $anggota->tang_pinjam; ?></td>
         <td><?php echo $anggota->angsuran; ?></td>
         <td><?php echo $anggota->jasa; ?></td>
       </tr>
     <?php $iterasi++; } ?>
   </tbody>
 </table>
