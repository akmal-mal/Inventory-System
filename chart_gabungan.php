<?php
include 'koneksi.php';

$query = mysqli_query($koneksi, "SELECT kategori, SUM(jumlah) AS total, AVG(harga) AS avg_harga FROM barang GROUP BY kategori");

$kategori = [];
$total = [];
$avg = [];

while ($row = mysqli_fetch_assoc($query)) {
  $kategori[] = $row['kategori'];
  $total[] = $row['total'];
  $avg[] = round($row['avg_harga']);
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Grafik Gabungan</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body { font-family: Arial; background: #f0f0f0; padding: 20px; }
    .chart-container { display: flex; gap: 40px; justify-content: center; flex-wrap: wrap; }
    canvas { background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
  </style>
</head>
<body>
  <h2 style="text-align:center;">Grafik Jumlah Barang & Rata-Rata Harga</h2>
  <div class="chart-container">
    <canvas id="barChart" width="500" height="400"></canvas>
    <canvas id="pieChart" width="400" height="400"></canvas>
  </div>
  <script>
    const kategori = <?= json_encode($kategori) ?>;
    const total = <?= json_encode($total) ?>;
    const avg = <?= json_encode($avg) ?>;

    new Chart(document.getElementById('barChart'), {
      type: 'bar',
      data: {
        labels: kategori,
        datasets: [
          {
            label: 'Jumlah Barang',
            data: total,
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
          },
          {
            label: 'Rata-rata Harga',
            data: avg,
            backgroundColor: 'rgba(255, 99, 132, 0.6)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
          }
        ]
      },
      options: { responsive: true, scales: { y: { beginAtZero: true } } }
    });

    new Chart(document.getElementById('pieChart'), {
      type: 'pie',
      data: {
        labels: kategori,
        datasets: [{
          data: total,
          backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF']
        }]
      }
    });
  </script>
</body>
</html>