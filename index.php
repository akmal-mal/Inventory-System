<?php
include 'proteksi.php';
include 'koneksi.php';
$role = $_SESSION['role'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Inventory - Pencarian & Pagination</title>
  <style>
    body { font-family: Arial; padding: 20px; background: #f4f4f4; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; background: #fff; }
    th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
    form { margin: 10px 0; }
    input, select, button { padding: 8px; margin: 5px; }
    .pagination a { margin: 0 5px; padding: 6px 12px; background: #007bff; color: white; text-decoration: none; }
    .pagination a.active { background: #0056b3; }
  </style>
</head>
<body>
<?php
$total = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM barang"))['total'];
$stok_tersedia = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as tersedia FROM barang WHERE status='Tersedia'"))['tersedia'];
$stok_habis = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as habis FROM barang WHERE status='Habis'"))['habis'];
$kategori_unik = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(DISTINCT kategori) as kategori FROM barang"))['kategori'];
$supplier_unik = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(DISTINCT supplier) as supplier FROM barang"))['supplier'];
?>

<div style="display: flex; gap: 20px; flex-wrap: wrap; margin-bottom: 20px;">
  <div style="flex:1; background:#007bff; color:white; padding:15px; border-radius:8px;">
    <strong>Total Barang:</strong> <?= $total ?>
  </div>
  <div style="flex:1; background:#28a745; color:white; padding:15px; border-radius:8px;">
    <strong>Stok Tersedia:</strong> <?= $stok_tersedia ?>
  </div>
  <div style="flex:1; background:#dc3545; color:white; padding:15px; border-radius:8px;">
    <strong>Stok Habis:</strong> <?= $stok_habis ?>
  </div>
  <div style="flex:1; background:#17a2b8; color:white; padding:15px; border-radius:8px;">
    <strong>Jumlah Kategori:</strong> <?= $kategori_unik ?>
  </div>
  <div style="flex:1; background:#ffc107; color:#333; padding:15px; border-radius:8px;">
    <strong>Jumlah Supplier:</strong> <?= $supplier_unik ?>
  </div>
</div>
<p>
  Login sebagai: <strong><?= $_SESSION['username'] ?? '' ?> (<?= $role ?>)</strong> |
  <a href="logout.php" onclick="return confirm('Keluar dari sistem?')">🔒 Logout</a>
</p>

  <h2>Daftar Barang</h2>
  <form method="GET" action="">
    <input type="text" name="search" placeholder="Cari nama atau kategori..." value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
    <select name="status">
      <option value="">-- Semua Status --</option>
      <option value="Tersedia" <?= (isset($_GET['status']) && $_GET['status'] == 'Tersedia') ? 'selected' : '' ?>>Tersedia</option>
      <option value="Habis" <?= (isset($_GET['status']) && $_GET['status'] == 'Habis') ? 'selected' : '' ?>>Habis</option>
    </select>
    <button type="submit">🔍 Cari</button>
  </form>

  <table>
    <tr>
      <th>No</th><th>Nama</th><th>Kategori</th><th>Jumlah</th><th>Harga</th><th>Status</th><th>Aksi</th>
    </tr>
    <?php
    $batas = 10;
    $hal = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
    $mulai = ($hal > 1) ? ($hal * $batas) - $batas : 0;

    $filter = "";
    if (!empty($_GET['search'])) {
      $search = $_GET['search'];
      $filter .= " AND (nama_barang LIKE '%$search%' OR kategori LIKE '%$search%')";
    }
    if (!empty($_GET['status'])) {
      $status = $_GET['status'];
      $filter .= " AND status='$status'";
    }

    $total = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM barang WHERE 1=1 $filter"));
    $pages = ceil($total / $batas);

    $data = mysqli_query($koneksi, "SELECT * FROM barang WHERE 1=1 $filter LIMIT $mulai, $batas");
    $no = $mulai + 1;
    while ($d = mysqli_fetch_array($data)) {
    ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $d['nama_barang'] ?></td>
      <td><?= $d['kategori'] ?></td>
      <td><?= $d['jumlah'] ?></td>
      <td><?= $d['harga'] ?></td>
      <td><?= $d['status'] ?></td>
      <td>
         <?php if ($role == 'admin'): ?>
    <a href="edit.php?id=<?= $d['id'] ?>">Edit</a> |
    <a href="hapus.php?id=<?= $d['id'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
  <?php else: ?>
    -
  <?php endif; ?>
      </td>
    </tr>
    <?php } ?>
  </table>

  <div class="pagination">
    <?php for ($i = 1; $i <= $pages; $i++): ?>
      <a href="?hal=<?= $i ?>&search=<?= $_GET['search'] ?? '' ?>&status=<?= $_GET['status'] ?? '' ?>" class="<?= ($i == $hal) ? 'active' : '' ?>"><?= $i ?></a>
    <?php endfor; ?>
  </div>

</body>
</html>
