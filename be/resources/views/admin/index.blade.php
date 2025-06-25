@extends('layouts.layout')

@section('content')
	<div class="head-title">
		<div class="left">
			<h1>Dashboard</h1>
			<ul class="breadcrumb">
				<li><a href="#">Dashboard</a></li>
				<li><i class='bx bx-chevron-right'></i></li>
				<li><a class="active" href="#">Home</a></li>
			</ul>
		</div>
		<a href="#" class="btn-download">
			<i class='bx bxs-cloud-download'></i>
			<span class="text">Download PDF</span>
		</a>
	</div>

	<ul class="box-info">
		<li>
			<i class='bx bxs-calendar-check'></i>
			<span class="text">
				<h3>1020</h3>
				<p>Đơn hàng mới</p>
			</span>
		</li>
		<li>
			<i class='bx bxs-group'></i>
			<span class="text">
				<h3>2834</h3>
				<p>Khách hàng mới</p>
			</span>
		</li>
		<li>
			<i class='bx bxs-dollar-circle'></i>
			<span class="text">
				<h3>15.430.000đ</h3>
				<p>Tổng tiền tháng</p>
			</span>
		</li>
		<li>
			<i class='bx bxs-calendar-check'></i>
			<span class="text">
				<h3>1020</h3>
				<p>Lịch đặt sân mới</p>
			</span>
		</li>
	</ul>

	<h3 class="thongke left">Thống Kê Hằng Năm</h3>
	<div class="gant-chart" style="width:100%;max-width:1200px;margin:32px auto;">
		<canvas id="statChart"></canvas>
	</div>
@endsection

@section('scripts')
<script>
	const ctx = document.getElementById('statChart').getContext('2d');
	const statChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: [
				'Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4',
				'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8',
				'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'
			],
			datasets: [
				{
					label: 'Tổng tiền (đ)',
					data: [12000000, 15000000, 18000000, 20000000, 17000000, 21000000, 25000000, 23000000, 19000000, 22000000, 24000000, 26000000],
					backgroundColor: 'rgba(54, 162, 235, 0.6)',
					yAxisID: 'y',
				},
				{
					label: 'Lượt mua hàng',
					data: [30, 45, 50, 60, 55, 70, 80, 75, 65, 68, 72, 90],
					backgroundColor: 'rgba(255, 206, 86, 0.6)',
					yAxisID: 'y1',
				}
			]
		},
		options: {
			responsive: true,
			interaction: { mode: 'index', intersect: false },
			scales: {
				y: {
					type: 'linear',
					position: 'left',
					title: { display: true, text: 'Tổng tiền (đ)' }
				},
				y1: {
					type: 'linear',
					position: 'right',
					grid: { drawOnChartArea: false },
					title: { display: true, text: 'Số lượt (Lần)' }
				}
			}
		}
	});
</script>
@endsection
