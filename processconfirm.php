<?php
    include('config.php');
    include('header.php');

    global $connect;
    
    $id = trim($_POST['cstid']);
    $name = trim($_POST['cstname']);
    $value = trim($_POST['cstvalue']);
    $target = trim($_POST['csttarget']);
    $date = trim($_POST['cstdate']);
    $username = trim($_POST['cstusername']);
    $email = trim($_POST['cstemail']);
    $phone = trim($_POST['cstphone']);

    $id = strip_tags($id);
    $name = strip_tags($name);
    $value = strip_tags($value);
    $target = strip_tags($target);
    $date = strip_tags($date);
    $username = strip_tags($username);
    $email = strip_tags($email);
    $phone = strip_tags($phone);

    $query = "INSERT INTO payment_data(order_id,customer_name,amount_paid,transfer_target,confirm_date,username,email,phone) VALUES('$id','$name','$value','$target','$date','$username','$email','$phone')";
    $res2 = mysqli_query($connect, $query) or die(mysql_error());
  
    
    if ($res2) {
        echo "<br><br>Confirmation under review, redirecting to home page...";
        header('Refresh: 3;url=index.php');
    } else {
        echo "Something went wrong, try again later...";
    }    

include('footer.php');
?>