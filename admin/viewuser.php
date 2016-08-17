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
<title>Users Data</title>
<link href="style.css" rel="stylesheet">
</head>

<body>
<?php
$sql = "select * from users_data where user_id = '$iddata'";
$query = mysqli_query($db_link,$sql);
?>
<h2><strong><p align="center">Users Data</p></strong></h2>
<h4><p align="center"><a href="usermgmt.php">Return to Users Datatable</a></p></h4>
<table width="850" border="1" cellpadding="0" align="center" class="bordered">
	
	<!--DWLayoutTable-->
	<tr>
		<td height="29" align="center" valign="middle" bgcolor="#00FFFF">Users ID</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">User Shipping Name</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">User Shipping Address</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">User Shipping City</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">User Shipping Country</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">User Shipping Postcode</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">User Phone</td>
	</tr>
<?php
	while($data = mysqli_fetch_array($query)){
?>
	<tr>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['user_id']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['user_shipping_name']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['user_shipping_address']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['user_shipping_city']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['user_shipping_country']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['user_shipping_postcode']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['user_phone']; ?></td>
	</tr>
<?php
	}
?>
</table>
<p align="center">Copyright (c) 2016 eCommerce_dv, All Right Reserved. Programmed by : <a href="mailto:gema_wardian@hotmail.com">Gema Aji W.</a> and <a href="mailto:dangridho99@gmail.com">Dang Ridho</a></p>
</body>
</html>