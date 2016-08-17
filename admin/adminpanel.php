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
<title>ecommerce_dv Admin Panel</title>
<link href="style.css" rel="stylesheet">
</head>

<body>

<h2><strong><p align="center">Admin Panel</p></strong></h2>
<h4>Hello, <a href="#"><?php echo $_SESSION['sess_username'];?></a></h4>
<h4><a href="logout.php">Logout</a></h4>
<table width="850" border="1" cellpadding="0" align="center" class="bordered">
	<!--DWLayoutTable-->
	<tr>
		<td colspan="3" width="150" height="29" align="center" valign="middle" bgcolor="#00FFFF"><a href="usermgmt.php">Users Management</td>
	</tr>
  <tr>
		<td width="150" height="29" align="center" valign="middle" bgcolor="#00FFFF">Ecommerce Management</td>
	</tr>
  <tr>
		<td width="150" height="29" align="center" valign="middle" bgcolor="#00FFFF"><a href="productmgmt.php">Product Management</td>
    <td width="150" height="29" align="center" valign="middle" bgcolor="#00FFFF"><a href="
    ordermgmt.php">Order Management</td>
    <td width="150" height="29" align="center" valign="middle" bgcolor="#00FFFF"><a href="paymentmgmt.php">Payment Management</td>
	</tr>
  <tr>
    <td width="150" height="29" align="center" valign="middle" bgcolor="#00FFFF"><a href="uploadform.php">Photo Management</td>
  </tr>
</table>
<p align="center">Copyright (c) 2016 eCommerce_dv, All Right Reserved. Programmed by : <a href="mailto:gema_wardian@hotmail.com">Gema Aji W.</a> and <a href="mailto:dangridho99@gmail.com">Dang Ridho</a></p>
</body>
</html>