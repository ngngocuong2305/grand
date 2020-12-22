<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h2><?php echo "Xin chào quản lí: " . $_SESSION["user"];?></h2>
		</div>
		<div class="card-body">
			<table class="table">
				<thead class = "thead-dark">
					<tr>
						<th>#</th>
						<th>#</th>
						<th>#</th>
						<th>#</th>
						<th>#</th>

					</tr>
				</thead>
				<tbody>
					<tr>
						<td><a class="btn btn-primary" href="index.php?page_layout=danhsach">Quản lý kho</a></td>
						<td><a class="btn btn-primary" href="index.php?page_layout=listuser">Quản lý người dùng</a></td>
						<td><a class="btn btn-primary" href="index.php?page_layout=info">Thông tin người dùng</a></td>
						<td><a class="btn btn-primary" href="index.php?page_layout=thongke">Thống kê</a></td>
						<td><a class="btn btn-primary" href="index.php?page_layout=brands">Thương hiệu</a></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<td><a class="btn btn-primary" href="logout.php">Đăng xuất</a></td>
</div>