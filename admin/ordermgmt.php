<?php
include('connectme.php');
?>
<?php 
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
$sql = 'select * from order_data';
$query = mysqli_query($db_link,$sql);
?>
<h2><strong><p align="center">Order Data</p></strong></h2>
<h4><p align="center"><a href="adminpanel.php">Return to Admin Panel</a></p></h4>
<table width="900" border="1" cellpadding="0" align="center" class="bordered">
	<tr>
		<form method="get" action="searchorder.php">
		<td colspan='11'><select name="searchwhat">
			<option selected="selected">--Search--</option>
				<option name='id' value='id'>Order ID</option>
				<option name='user_id' value='user_id'>Customer ID</option>
			</select>
			<input type="text"  class="searchinput" value="" name="searchname"><br>
			<input type="submit" name="tsearch" value="SEARCH">
			
		</td>
		</form>
	</tr>
	<!--DWLayoutTable-->
	<tr>
		<td height="29" width="15" align="center" valign="middle" bgcolor="#00FFFF">Order ID</td>
		<td align="center" width="20" valign="middle" bgcolor="#00FFFF">Customer ID</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Timestamp</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Status</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Shipping Name</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Shipping Address</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Shipping City</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Shipping Country</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Shipping Postcode</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Product Cost</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Act</td>
	</tr>
<?php
	while($data = mysqli_fetch_array($query)){
?>
	<tr>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['id']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['user_id']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['timestamp']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['status']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['shipping_name']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['shipping_address']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['shipping_city']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['shipping_country']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['shipping_postcode']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['product_cost']; ?></td>
		<td p align="center" bgcolor="#FFFFFF">
		<a href="vieworder.php?id=<?php echo $data['id'];?>" title="Show user data?"><img style="max-width:40px;max-height:40px;width:auto;height:auto;" src="img/Page-Find.png"></img></a>
		<a href="edit_order.php?id=<?php echo $data['id'];?>" title="Edit this product?"><img style="max-width:40px;max-height:40px;width:auto;height:auto;" src="img/Page-Edit.png"></img></a></td>
	</tr>
<?php
	}
?>
</table>
<p align="center">Copyright (c) 2016 eCommerce_dv, All Right Reserved. Programmed by : <a href="mailto:gema_wardian@hotmail.com">Gema Aji W.</a> and <a href="mailto:dangridho99@gmail.com">Dang Ridho</a></p>
</body>
</html>