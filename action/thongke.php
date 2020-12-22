<?php
	include 'config.php';
	$quan = "SELECT SUM(quantity) AS sum_quan FROM products";
	$query_quan = mysqli_query($connect, $quan);
	$row_quan = mysqli_fetch_assoc($query_quan);
	$sum_quan = $row_quan['sum_quan'];

	$price_in = "SELECT SUM(price_in*quantity) AS sum_price_in FROM products";
	$query_price_in = mysqli_query($connect, $price_in);
	$row_price_in = mysqli_fetch_assoc($query_price_in);
	$sum_price_in = $row_price_in['sum_price_in'];

	$price = "SELECT SUM(price*quantity) AS sum_price FROM products";
	$query_price = mysqli_query($connect, $price);
	$row_price = mysqli_fetch_assoc($query_price);
	$sum_price = $row_price['sum_price'];


	$sl = "SELECT SUM(sl) AS sum_sl FROM hoadon";
	$query_sl = mysqli_query($connect, $sl);
	$row_sl = mysqli_fetch_assoc($query_sl);
	$sum_sl = $row_sl['sum_sl'];
	$total = "SELECT SUM(total) AS sum_total FROM hoadon";
	$query_total = mysqli_query($connect, $total);
	$row_total = mysqli_fetch_assoc($query_total);
	$sum_total = $row_total['sum_total'];

	$total_in = "SELECT SUM(total_in) AS sum_total_in FROM hoadon";
	$query_total_in = mysqli_query($connect, $total_in);
	$row_total_in = mysqli_fetch_assoc($query_total_in);
	$sum_total_in = $row_total_in['sum_total_in'];

	$lai  = $sum_total - $sum_total_in;

?>

<div class="container-fluid">
	<a class="btn btn-primary" href="index.php?page_layout=home">Trang chủ</a>
	<div class="card">
		<div class="card-header">
			<h2>Thống kê</h2>
		</div>
		<div class="card-body">
			<table class="table">
				<thead class = "thead-dark">
					<tr>
						<th>Số sản phẩm trong kho</th>
						<th>Tổng số tiền nhập hàng</th>
						<th>Tổng số tiền bán được dự kiến</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td> <?php echo $sum_quan ?> </td>
						<td> <?php echo $sum_price_in ?> </td>
						<td> <?php echo $sum_price ?> </td>
				</tbody>
			</table>

			<table class="table">
				<thead class = "thead-dark">
					<tr>
						<th>Số sản phẩm đã bán</th>
						<th>Tổng số tiền nhập hàng</th>
						<th>Tổng số tiền đã bán được</th>
						<th>Tiền lãi</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td> <?php echo $sum_sl ?> </td>
						<td> <?php echo $sum_total_in ?> </td>
						<td> <?php echo $sum_total ?> </td>
						<td> <?php echo $lai ?> </td>
				</tbody>
			</table>
		</div>
	</div>
	<a class="btn btn-primary" href="logout.php">Đăng xuất</a>
</div>