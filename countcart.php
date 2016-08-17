<?php
include("config.php");
$totalquantity=0;
if (session_status() == PHP_SESSION_NONE) {
    	session_start();
}
global $connect;
$sess = session_id();
$query="select * from cart where session_id = '$sess'";
$results = mysqli_query($connect, $query) or die(mysql_error()); 
while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
  	extract($row);
	$totalquantity = $totalquantity + $quantity;
}
echo $totalquantity;
?>