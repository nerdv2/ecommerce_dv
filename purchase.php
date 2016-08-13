<?php
    include('header.php');
    include('config.php');
    if (session_status() == PHP_SESSION_NONE) {
    		session_start();
	}
	if (isset($_SESSION['cartamount']))
	{
		$cartamount=$_SESSION['cartamount'];
	}
    
    global $connect;

    $username=$_POST['username'];
	$email = $_POST['email'];
	$name = $_POST['name'];
	$shippingname = $_POST['shippingname'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$postcode = $_POST['postcode'];
	$phone = $_POST['phone'];

    include('footer.php');
?>