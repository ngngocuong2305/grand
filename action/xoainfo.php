<?php
	include 'config.php';
	$if_id = $_GET['if_id'];
	$sql = "DELETE FROM info where info_id = $if_id";
	$query = mysqli_query($connect, $sql);
	header('location: index.php?page_layout=info');
?>