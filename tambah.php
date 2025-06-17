<?php
include 'koneksi.php';
$nama = $_POST['nama_barang'];
$kategori = $_POST['kategori'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];
$satuan = $_POST['satuan_barang'];
$lokasi = $_POST['lokasi'];
$supplier = $_POST['supplier'];
$status = $_POST['status'];
$barcode = $_POST['barcode'];

mysqli_query($koneksi, "INSERT INTO barang (nama_barang, kategori, jumlah, harga, satuan_barang, lokasi, supplier, status, barcode)
VALUES ('$nama','$kategori','$jumlah','$harga','$satuan','$lokasi','$supplier','$status','$barcode')");

header("Location: index.php");
?>
