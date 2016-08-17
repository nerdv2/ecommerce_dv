<?php
include('connectme.php');
$ni = $_GET['id'];

$sql	= 'delete from users where ID="'.$ni.'"';
$sql2	= 'delete from users_data where user_id="'.$ni.'"';
$query  = mysqli_query($db_link,$sql);
$query2 = mysqli_query($db_link,$sql2);
header('location: adminpanel.php');
?>