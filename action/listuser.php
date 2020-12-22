<?php
	include 'config.php';
	$sql = "SELECT * FROM user inner join user_level on user.level_id = user_level.level_id ";
	$query = mysqli_query($connect, $sql);

 ?>

<div class="container-fluid">
	<a class="btn btn-primary" href="index.php?page_layout=home">Trang chủ</a>
	<div class="card">
		<div class="card-header">
			<h2>Danh sách người dùng</h2>
		</div>
		<div class="card-body">
			<table class="table">
				<thead class = "thead-dark">
					<tr>
						<th>#</th>
						<th>Quản lí</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$rowlv = mysqli_fetch_array($query);
						$sqllv = "SELECT * FROM user where level_id = 1";
						$querylv = mysqli_query($connect, $sqllv);
						$i = 1;
						while ($row = mysqli_fetch_assoc($querylv)){?>
							<tr>
								<td><?php echo $i++; ?></th>
								<td><?php echo $row['username']; ?></td>
							</tr>

					<?php } ?>
				</tbody>

				<thead class = "thead-dark">
					<tr>
						<th>#</th>
						<th>Nhân viên</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$rowlv = mysqli_fetch_array($query);
						$sqllv = "SELECT * FROM user where level_id = 2";
						$querylv = mysqli_query($connect, $sqllv);
						$i = 1;
						while ($row = mysqli_fetch_assoc($querylv)){?>
							<tr>
								<td><?php echo $i++; ?></th>
								<td><?php echo $row['username']; ?></td>
							</tr>

					<?php } ?>
				</tbody>

				<thead class = "thead-dark">
					<tr>
						<th>#</th>
						<th>Khách hàng</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$rowlv = mysqli_fetch_array($query);
						$sqllv = "SELECT * FROM user where level_id = 3";
						$querylv = mysqli_query($connect, $sqllv);
						$i = 1;
						while ($row = mysqli_fetch_assoc($querylv)){?>
							<tr>
								<td><?php echo $i++; ?></th>
								<td><?php echo $row['username']; ?></td>
							</tr>

					<?php } ?>
				</tbody>
			</table>
			<a class="btn btn-primary" href="register.php">Thêm mới</a>
			
		</div>
	</div>
	<a class="btn btn-primary" href="logout.php">Đăng xuất</a>
</div>
<script>
	function	Del(name){
		return confirm("Bạn có chắc chắn muốn xóa người dùng: " + name + "?");
	}
</script>
