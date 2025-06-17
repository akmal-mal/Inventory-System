<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
$user = mysqli_fetch_assoc($query);

if ($user) {
  $_SESSION['login'] = true;
  $_SESSION['username'] = $user['username'];
  $_SESSION['role'] = $user['role'];
  header("Location: index.php");
} else {
  header("Location: login.php?msg=Login gagal!");
}
