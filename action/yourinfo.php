<?php
	include 'config.php';
	$keyword = $_SESSION["user"];
	$sql_info =  "SELECT * FROM info inner join user on info.id = user.id WHERE username LIKE 
						'%$keyword%' ";
	$query_info = mysqli_query($connect,$sql_info);
 ?>

<div class="container-fluid">
	<a class="btn btn-primary" href="index.php?page_layout=home">Trang chủ</a>

	<div class="card">
		<div class="card-header">
			<h2>Thông tin người dùng</h2>
		</div>
		<div class="card-body">

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
						<th>Sửa</th>
						<th>Xóa</th>
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
								<td>
									<a href="index.php?page_layout=suainfo&if_id=<?php echo $row_info['info_id']; ?>">Sửa</a>
								</td>
								<td>
									<a onclick="return Del('<?php echo $row_info['username']; ?>')" href="index.php?page_layout=xoainfo&if_id=<?php echo $row_info['info_id']; ?>">Xóa</a>
								</td>
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
