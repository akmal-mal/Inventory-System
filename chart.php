<?php
include 'koneksi.php';

// Ambil data jumlah barang per kategori
$query = mysqli_query($koneksi, "SELECT kategori, SUM(jumlah) as total FROM barang GROUP BY kategori");

$kategori = [];
$total = [];

while ($row = mysqli_fetch_assoc($query)) {
  $kategori[] = $row['kategori'];
  $total[] = $row['total'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Grafik Stok Barang</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body { font-family: Arial; padding: 40px; background: #f4f4f4; }
    canvas { max-width: 700px; margin: auto; display: block; background: white; padding: 20px; border-radius: 10px; }
    h2 { text-align: center; color: #333; }
  </style>
</head>
<body>
  <h2>Grafik Stok Barang per Kategori</h2>
  <canvas id="myChart"></canvas>
  <script>
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?= json_encode($kategori) ?>,
        datasets: [{
          label: 'Jumlah Barang',
          data: <?= json_encode($total) ?>,
          backgroundColor: 'rgba(54, 162, 235, 0.7)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: { beginAtZero: true }
        }
      }
    });
  </script>
</body>
</html>