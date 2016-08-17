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
    <form action="act_add_product.php" method="post">
        <table width="546" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF" class="bordered">
            <thead>
                <h1> Add New Product </h1>
            </thead>
            <tr>
                
            </tr>
            <tr>
                <td width="25%"> Title </td>
                <td><input class="smallinput" type="text" name="name" placeholder="Title"/> </td>
            </tr>
            <tr>
                <td width="25%"> Category </td>
                <td><input class="smallinput" type="text" name="category" placeholder="Category"/> </td>
            </tr>
            <tr>
                <td width="25%"> Price </td>
                <td><input class="smallinput" type="text" name="price" placeholder="Price"/> </td>
            </tr>
            <tr>
                <td width="25%"> SKU </td>
                <td><input class="smallinput" type="text" name="sku" placeholder="SKU"/> </td>
            </tr>
            <tr>
                <td width="25%"> Stock </td>
                <td><input class="smallinput" type="text" name="stock" placeholder="Stock"/> </td>
            </tr>
            <tr>
                <td width="25%"> Weight </td>
                <td><input class="smallinput" type="text" name="weight" placeholder="Weight"/> </td>
            </tr>
            <tr>
                <td width="25%"> Dimension </td>
                <td><input class="smallinput" type="text" name="dimension" placeholder="Dimension"/> </td>
            </tr>
            <tr>
                <td width="25%"> Image </td>
                <td><input class="smallinput" type="text" name="image" placeholder="Image"/> </td>
            </tr>
            <tr>
                <td width="25%"> Info Product </td>
                <td><textarea name="info" placeholder="Info Product"> </textarea></td>
            </tr>
            <tr>
                <td> 
                    <input type="submit" name="add" value="Add Product">
                    
                </td>
                <td>
                    <input type="reset" value="reset">
                </td>
                </tr>
            </tr>
        </table>
    </form>
</body>
</html>