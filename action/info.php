<?php
	include 'config.php';
	$sql_info = "SELECT * FROM info inner join user on info.id = user.id ";
	$query_info = mysqli_query($connect, $sql_info);
 ?>

<div class="container-fluid">
	<a class="btn btn-primary" href="index.php?page_layout=home">Trang chủ</a>

	<div class="card">
		<div class="card-header">
			<h2>Thông tin người dùng</h2>
		</div>
		<div class="card-body">
			<form action="index.php?page_layout=info" method = "POST">
					<div class="form-group">
						<label for="keyword">Tìm kiếm</label>
						<input type="text" class = "form-control" name= "keyword">
						<button type  = "submit" name = "submit" class = "btn btn-primary">Lọc</button>
					</div>
					<?php 
						if( isset ($_POST['submit']) && $_POST["keyword"] != '' ) {
						$keyword = $_POST["keyword"]; 
						$sql_info =  "SELECT * FROM info inner join user on info.id = user.id WHERE username LIKE '%$keyword%' ";
						$query_info = mysqli_query($connect,$sql_info);}
						if( isset ($_POST['submit']) && $_POST["keyword"] != '' ) {
						$keyword = $_POST["keyword"]; 
						$sql_info =  "SELECT * FROM info inner join user on info.id = user.id WHERE name LIKE '%$keyword%' ";
						$query_info = mysqli_query($connect,$sql_info);}
					?>
			</form>

			<table class="table">
				<thead class = "thead-dark">
					<tr>
						<th>#</th>
						<th>Tài khoản</th>
						<th>Tên đầy đủ</th>
						<th>Địa chỉ</th>
						<th>Số điện thoại</th>
						<th>E-mail</th>
						<th>Điểm</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						while ($row_info = mysqli_fetch_assoc($query_info)){?>
							<tr>
								<td><?php echo $i++; ?></th>
								<td><?php echo $row_info['username']; ?></td>
								<td><?php echo $row_info['name']; ?></td>
								<td><?php echo $row_info['address']; ?></td>
								<td><?php echo $row_info['phone']; ?></td>
								<td><?php echo $row_info['email']; ?></td>
								<td><?php echo $row_info['core']; ?></td>
							</tr>
							
						<?php } ?>
				</tbody>
			</table>
			<a class="btn btn-primary" href="index.php?page_layout=addinfo">Thêm mới</a>
			
		</div>
	</div>
	<a class="btn btn-primary" href="logout.php">Đăng xuất</a>
</div>
<script>
	function	Del(name){
		return confirm("Bạn có chắc chắn muốn xóa sản phẩm: " + name + "?");
	}
</script>
