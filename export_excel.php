<?php
include 'koneksi.php';

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data_Barang.xls");

$data = mysqli_query($koneksi, "SELECT * FROM barang");
?>
<table border="1">
  <tr>
    <th>No</th>
    <th>Nama Barang</th>
    <th>Kategori</th>
    <th>Jumlah</th>
    <th>Harga</th>
    <th>Tanggal Input</th>
  </tr>
  <?php
  $no = 1;
  while($d = mysqli_fetch_array($data)) {
  ?>
  <tr>
    <td><?= $no++ ?></td>
    <td><?= $d['nama_barang'] ?></td>
    <td><?= $d['kategori'] ?></td>
    <td><?= $d['jumlah'] ?></td>
    <td><?= $d['harga'] ?></td>
    <td><?= $d['tanggal_input'] ?></td>
  </tr>
  <?php } ?>
</table>
