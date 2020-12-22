<?php
	include 'config.php';
	$sql_user = "SELECT * FROM user";
	$query_user = mysqli_query($connect, $sql_user);
	$sql_prd = "SELECT * FROM products";
	$query_prd = mysqli_query($connect, $sql_prd);


	if(isset($_POST['sbm'])){
		$id = $_POST['id'];
		$prd_id = $_POST['prd_id'];
		$sl = $_POST['sl'];
		$sql_total = "SELECT * FROM products where prd_id = $prd_id";
		$query_total = mysqli_query($connect, $sql_total);
		$row_total = mysqli_fetch_assoc($query_total);
		$total = ($row_total['price']*$sl);
		$total_in = ($row_total['price_in']*$sl);
		
		$ngay = $_POST['ngay'];
		$status = $_POST['status'];

		$sql_up = "SELECT * FROM products where prd_id = $prd_id";
		$query_up =  mysqli_query($connect, $sql_up);
		$row_up = mysqli_fetch_assoc($query_up);

		$prd_name = $row_up['prd_name'];
		$image = $row_up['image'];
		$prd_id = $prd_id;
		$price_in = $row_up['price_in'];
		$price = $row_up['price'];
		$quantity = ($row_up['quantity'] - $sl);
		$description = $row_up['description'];
		$brand_id = $row_up['brand_id'];
		$sql = "UPDATE products SET prd_name = '$prd_name' , image ='$image' ,price_in = '$price_in' , price = '$price' , quantity = '$quantity' , description = '$description' , brand_id = '$brand_id' where prd_id = '$prd_id'";
		$query = mysqli_query($connect, $sql);

		$sql_info = "SELECT * FROM info where id = $id ";
		$query_info = mysqli_query($connect, $sql_info);
		$row_info = mysqli_fetch_assoc($query_info);
		$info_id = $row_info['info_id'];
		$name = $row_info['name'];
		$address = $row_info['address'];
		$phone = $row_info['phone'];
		$email = $row_info['email'];
		$core = $row_info['core'] + 1;
		$sql = "UPDATE info SET info_id = '$info_id', name = '$name' , address = '$address' , phone = $phone , email = '$email' , core = '$core' where id = '$id'";
		$query = mysqli_query($connect, $sql);

		$sql = "INSERT INTO hoadon (id, prd_id,sl,total_in,total, ngay, status)
		VALUES('$id', '$prd_id', '$sl','$total_in', '$total', '$ngay', '$status')";
		$query = mysqli_query($connect, $sql);
		header('location: index.php?page_layout=xuathoadon');

	}
?>

<div class="container-fluid">
	<a class="btn btn-primary" href="index.php?page_layout=home">Trang chủ</a>
	<div class="card">
		<div class="card-header">
			<h2>Thêm hóa đơn</h2>
		</div>
		<div class="card-body">
			<form method="POST" enctype = "multipart/form-data">
				<div class="form-group">
					<label for="">Người mua</label>
					<select class="form-control" name="id">
					<?php 
						while($row_user = mysqli_fetch_assoc($query_user)){?>
							<option value="<?php echo $row_user['id'];  ?>"><?php echo $row_user['username'];  ?></option>
						<?php } ?>					
					</select>

				<div class="form-group">
					<label for="">Mua sản phẩm</label>
					<select class="form-control" name="prd_id">
					<?php 
						while($row_prd = mysqli_fetch_assoc($query_prd)){?>
							<option value="<?php echo $row_prd['prd_id'];  ?>"><?php echo $row_prd['prd_name'];  ?></option>
						<?php } ?>
					</select>

				</div>

				<div class="form-group">
					<label for="">Số lượng sản phẩm</label>
					<input type="number" name="sl" class= "form-control" required>
				</div>

				<div class="form-group">
					<label for="">Ngày tạo hóa đơn (dd/mm/yyyy)</label>
					<input type="text" name="ngay" class= "form-control" required>
				</div>
				<div class="form-group">
					<label for="">Trạng thái</label>
					<input type="text" name="status" class= "form-control" required>
				</div>

				<button name="sbm" class="btn btn-success" type = "submit">Thêm</button>

			</form>
		</div>
		<a class="btn btn-primary" href="logout.php">Đăng xuất</a>
	</div>
</div>