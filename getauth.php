<?php
include('header.php');
include('config.php');

if (session_status() == PHP_SESSION_NONE) {
    	session_start();
}

global $connect;
$cartamount=0;
$cartamount = $_POST['cartamount'];
$_SESSION['cartamount']=$cartamount;
if (isset($_SESSION['username']))
{
	$username=$_SESSION['username'];
	echo "Welcome " . $username . ". <br/>";
}
if (isset($_SESSION['password']))
{
	$password=$_SESSION['password'];
}
if ((isset($_SESSION['username']) && $_SESSION['username'] != "") ||   (isset($_SESSION['password']) && $_SESSION['password'] != "")) {
	$sess = session_id();
	$query="select * from cart where session_id = '$sess'";
	$result = mysqli_query($connect, $query) or die(mysql_error()); 
	if(mysqli_num_rows($result)>=1)
	{
		$query = "SELECT * FROM users, users_data WHERE users.`ID` = users_data.`user_id` AND users.username = '$username'";
		$res = mysqli_query($connect, $query) or die(mysql_error());
		$data = mysqli_fetch_array($res, MYSQLI_ASSOC);
		extract($data);
		echo "<form method='POST' action='purchase.php'>";
		echo "<table><tr>";
		echo "<td><br>Username : </td><td> <input type='text' name='username' value='$username' readonly><br></td></tr>";
		echo "<tr><td>E-mail : </td><td> <input type='text' name='email' value='$email' readonly><br></td></tr>";
		echo "<tr><td>Customer Name : </td><td> <input type='text' name='name' value='$name' readonly><br></td></tr>";
		echo "<tr><td>Shipping Name : </td><td> <input type='text' name='shippingname' value='$user_shipping_name' readonly><br></td></tr>";
		echo "<tr><td>Shipping Address : </td><td> <input type='text' name='address' value='$user_shipping_address' readonly><br></td></tr>";
		echo "<tr><td>Shipping City : </td><td> <input type='text' name='city' value='$user_shipping_city' readonly><br></td></tr>";
		echo "<tr><td>Shipping Country : </td><td> <input type='text' name='country' value='$user_shipping_country' readonly><br></td></tr>";
		echo "<tr><td>Shipping Postcode : </td><td> <input type='text' name='postcode' value='$user_shipping_postcode' readonly><br></td></tr>";
		echo "<tr><td>Customer Phone : </td><td> <input type='text' name='phone' value='$user_phone' readonly><br></td></tr>";
		echo "<tr><td><input type='submit' value='Confirm shipping info'></td></tr>";
		echo "</table>";
		echo "</form>";

	}
	else
	{
		echo "You can do purchasing by selecting items from the menu on left side";
	}
}
else
{
?>
	<html>
	<head>
	</head>
	<body>
		<p>
  		You are currently not logged into our system.<br>
  		You can do purchasing only if you are logged in.<br>
  		If you have already registered, 
  		<a href="login.php">click here</a> to login, or if would like to create an account, <a href="signup.php">click here</a> to register.
		</p>
	</body>
	</html>
<?php
}
include("footer.php");
?>