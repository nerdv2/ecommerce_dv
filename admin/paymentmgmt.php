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
<title>Payment Data</title>
<link href="style.css" rel="stylesheet">
</head>

<body>
<?php
$sql = 'select * from payment_data';
$query = mysqli_query($db_link,$sql);
?>
<h2><strong><p align="center">Payment Data</p></strong></h2>
<h4><p align="center"><a href="adminpanel.php">Return to Admin Panel</a></p></h4>
<table width="900" border="1" cellpadding="0" align="center" class="bordered">
	<tr>
		<form method="get" action="searchpayment.php">
		<td colspan='11'><select name="searchwhat">
			<option selected="selected">--Search--</option>
				<option name='order_id' value='order_id'>Order ID</option>
				<option name='customer_name' value='customer_name'>Customer Name</option>
				<option name='username' value='username'>Username</option>
                <option name='email' value='email'>E-Mail</option>
                <option name='phone' value='phone'>Phone</option>
			</select>
			<input type="text"  class="searchinput" value="" name="searchname"><br>
			<input type="submit" name="tsearch" value="SEARCH">
			
		</td>
		</form>
	</tr>
	<!--DWLayoutTable-->
	<tr>
		<td height="29" align="center" valign="middle" bgcolor="#00FFFF">Order ID</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Order Date</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Customer Name</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Amount Paid</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Transfer Target</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Confirm Date</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Username</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Email</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Phone</td>
	</tr>
<?php
	while($data = mysqli_fetch_array($query)){
?>
	<tr>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['order_id']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['order_date']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['customer_name']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['amount_paid']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['transfer_target']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['confirm_date']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['username']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['email']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['phone']; ?></td>
	</tr>
<?php
	}
?>
</table>
<p align="center">Copyright (c) 2016 eCommerce_dv, All Right Reserved. Programmed by : <a href="mailto:gema_wardian@hotmail.com">Gema Aji W.</a> and <a href="mailto:dangridho99@gmail.com">Dang Ridho</a></p>
</body>
</html>