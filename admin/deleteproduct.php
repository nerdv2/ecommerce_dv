<?php
include('connectme.php');
$ni = $_GET['id'];

$sql	= 'delete from product_data where id="'.$ni.'"';
$query  = mysqli_query($db_link,$sql);
header('location: adminpanel.php');
?>