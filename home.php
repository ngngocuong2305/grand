<?php

	if($_SESSION["home"] == 1)
	{header('location: index.php?page_layout=admin');}
	if($_SESSION["home"] == 2)
	{header('location: index.php?page_layout=staff');}
	if($_SESSION["home"] == 3)
	{header('location: index.php?page_layout=customer');}
 ?>}
