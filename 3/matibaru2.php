<?php
include('koneksi.php');
$produk = mysqli_query($conn,"SELECT * FROM tb_covid");
while($row = mysqli_fetch_array($produk)){
	$nama_produk[] = $row['negara'];
	
	$query = mysqli_query($conn,"SELECT sum(new_mati) AS jumlah FROM tb_covid WHERE id_negara='".$row['id_negara']."'");
	$jumlah_produk[] = $row['new_mati'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Membuat Grafik Menggunakan Chart JS</title>
	<script type="text/javascript" src="chart.js"></script>
</head>
<body>
	<div style="width: 800px;height: 800px">
		<canvas id="myChart"></canvas>
	</div>

	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($nama_produk); ?>,
				datasets: [{
					label: 'Grafik Covid Negara',
					data: <?php echo json_encode($jumlah_produk); ?>,
					backgroundColor: 'rgba(245, 39, 226, 0.8)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>