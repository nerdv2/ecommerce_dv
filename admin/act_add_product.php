<?php
    include "connectme.php";

    if(isset($_POST['add'])){
        $name = $_POST['name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $sku = $_POST['sku'];
        $stock = $_POST['stock'];
        $weight = $_POST['weight'];
        $dimension = $_POST['dimension'];
        $image = $_POST['image'];
        $info = $_POST['info'];

        $query = "SELECT * from product_data where name = '$name'";
       $product = mysqli_query($db_link, $query);

       $count = mysqli_num_rows($product);
       
       if ($count == 0){
           if ($name != "" && $category != "" && $price != "" && $sku != "" && $stock != "" && $weight != "" && $dimension != "" && $image != "" && $info != ""){
                $query = "insert into product_data (name,category,price,sku,stock,weight,dimension,image,info) values ('$name','$category','$price','$sku','$stock','$weight','$dimension','$image','$info')";
                $add_product = mysqli_query($db_link, $query);

                if($add_product){
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
           echo " Change your title.Because you title is ready";
       }
    }
    else{
        header ("location:add_product.php");
    }
?>