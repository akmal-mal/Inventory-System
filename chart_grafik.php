<?php
include 'koneksi.php';

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
  <title>Grafik Inventory</title>
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-light">

  <div class="container mt-5">
    <h2 class="text-center mb-4">📊 Grafik Inventory Barang</h2>
    
    <div class="row">
      <div class="col-md-6 mb-4">
        <div class="card shadow">
          <div class="card-body">
            <h5 class="card-title text-center">Jumlah Barang per Kategori</h5>
            <canvas id="barChart"></canvas>
          </div>
        </div>
      </div>
      
      <div class="col-md-6 mb-4">
        <div class="card shadow">
          <div class="card-body">
            <h5 class="card-title text-center">Distribusi Barang (Pie)</h5>
            <canvas id="pieChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Chart.js Script -->
  <script>
    const labels = <?= json_encode($kategori) ?>;
    const dataJumlah = <?= json_encode($total) ?>;

    new Chart(document.getElementById("barChart"), {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [{
          label: 'Jumlah Barang',
          data: dataJumlah,
          backgroundColor: 'rgba(54, 162, 235, 0.6)',
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

    new Chart(document.getElementById("pieChart"), {
      type: 'pie',
      data: {
        labels: labels,
        datasets: [{
          data: dataJumlah,
          backgroundColor: [
            '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'
          ]
        }]
      }
    });
  </script>
</body>
</html>
