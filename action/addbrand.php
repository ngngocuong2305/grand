<?php
	include 'config.php';
	$sql_brand = "SELECT * FROM brands";
	$query_brand = mysqli_query($connect, $sql_brand);

	if(isset($_POST['sbm'])){
		$brand_name = $_POST['brand_name'];

		$sql = "INSERT INTO brands (brand_name) VALUES('$brand_name')";
		$query = mysqli_query($connect, $sql);
		header('location: index.php?page_layout=brands');
		
	}
?>

<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h2>Thêm thương hiệu</h2>
		</div>
		<div class="card-body">
			<form method="POST" enctype = "multipart/form-data">
				<div class="form-group">
					<label for="">Tên thương hiệu</label>
					<input type="text" name="brand_name" class= "form-control" required>
				</div>

				<button name="sbm" class="btn btn-success" type = "submit">Thêm</button>

			</form>
		</div>
	</div>
</div>