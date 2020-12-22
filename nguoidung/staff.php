</div>

<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h2><?php echo "Xin chào nhân viên: " . $_SESSION["user"];?></h2>
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
						<td><a class="btn btn-primary" href="index.php?page_layout=danhsach">Quản lý kho</a></th>
						<td><a class="btn btn-primary" href="index.php?page_layout=listuser">Quản lý người dùng</a></td>
						<td><a class="btn btn-primary" href="index.php?page_layout=hoadon">Tạo hóa đơn</a></th>
						<td><a class="btn btn-primary" href="index.php?page_layout=xuathoadon">Xuất hóa đơn</a></td>
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

