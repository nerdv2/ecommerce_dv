<?php
    include('config.php');
    include('header.php');

    global $connect;
    
    $username = $_SESSION['username'];

    $addressname = $_POST['cstaddressname'];
    $address = $_POST['cstaddress'];
    $city = $_POST['cstcity'];
    $postcode = trim($_POST['cstpost']);
    $country = $_POST['cstcountry'];
    $phone = trim($_POST['cstphone']);


    $addressname = strip_tags($addressname);
    $address = strip_tags($address);
    $city = strip_tags($city);
    $postcode = strip_tags($postcode);
    $country = strip_tags($country);
    $phone = strip_tags($phone);

    $query2 = "SELECT ID FROM users WHERE username LIKE '$username'";
    $results = mysqli_query($connect, $query2) or die(mysql_error());
    $id_data = mysqli_fetch_array($results, MYSQLI_ASSOC);

    $user_code = $id_data['ID'];
    $query3 = "UPDATE users_data SET user_shipping_name='$addressname', user_shipping_address='$address',user_shipping_city='$city',user_shipping_country='$country',user_shipping_postcode=$postcode,user_phone='$phone' where user_id=$user_code";
    $res2 = mysqli_query($connect, $query3) or die(mysql_error());

    if ($res2) {
        echo "<br><br>Successfully updated, redirecting to home page...";
        header('Refresh: 3;url=index.php');
    } else {
        echo "Something went wrong, try again later...";
    } 

include('footer.php');
?>