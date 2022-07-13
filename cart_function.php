<?php
session_start();
include('connect.php');
function addToCart($conn)
{
	//$size=$_GET['size'];
	//$color=$_GET['color'];
	if(isset($_REQUEST['pdid']))
	{
		$product_id = $_REQUEST['pdid'];
		// $_SESSION['id']=$product_id;

		$sql ="SELECT * FROM tblproduct WHERE product_id = $product_id";
		
		$result = $conn->query($sql)or die($conn->error);
		if ($result->num_rows == 0)
		{
			print "<script language=\"JavaScript\">window.location.href=\"index.php?page=product_detail&pdid=$product_id\";</script>";
		}
		else
		{
			$row = $result->fetch_assoc();
			$product_id=$row['product_id'];
			$pname = $row['name'];
			$image = $row['image'];
			//$quantity=$row['qty'];
			$price=$row['price'];
			//  $sid = session_id();
			 $sid = session_id();
			//$useragent = $_SERVER['HTTP_USER_AGENT'];

			$sql = "SELECT product_id, quantity FROM tblcart WHERE product_id='$product_id' AND cart_session_id='$sid'";
			$result1 = $conn->query($sql)or die($conn->error);
			$cartprice = $price;

			if ($result1->num_rows == 0)
			{
				$quantity = $_REQUEST['qty'];
				$totalmmkprice = $cartprice;

				$totalprice = $totalmmkprice * $quantity;

				$sql = "INSERT INTO tblcart(product_id, quantity, price, total_price, cart_session_id)
				VALUES ('$product_id','$quantity','$cartprice',' $totalprice','$sid')";
				$result = $conn->query($sql)or die($conn->error);


				//echo $sql;

				print "<script language=\"JavaScript\">window.location.href=\"index.php?page=cart\";</script>";
			}
			else
			{

				$row1 = $result1 -> fetch_assoc();
				$cartqty = $row1['quantity'];
				$cartqty = $cartqty + $_REQUEST['qty'];
				$totalmmkprice = $cartqty*$cartprice;
					$sql = "UPDATE tblcart SET quantity='$cartqty', total_price='$totalmmkprice' WHERE cart_session_id= '$sid' AND product_id= '$product_id'";
					$result = $conn->query($sql)or die($conn->error);
			}
		}
	}
}

function getCartContent()
{
	$cartContent=array();
	$sid=session_id();
	//echo $sid."+++++++++";
	// $icid=$_GET['icid'];

$query3="SELECT c.cart_session_id, c.product_id, c.price,c.quantity, c.total_price, p.name, p.p_detail, p.image FROM tblproduct as p,tblcart as c WHERE c.cart_session_id='$sid' AND c.product_id=p.product_id";
//echo $query3;

// MD ///
	$conn = new mysqli("localhost","root","","latest_project");
		// MD ///
$logo3=$conn-> query ($query3) or die ($conn->error);

$row3=$logo3->num_rows;

//echo $row3."+++++++++=";

if($row3>0)

{
	while ($irow3=mysqli_fetch_assoc($logo3))
	{

		
		$cartContent[] = $irow3;
		
	}
}

	return $cartContent;
}

function updateCart()
{
include('connect.php');
	
	$cartId     = $_POST['hidCartId'];
	$productId  = $_POST['hidProductId'];
	$itemQty    = $_POST['txtQty'];
	
	$numItem    = count($itemQty);
	$numDeleted = 0;
	// $notice     = '';

	for($i=0;$i<$numItem;$i++)
	{
		$newQty=(int)$itemQty[$i];

		$sql = "SELECT * FROM tblproduct WHERE product_id={$productId[$i]}";

			$result = $conn->query($sql)or die($conn->error);
			$irow = $result->fetch_assoc();

			$stquantity = $irow['store_qty'];

			$sql1 = "SELECT name FROM tblproduct WHERE product_id={$productId[$i]}";


				$result1 = $conn->query($sql1)or die($conn->error);
				$irow1 = $result1->fetch_assoc();



		if($newQty>$irow['qty'])
		{
			print ('We have currently(' .$irow['store_qty'].') qty in <strong>'. $irow1['name'].'</strong> stock. You type quantity is ('.$newQty.') qty.');

			print "<script language=\"JavaScript\">window.location.href=\"index.php?page=cart&stqu=$irow[qty]&pname=$irow[name]&typequan=$newQty\";</script>";
		}
		else
		{
			if($newQty<=0)
			{


				$de = "DELETE FROM tblcart WHERE cart_session_id={$cartId[$i]}";
				$conn->query($de)or die($conn->error);



				$numDeleted += 1;
			}
			else
			{

				$sql1 = "UPDATE tblcart SET quantity='$newQty',total_price=quantity*total_price WHERE cart_session_id={$cartId[$i]}";
		$conn->query($sql1)or die($conn->error);

			}
		}
	}//end for

	if($numDeleted==$numItem)
	{
		print"<script language=\"javascript\"> window.location.href=\"index.php?page=productlist\";</script>";
		//all_product.php
	}
	else
	{
		print"<script language=\"javascript\"> window.location.href=\"index.php?page=cart\";</script>";
		//cart.php
	}
	exit;
}


function deleteFromCart()
{
	if(isset($_GET['cid']) && (int)$_GET['cid']>0)
	{
		$cartId=(int)$_GET['cid'];
		echo $cartId."++++++++++++";
	}
	if($cartId)
	{
		// echo $cartId;
		$qry4="DELETE FROM tblcart WHERE cart_session_id=$cartId";
		// MLO ///
	$conn = new mysqli("localhost","root","","latest_project");
		// MLO ///
		$req4=$conn->query($qry4)or die($conn->error);
	}

	print"<script language=\"javascript\"> window.location.href=\"index.php?page=cart\";</script>";
	//cart.php
}
?>