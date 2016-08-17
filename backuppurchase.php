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

    $sessid = session_id();

    $sql = "SELECT ID FROM users WHERE username='$username'";
    $result = mysqli_query($connect, $sql) or die(mysql_error());
    $row =  mysqli_fetch_array($result, MYSQLI_ASSOC);

    $userid = $row['ID'];

    $sqlcount = "CALL getCount('$sessid')";
    $resultsqlcount = mysqli_query($connect, $sqlcount) or die(mysql_error()); 
    $resultcount = mysqli_fetch_array($resultsqlcount, MYSQLI_ASSOC);
    $datacount = $resultcount['datacount'];
    $totalamount = 0;
    if($datacount == 1){
    $sql2 = "INSERT INTO order_data(user_id, status, shipping_name, shipping_address, shipping_city, shipping_country, shipping_postcode, product_cost)
           VALUES ('$userid','1','$shippingname', '$address', '$city','$country','$postcode', '$cartamount')";

    echo $sql2;
    $result = mysqli_query($connect, $sql2) or die(mysql_error()); 
    $orderid = mysqli_insert_id($connect);
    
    
      $query = "SELECT * FROM cart WHERE session_id='$sessid'";
      $results = mysqli_query($connect, $query) or die(mysql_error()); 
      while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
        extract($row);
        $totalamount=$totalamount + ($price * $quantity);
        $sql2 = "INSERT INTO order_itemdata (order_id, product_id, product_name, qty, price)
                    VALUES ($orderid,$product_id,'$product_name',
                  $quantity,'$totalamount')";
        $insert = mysqli_query($connect, $sql2) or die(mysql_error()); 
      }
      
      $query = "DELETE FROM cart WHERE session_id='$sessid'";
      $delete = mysqli_query($connect, $query) or die(mysql_error()); 
      session_destroy();

      if ($insert) {
            echo "<br><br>Order success, redirecting to home page...";
            header('Refresh: 3;url=index.php');
        } else {
            echo "Something went wrong, try again later...";
        }
    } else {
      echo "Order must be one at a time!";
    }
    

    include('footer.php');
?>