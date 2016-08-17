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
<title>Product Data</title>
<link href="style.css" rel="stylesheet">
</head>

<body>
<?php
$sql = 'select * from product_data';
$query = mysqli_query($db_link,$sql);
?>
<h2><strong><p align="center">Product Data</p></strong></h2>
<h4><p align="center"><a href="adminpanel.php">Return to Admin Panel</a></p></h4>
<table width="850" border="1" cellpadding="0" align="center" class="bordered">
	<tr>
		<form method="get" action="searchproduct.php">
		<td colspan='11'><select name="searchwhat">
			<option selected="selected">--Search--</option>
				<option name='id' value='id'>Product ID</option>
				<option name='name' value='name'>Product Name</option>
				<option name='id' value='id'>Category ID</option>
			</select>
			<input type="text"  class="searchinput" value="" name="searchname"><br>
			<input type="submit" name="tsearch" value="SEARCH">
			
		</td>
		</form>
	</tr>
	<!--DWLayoutTable-->
	<tr>
		<td height="29" align="center" valign="middle" bgcolor="#00FFFF">Product ID</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Name</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Category ID</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Price</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">SKU</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Stock</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Weight</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Dimension</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Image Link</td>
		<td align="center" valign="middle" bgcolor="#00FFFF">Info</td>
		<td align="center" valign="middle" bgcolor="#00FFFF"><a href="add_product.php"><img style="max-width:40px;max-height:40px;width:auto;height:auto;" src="img/Page-Add.png"></img></a>
		</td>
	</tr>
<?php
	while($data = mysqli_fetch_array($query)){
?>
	<tr>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['id']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['name']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['category']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['price']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['sku']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['stock']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['weight']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['dimension']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['image']; ?></td>
		<td p align="center" bgcolor="#FFFFFF"><?php echo $data['info']; ?></td>
		<td p align="center" bgcolor="#FFFFFF">
		<a href="edit_product.php?id=<?php echo $data['id'];?>" title="Edit this product?"><img style="max-width:40px;max-height:40px;width:auto;height:auto;" src="img/Page-Edit.png"></img></a>
		<a href="deleteproduct.php?id=<?php echo $data['id'];?>" onclick="return confirm('Delete confirmation?')" title="Delete this product?"><img style="max-width:40px;max-height:40px;width:auto;height:auto;" src="img/Page-Delete.png"></img></a>
		</td>
	</tr>
<?php
	}
?>
</table>
<p align="center">Copyright (c) 2016 eCommerce_dv, All Right Reserved. Programmed by : <a href="mailto:gema_wardian@hotmail.com">Gema Aji W.</a> and <a href="mailto:dangridho99@gmail.com">Dang Ridho</a></p>
</body>
</html>