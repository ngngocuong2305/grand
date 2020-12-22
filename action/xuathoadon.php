<?php
	include 'config.php';
	$sql_user = "SELECT * FROM hoadon inner join user on hoadon.id = user.id ";
	$query_user = mysqli_query($connect, $sql_user);
	$sql_prd = "SELECT * FROM hoadon inner join products on hoadon.prd_id = products.prd_id ";
	$query_prd = mysqli_query($connect, $sql_prd);
 ?>
<div class="container-fluid">
	<a class="btn btn-primary" href="index.php?page_layout=home">Trang chủ</a>
	<div class="card">
		<div class="card-header">
			<h2>Danh sách hóa đơn</h2>
		</div>
		<div class="card-body">
			<form action="index.php?page_layout=xuathoadon" method = "POST">
					<div class="form-group">
						<label for="keyword">Tìm kiếm</label>
						<input type="text" class = "form-control" name= "keyword">
						<button type  = "submit" name = "submit" class = "btn btn-primary">Lọc</button>
					</div>
					<?php 
						if( isset ($_POST['submit']) && $_POST["keyword"] != '' ) {
						$keyword = $_POST["keyword"]; 
						$sql_user =  "SELECT * FROM hoadon inner join user on hoadon.id = user.id WHERE username LIKE '%$keyword%' ";
						$query_user = mysqli_query($connect,$sql_user);}
					?>
			</form>

			<table class="table">
				<thead class = "thead-dark">
					<tr>
						<th>#</th>
						<th>Tên người mua</th>
						<th>Tên sản phẩm</th>
						<th>Giá sản phẩm</th>
						<th>Số lượng</th>
						<th>Tổng</th>
						<th>Ngày thêm hóa đơn</th>
						<th>Trạng thái</th>
						<th>#</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						while ($row_user = mysqli_fetch_assoc($query_user) and $row_prd = mysqli_fetch_assoc($query_prd) ){?>
							<tr>
								<td><?php echo $i++; ?></th>
								<td><?php echo $row_user['username']; ?></td>
								<td><?php echo $row_prd['prd_name']; ?></td>
								<td><?php echo $row_prd['price']; ?></td>
								<td><?php echo $row_prd['sl']; ?></td>
								<td><?php echo $row_prd['total']; ?></td>
								<td><?php echo $row_prd['ngay']; ?></td>
								<td><?php echo $row_prd['status']; ?></td>
								<td>
									<a href="index.php?page_layout=print">In hóa đơn</a>
								</td>
							</tr>
						<?php } ?>
				</tbody>
			</table>
			<a class="btn btn-primary" href="index.php?page_layout=hoadon">Thêm mới</a>
		</div>
	</div>
	<a class="btn btn-primary" href="logout.php">Đăng xuất</a>
</div>

