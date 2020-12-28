<?php 
  session_start();
  include 'config.php';
  if( !isset($_SESSION["user"])){
    header('login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<title>Grand</title>
	<link rel = "icon" href =  "img/grand.ico" type = "image/x-icon">
</head>
<body>
	<?php

		if (isset($_GET['page_layout'])){
			switch ($_GET['page_layout']){
				case 'danhsach':
					require_once 'sanpham/danhsach.php';
					break;
				case 'them':
					require_once 'sanpham/them.php';
					break;
				case 'sua':
					require_once 'sanpham/sua.php';
					break;
				case 'xoa': 
					require_once 'sanpham/xoa.php';
					break;
				case 'admin':
					require_once 'nguoidung/admin.php';
					break;
				case 'staff':
					require_once 'nguoidung/staff.php';
					break;
				case 'customer':
					require_once 'nguoidung/customer.php';
					break;
				case 'item':
					require_once 'action/item.php';
					break;
				case 'thongke':
					require_once 'action/thongke.php';
					break;
				case 'listuser':
					require_once 'action/listuser.php';
					break;
				case 'brands':
					require_once 'action/brands.php';
					break;
				case 'addbrand':
					require_once 'action/addbrand.php';
					break;
				case 'info':
					require_once 'action/info.php';
					break;
				case 'addinfo':
					require_once 'action/addinfo.php';
					break;
				case 'hoadon':
					require_once 'action/hoadon.php';
					break;
				case 'xuathoadon':
					require_once 'action/xuathoadon.php';
					break;
				case 'xoainfo':
					require_once 'action/xoainfo.php';
					break;
				case 'suainfo':
					require_once 'action/suainfo.php';
					break;
				case 'home':
					require_once 'home.php';
					break;
				case 'yourinfo':
					require_once 'action/yourinfo.php';
					break;
				case 'print':
					require_once 'action/print.php';
					break;
				case 'login':
					require_once 'login.php';
					break;
				case 'register':
					require_once 'register.php';
					break;
				default:
					require_once 'sanpham/danhsach.php';
					break;

			}
			}else{
				require_once 'login.php';
		}
	 ?>
</body>
</html>
