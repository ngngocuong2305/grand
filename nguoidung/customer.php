<?php 
	include 'config.php';
	$sql_info = "SELECT * FROM info inner join user on info.id = user.id ";
 ?>

<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h2><?php echo "Xin chào khách hàng: " . $_SESSION["user"];?></h2>
		</div>
		<div class="card-body">
			<table class="table">
				<thead class = "thead-dark">
					<tr>
						<th>#</th>
						<th>#</th>
						<th>#</th>
						<th>#</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><a class="btn btn-primary" href="index.php?page_layout=item">Danh mục sản phẩm</a></th>
						<td><a class="btn btn-primary" href="">Đánh giá</a></td>
						<td>
							<a class="btn btn-primary" href="index.php?page_layout=yourinfo">Thông tin cá nhân</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<td><a class="btn btn-primary" href="logout.php">Đăng xuất</a></th>
</div>