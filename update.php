<?php
include 'koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama_barang'];
$kategori = $_POST['kategori'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];

mysqli_query($koneksi, "UPDATE barang SET nama_barang='$nama', kategori='$kategori', jumlah='$jumlah', harga='$harga' WHERE id=$id");
header("Location: index.php");
?>