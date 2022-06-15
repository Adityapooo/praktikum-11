<?php
include('koneksi.php');
$label = ["India","Korea Selatan","Turkey","Vietnam","Japan","Iran","Indonesia","Malaysia","Thailand","Israel"];

for($bulan = 1;$bulan < 11;$bulan++)
{
	$query = mysqli_query($conn,"SELECT sum(total_covid) AS jumlah FROM tb_covid WHERE id_negara='$bulan'");
	$row = $query->fetch_array();
	$jumlah_produk[] = $row['jumlah'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Membuat Grafik Menggunakan Chart JS</title>
	<script type="text/javascript" src="Chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <style>
            body {
                padding-top: 5%;
            }
        </style>
</head>
<body>
    <center><h2>GRAFIK BAR KASUS COVID-19</h2><center>
        <br>
	<center><div style="width: 800px;height: 800px">
		<canvas id="myChart"></canvas>
	</div><center>


	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($label); ?>,
				datasets: [{
					label: 'Grafik Total Kasus COVID-19',
					data: <?php echo json_encode($jumlah_produk); ?>,
					backgroundColor: ['rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
                    'rgba(133, 196, 155, 0.2)',
                    'rgba(93, 33, 148, 0.2)',
                    'rgba(20, 4, 160, 0.2)',
                    'rgba(117, 48, 15, 0.2)',
                    'rgba(234, 214, 77, 0.2)',
                    'rgba(50, 96, 17, 0.2)'
					],
					borderColor: ['rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
                    'rgba(133, 196, 155, 1)',
                    'rgba(93, 33, 148, 1)',
                    'rgba(20, 4, 160, 1)',
                    'rgba(117, 48, 15, 1)',
                    'rgba(234, 214, 77, 1)',
                    'rgba(50, 96, 17, 1)'
					],
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