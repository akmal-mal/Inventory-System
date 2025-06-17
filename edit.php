<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM barang WHERE id=$id");
$d = mysqli_fetch_array($data);

// Daftar kategori
$kategori_list = ["Elektronik", "ATK", "Makanan", "Minuman", "Lainnya"];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Barang</title>
  <style>
    body { font-family: Arial; background: #f4f4f4; padding: 20px; }
    form { background: white; padding: 30px; max-width: 500px; margin: auto; border-radius: 8px; }
    input, select { width: 100%%; padding: 10px; margin: 10px 0; }
    button { padding: 10px 20px; background: #007bff; color: white; border: none; }
  </style>
</head>
<body>
  <h2>Edit Barang</h2>
  <form method="POST" action="update.php">
    <input type="hidden" name="id" value="<?= $d['id'] ?>">
    <input type="text" name="nama_barang" value="<?= $d['nama_barang'] ?>" required><br>
    <select name="kategori" required>
      <?php foreach ($kategori_list as $k): ?>
        <option value="<?= $k ?>" <?= ($d['kategori'] == $k ? 'selected' : '') ?>><?= $k ?></option>
      <?php endforeach; ?>
    </select><br>
    <input type="number" name="jumlah" value="<?= $d['jumlah'] ?>" required><br>
    <input type="number" name="harga" value="<?= $d['harga'] ?>" required><br>
    <button type="submit">Update</button>
  </form>
</body>
</html>