<?php
 include "connectme.php";

    if(isset($_POST['add'])){
        $id = $_REQUEST['id'];
        $status = $_POST['status'];
        
           if ($status != "Select" ){
                $query = "update order_data set status=$status where id=$id";
                $edit_order = mysqli_query($db_link, $query);

                if($edit_order){
                    echo "Success"; 
                    header ("location:ordermgmt.php");
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
        header ("location:edit_order.php");
    }
?>