<?php
 include "connectme.php";

    if(isset($_POST['add'])){
        $id = $_REQUEST['id'];
        $status = $_POST['status'];
        $admin = $_POST['admin'];
        
           if ($status != "Select" ){
                $query = "update users set status=$status, admin=$admin where id=$id";
                $edit_order = mysqli_query($db_link, $query);
                
                echo "$query";
                if($edit_order){
                    echo "Success"; 
                    header ("location:usermgmt.php");
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
        header ("location:edit_user.php");
    }
?>