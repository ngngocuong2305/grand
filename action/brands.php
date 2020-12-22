<?php
	include 'config.php';
	$sql = "SELECT * FROM brands";
	$query = mysqli_query($connect, $sql);
 ?>

<div class="container-fluid">
	<a class="btn btn-primary" href="index.php?page_layout=home">Trang chủ</a>
	<div class="card">
		<div class="card-header">
			<h2>Danh sách thương hiệu</h2>
		</div>
		<div class="card-body">
			<table class="table">
				<thead class = "thead-dark">
					<tr>
						<th>#</th>
						<th>Thương hiệu</th>
						<th>Số sản phẩm đã cung cấp</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						while ($row = mysqli_fetch_assoc($query)){?>
							<tr>
								<td><?php echo $i++; ?></th>
								<td><?php echo $row['brand_name']; ?></td>
							</tr>
						<?php } ?>
				</tbody>
			</table>
			<a class="btn btn-primary" href="index.php?page_layout=addbrand">Thêm mới</a>
		</div>
	</div>
	<a class="btn btn-primary" href="logout.php">Đăng xuất</a>
</div>
