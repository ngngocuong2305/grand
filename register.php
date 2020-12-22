<?php 
	session_start();
	include 'config.php';
	$sql_level = "SELECT * FROM user_level";
	$query_level = mysqli_query($connect, $sql_level);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng ký</title>
	<link rel = "icon" href =  "img/grand.ico" type = "image/x-icon">
	<link rel = "stylesheet" href =  "bootstrap/css/bootstrap.min.css"> 
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h1 class = "text-center">Đăng ký thành viên</h1>
					<p>
						<?php 
							if(isset($_SESSION["thongbao"])) {
								echo $_SESSION["thongbao"];
								unset($_SESSION['thongbao']);
							}
						?>
					</p>
				<form action="register_submit.php" method = "POST">

					<div class="form-group">
						<label for="username">Tên đăng nhập</label>
						<input type="text" class = "form-control" name= "username">
					</div>

					<div class="form-group">
						<label for="password">Mật khẩu</label>
						<input type="password" class = "form-control" name= "password">
					</div>

					<div class="form-group">
						<label for="repassword">Nhập lại mật khẩu</label>
						<input type="password" class = "form-control" name= "repassword">
					</div>

					<div class="form-group">
						<label for="">Đăng ký với vai trò</label>
						<select class="form-control" name="level_id">
						<?php 
							while($row_level = mysqli_fetch_assoc($query_level)){?>
								<option value="<?php echo $row_level['level_id'];  ?>"><?php echo $row_level['level_name'];  ?></option>
						<?php } ?>
						</select>

					</div>
					<button type  = "submit" name = "submit" class = "btn btn-primary">Đăng ký</button>
					<button type  = "reset" name = "reset" class = "btn btn-primary">Reset</button>

				</form>

				<form action="login.php" method = "POST">
					<h2>Bạn đã có tài khoản?</h2>
					<button type  = "login" name = "login" class = "btn btn-primary">Đăng nhập</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>