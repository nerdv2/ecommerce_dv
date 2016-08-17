<?php
include('connectme.php');
if(isset($_GET['tsearch'])){
	$searchwhat	= $_GET['searchwhat'];
	$searchname	= $_GET['searchname'];
}
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
<title>SEARCH RESULT</title>
<link href="style.css" rel="stylesheet">
</head>

<body >
<?php
$sql = 'select * from users where '.$searchwhat.'="'.$searchname.'"';
$query = mysqli_query($db_link,$sql);
?>
<h2><strong><p align="center">Search Result</p></strong></h2>
<h4><p align="center"><a href="adminpanel.php">Return to Admin Panel</a></p></h4>
<table width="850" border="1" cellpadding="0" align="center" class="bordered">
	<tr>
		<form method="get" action="searchuser.php">
		<td colspan='8'><select name="searchwhat">
			<option selected="selected">--Search--</option>
				<option name='ID' value='ID'>Users ID</option>
				<option name='username' value='username'>Username</option>
				<option name='email' value='email'>Email</option>
                <option name='status' value='status'>Status</option>
                <option name='admin' value='admin'>Admin</option>
                <option name='name' value='name'>Customer Name</option>
			</select>
			<input class="searchinput" type="text" value="" name="searchname"><br>
			<input type="submit" name="tsearch" value="SEARCH"><br><br>
			<a href="usermgmt.php">Return to users data</a>
		</td>
		</form>
	</tr>
	<!--DWLayoutTable-->
	<tr>
		<td height="29" align="center" valign="middle" bgcolor="#00FFFF">Users ID</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Username</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Email</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Status</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Admin</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Customer Name</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">
		</td>
	</tr>
<?php
	while($data = mysqli_fetch_array($query)){
?>
	<tr>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['ID']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['username']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['email']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['status']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['admin']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['name']; ?></td>
		<td p align="center" bgcolor="#FFFFFF">
		<a href="viewuser.php?id=<?php echo $data['ID'];?>" title="Show user data?"><img style="max-width:40px;max-height:40px;width:auto;height:auto;" src="img/Page-Find.png"></img></a>
        <a href="edituser.php?id=<?php echo $data['ID'];?>" title="Edit this user?"><img style="max-width:40px;max-height:40px;width:auto;height:auto;" src="img/Page-Edit.png"></img></a>
		<a href="deleteuser.php?id=<?php echo $data['ID'];?>" onclick="return confirm('Delete confirmation?')" title="Delete this user?"><img style="max-width:40px;max-height:40px;width:auto;height:auto;" src="img/Page-Delete.png"></img></a>
		</td>
	</tr>
<?php
	}
?>
</table>
<p align="center">Copyright (c) 2016 eCommerce_dv, All Right Reserved. Programmed by : <a href="mailto:gema_wardian@hotmail.com">Gema Aji W.</a> and <a href="mailto:dangridho99@gmail.com">Dang Ridho</a></p>
</body>
</html>