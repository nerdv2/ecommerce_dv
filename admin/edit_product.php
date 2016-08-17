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
    $id = $_REQUEST['id'];
    $sql = "select * from product_data where id = '$id'";
    $query = mysqli_query($db_link,$sql);
    $data = mysqli_fetch_array($query);
?>
    <form action="act_edit_product.php" method="post">
        <table  width="546" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF" class="bordered">
            <thead>
                <h1> Edit Product </h1>
            </thead>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <tr>
                <td width="25%"> Title </td>
                <td><input type="text" class="smallinput" name="name" value="<?php echo $data['name']; ?>"/> </td>
            </tr>
            <tr>
                <td width="25%"> Category </td>
                <td><input type="text" class="smallinput" name="category" value="<?php echo $data['category']; ?>"/> </td>
            </tr>
            <tr>
                <td width="25%"> Price </td>
                <td><input type="text" class="smallinput" name="price" value="<?php echo $data['price']; ?>"/> </td>
            </tr>
            <tr>
                <td width="25%"> SKU </td>
                <td><input type="text" class="smallinput" name="sku" value="<?php echo $data['sku']; ?>"/> </td>
            </tr>
            <tr>
                <td width="25%"> Stock </td>
                <td><input type="text" class="smallinput" name="stock" value="<?php echo $data['stock']; ?>"/> </td>
            </tr>
            <tr>
                <td width="25%"> Weight </td>
                <td><input type="text" class="smallinput" name="weight" value="<?php echo $data['weight']; ?>"/> </td>
            </tr>
            <tr>
                <td width="25%"> Dimension </td>
                <td><input type="text" class="smallinput" name="dimension" value="<?php echo $data['dimension']; ?>"/> </td>
            </tr>
            <tr>
                <td width="25%"> Image </td>
                <td> <input type="text" class="smallinput" name="image" value="<?php echo $data['image']; ?>"/> </td>
            </tr>
            <tr>
                <td width="25%"> Info Product </td>
                <td> <textarea name="info" value="<?php echo $data['info']; ?>"> </textarea></td>
            </tr>
            <tr>
                <td colspan="2"> 
                    <input type="submit" name="add" value="Edit Product">
                    <input type="reset" value="reset">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>