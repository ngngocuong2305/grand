<?php
	include 'config.php';
	$sql = "SELECT * FROM products inner join brands on products.brand_id = brands.brand_id ";
	$query = mysqli_query($connect, $sql);
 ?>

<div class="container-fluid">
	<a class="btn btn-primary" href="index.php?page_layout=home">Trang chủ</a>

	<div class="card">
		<div class="card-header">
			<h2>Danh sách sản phẩm</h2>
		</div>
		<div class="card-body">
			<table class="table">
				<form action="index.php?page_layout=danhsach" method = "POST">
					<div class="form-group">
						<label for="keyword">Tìm kiếm</label>
						<input type="text" class = "form-control" name= "keyword">
						<button type  = "submit" name = "submit" class = "btn btn-primary">Lọc</button>
					</div>
					<?php 
						if( isset ($_POST['submit']) && $_POST["keyword"] != '' ) {
						$keyword = $_POST["keyword"]; 
						$sql = $sql = "SELECT * FROM products inner join brands on products.brand_id = brands.brand_id WHERE prd_name LIKE '%$keyword%' ";
						$query = mysqli_query($connect,$sql);}
					?>
				</form>
				<thead class = "thead-dark">
					<tr>
						<th>#</th>
						<th>Tên sản phẩm</th>
						<th>Ảnh sản phẩm</th>
						<th>Giá sản phẩm</th>
						<th>Số lượng sản phẩm</th>
						<th>Mô tả</th>
						<th>Thương hiệu</th>
						<th>Đặt hàng</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						while ($row = mysqli_fetch_assoc($query)){?>
							<tr>
								<td><?php echo $i++; ?></th>
								<td><?php echo $row['prd_name']; ?></td>
								<td>
									<img style="width: 100px;" src="img/<?php echo $row['image']; ?> ">
								</td>
								<td><?php echo $row['price']; ?></td>
								<td><?php echo $row['quantity']; ?></td>
								<td><?php echo $row['description']; ?></td>
								<td><?php echo $row['brand_name']; ?></td>
								<td>
									<div class="form-group form-check">
										<input type="checkbox" class= "form-check-input" name = "remember-me">
										<label for="add-item" class = "form-check-label"></label>
									</div>
								</td>
							</tr>
						<?php } ?>
				</tbody>
			</table>
			<a class="btn btn-primary" href="">Đặt hàng</a>
		</div>
	</div>
	<a class="btn btn-primary" href="logout.php">Đăng xuất</a>
</div>
