<?php
	session_start();
	include 'config.php';
	$sql_level = "SELECT * FROM user_level";
	$query_level = mysqli_query($connect, $sql_level);
	if( isset ($_POST['submit']) && $_POST["username"] != '' && $_POST["password"] != '' && $_POST["repassword"] != '' && $_POST["level_id"] != '') {
		$username = $_POST["username"];
		$password = $_POST["password"];
		$repassword = $_POST["repassword"];
		$level_id = $_POST["level_id"];
		if ( $password != $repassword ) {
			$_SESSION["thongbao"] = "Password nhập lại không chính xác";
			header("location:register.php");
			die();
		}
		if ( $level_id == 1 ) {
			$_SESSION["thongbao"] = "Bạn không thể đăng ký với tư cách Admin";
			header("location:register.php");
			die();
		}
		$sql = "SELECT * FROM user WHERE username = '$username' ";
		$old = mysqli_query($connect,$sql);
		$password = md5($password);
		if( mysqli_num_rows ($old) > 0) {
			$_SESSION["thongbao"] = "Username đã tồn tại";
			header("location:register.php");
			die();
		}
		$sql = "INSERT INTO user (username,password,level_id) VALUES ('$username','$password','$level_id')";
		mysqli_query($connect,$sql);
		header("location:login.php");
		$_SESSION["thongbao"] = "Đăng ký thành công, hãy đăng nhập";
	}else {
		$_SESSION["thongbao"] = "Vui lòng nhập đầy đủ thông tin";
			header("location:register.php");
		}

?>