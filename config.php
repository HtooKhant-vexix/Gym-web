<?php
	$pgname=@$_REQUEST['page'];

	switch($pgname)
	{

		case 'product_detail':
		$mainpage='product_detail.php';
		break;

		default:
		$mainpage='home.php';
	}

	
?>