<?php
    include "connectme.php";

    if(isset($_POST['add'])){
        $id = $_REQUEST['id'];
        $name = $_POST['name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $sku = $_POST['sku'];
        $stock = $_POST['stock'];
        $weight = $_POST['weight'];
        $dimension = $_POST['dimension'];
        $image = $_POST['image'];
        $info = $_POST['info'];
       
           if ($name != "" && $category != "" && $price != "" && $sku != "" && $stock != "" && $weight != "" && $dimension != "" && $image != "" && $info != ""){
                $query = "update product_data set name='$name', category='$category', price='$price', sku='$sku', stock='$stock', weight='$weight', dimension='$dimension', image='$image', info='$info' where id='$id';";
                $edit_product = mysqli_query($db_link, $query);

                if($edit_product){
                    echo "Success";
                    header('Location: productmgmt.php');  
                }
                else{
                    echo "System error ";
                }
           }
           else{
               echo "Field is empty";
           }   
    }
    else{
        header ("location:edit_product.php");
    }
?>