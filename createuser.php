<?php
    include('config.php');
    include('header.php');

    global $connect;
    
    $name = $_POST['cstname'];
    $username = trim($_POST['cstusername']);
    $password = trim($_POST['cstpassword']);
    $email = trim($_POST['cstemail']);
    $addressname = $_POST['cstaddressname'];
    $address = $_POST['cstaddress'];
    $city = $_POST['cstcity'];
    $postcode = trim($_POST['cstpost']);
    $country = $_POST['cstcountry'];
    $phone = trim($_POST['cstphone']);

    $name = strip_tags($name);
    $username = strip_tags($username);
    $password = strip_tags($password);
    $email = strip_tags($email);
    $addressname = strip_tags($addressname);
    $address = strip_tags($address);
    $city = strip_tags($city);
    $postcode = strip_tags($postcode);
    $country = strip_tags($country);
    $phone = strip_tags($phone);

    $hashed_pass = hash('sha256', $password);


    // check email exist or not
    $query = "SELECT username FROM users WHERE username='$username'";
    $result = mysqli_query($connect, $query) or die(mysql_error());
 
    $count = mysqli_num_rows($result); // if email not found then proceed
 
    if ($count==0) {
  
        $query = "INSERT INTO users(username,password_hash,email,status,admin,name) VALUES('$username','$hashed_pass','$email',1,0,'$name')";
        $res = mysqli_query($connect, $query) or die(mysql_error());
  
        if ($res) {
            echo "<br><br>Successfully registered, redirecting to login page...";
            header('Refresh: 3;url=login.php');
        } else {
            echo "Something went wrong, try again later...";
        } 
      } else {
        echo "Username already in use.";
    }

include('footer.php');
?>