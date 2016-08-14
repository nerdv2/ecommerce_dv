<?php
    include('header.php');
    include('config.php');

    global $connect;

    $query = "SELECT ID FROM users WHERE username='$_SESSION['username']'";

    $query = "SELECT * FROM order_data WHERE user_id = '$userid'";
    $results = mysqli_query($connect, $query) or die (mysql_query());
    
    if(mysqli_num_rows($results)==0)
    {
	    echo "Your Cart is empty";
    } else { 
?>
<?php
    )
    include('footer.php');
?>