<?php 
	session_start();
	include 'config.php';
	if( isset ($_POST['submit']) && $_POST["username"] != '' && $_POST["password"] != ''){
		$username = $_POST["username"];
		$password = $_POST["password"];
		$password = md5($password);
		$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
		$user = mysqli_query($connect, $sql);
		if (mysqli_num_rows($user) > 0 ) {
			$row = mysqli_fetch_array($user);
			$_SESSION["user"] = $username;
			//header("location: index.php");
			if($row['level_id']==3)
			{
				$_SESSION["user"] = $username;
				header('location: index.php?page_layout=customer');
				$_SESSION["home"] = 3;
			}
			if($row['level_id']==2)
			{
				$_SESSION["user"] = $username;
				header('location: index.php?page_layout=staff');
				$_SESSION["home"] = 2;
			}
			if($row['level_id']==1)
			{
				$_SESSION["user"] = $username;
				header('location: index.php?page_layout=admin');
				$_SESSION["home"] = 1;
			}
			$_SESSION["id"] = $row['id'];
			}
		
		else {
			$_SESSION["thongbao"] = "Bạn đã nhập sai username hoặc password. Vui lòng nhập lại.";
			header("location: login.php");
		}
	}
	else {
		$_SESSION["thongbao"] = "Vui lòng nhập đầy đủ thông tin";
		header("location: login.php");
	}
?>