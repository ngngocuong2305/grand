<?php
	include 'config.php';
	$if_id = $_GET['if_id'];
	$id = $_SESSION["id"];

	$sql_user = "SELECT * FROM user where id = $id";
	$query_user = mysqli_query($connect, $sql_user);

	$sql_up = "SELECT * FROM info where info_id = $if_id";
	$query_up =  mysqli_query($connect, $sql_up);
	$row_up = mysqli_fetch_assoc($query_up);


	if(isset($_POST['sbm'])){
		$name = $_POST['name'];
		$info_id = $if_id;
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$id = $_SESSION["id"];
		$core = 0;

		$sql = "UPDATE info SET name = '$name' , address = '$address' , phone = $phone , email = '$email' , id = $id, core = '$core' where info_id = $if_id";
		$query = mysqli_query($connect, $sql);
		header('location: index.php?page_layout=yourinfo');
	}
?>

<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h2>Sửa thông tin</h2>
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

				</div>
				<div class="form-group">
					<label for="">Tên đầy đủ</label>
					<input type="text" name="name" class= "form-control" required value="<?php  echo $row_up['name'];   ?>">
				</div>
				<div class="form-group">
					<label for="">Địa chỉ</label> <br>
					<input type="text" name="address">
				</div>
				<div class="form-group">
					<label for="">Số điện thoại</label>
					<input type="number" name="phone" class= "form-control" required value="<?php  echo $row_up['phone'];   ?>">
				</div>
				<div class="form-group">
					<label for="">E-mail</label>
					<input type="text" name="email" class= "form-control" required value="<?php  echo $row_up['email'];   ?>">
				</div>

				<button name="sbm" class="btn btn-success" type = "submit">Sửa</button>

			</form>
		</div>
	</div>
</div>