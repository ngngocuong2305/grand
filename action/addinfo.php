<?php
	include 'config.php';
	$id = $_SESSION["id"];
	$sql_user = "SELECT * FROM user where id = $id";
	$query_user = mysqli_query($connect, $sql_user);
	if(isset($_POST['sbm'])){
		$id = $_SESSION["id"];
		$name = $_POST['name'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$core = 0;

		$sql = "INSERT INTO info (id, name, address, phone, email, core)
		VALUES('$id', '$name', '$address', '$phone','$email', '$core')";
		$query = mysqli_query($connect, $sql);
		header('location: index.php?page_layout=yourinfo');
	}
?>

<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h2>Thêm hóa đơn</h2>
		</div>
		<div class="card-body">
			<form method="POST" enctype = "multipart/form-data">
				<div class="form-group">
					<label for="">Tài khoản</label>
					<select class="form-control" name="id">
					<?php 
						while($row_user = mysqli_fetch_assoc($query_user)){?>
							<option value="<?php echo $row_user['id'];  ?>"><?php echo $row_user['username'];  ?></option>
						<?php } ?>					
					</select>

				<div class="form-group">
					<label for="">Tên đầy đủ</label>
					<input type="text" name="name" class= "form-control" required>
				</div>
				<div class="form-group">
					<label for="">Địa chỉ</label>
					<input type="text" name="address" class= "form-control" required>
				</div>
				<div class="form-group">
					<label for="">Số điện thoại</label>
					<input type="number" name="phone" class= "form-control" required>
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input type="text" name="email" class= "form-control" required>
				</div>

				<button name="sbm" class="btn btn-success" type = "submit">Thêm</button>

			</form>
		</div>
	</div>
</div>