<?php
include('connectme.php');
?>
<?php

	$iddata = $_REQUEST['id']; 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!=1){
      header('Location: index.php?err=2');
    }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8589-1" />
<title>Order Data</title>
<link href="style.css" rel="stylesheet">
</head>

<body>
<?php
$sql = "select * from order_itemdata where order_id = '$iddata'";
$query = mysqli_query($db_link,$sql);
?>
<h2><strong><p align="center">Order Data</p></strong></h2>
<h4><p align="center"><a href="adminpanel.php">Return to Admin Panel</a></p></h4>
<table width="900" border="1" cellpadding="0" align="center" class="bordered">
	<!--DWLayoutTable-->
	<tr>
		<td height="29" width="15" align="center" valign="middle" bgcolor="#00FFFF">Order ID</td>
		<td align="center" width="20" valign="middle" bgcolor="#00FFFF">Product ID</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Product Name</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Quantity</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Price</td>
	</tr>
<?php
	while($data = mysqli_fetch_array($query)){
?>
	<tr>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['order_id']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['product_id']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['product_name']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['qty']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['price']; ?></td>
	</tr>
<?php
	}
?>
</table>
<p align="center">Copyright (c) 2016 eCommerce_dv, All Right Reserved. Programmed by : <a href="mailto:gema_wardian@hotmail.com">Gema Aji W.</a> and <a href="mailto:dangridho99@gmail.com">Dang Ridho</a></p>
</body>
</html>