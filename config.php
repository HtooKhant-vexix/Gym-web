<?php
	$pgname=@$_REQUEST['page'];

	switch($pgname)
	{

		case 'product_detail':
		$mainpage='product_detail.php';
		break;

		case 'cart':
			$mainpage='cart.php';
			break;

		case 'deliveryadd':
			$mainpage='deliveryadd.php';
			break;

		case 'checkoutconfirm':
			$mainpage='checkoutconfirm.php';
			break;

		default:
		$mainpage='home.php';
	}

	
?>