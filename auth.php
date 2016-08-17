<?php
    include('header.php');
?>

<script language="JavaScript" type="text/JavaScript">
    function updateUser(username){
	    var ajaxUser = document.getElementById("userinfo");
	    ajaxUser.innerHTML = "Welcome " + username + "&nbsp;&nbsp;&nbsp;<a href=\"logout.php\">Log Out</a>";
    }
</script>

<?php
    include('config.php');
    if (session_status() == PHP_SESSION_NONE) {
	    session_start();
    }

    global $connect;

    $email = $_POST['cstusername'];
    $upass = $_POST['cstpassword'];

    $email = strip_tags(trim($email));
    $upass = strip_tags(trim($upass));
    $password = hash('sha256', $upass);

    $query = "SELECT username, password_hash, name FROM users WHERE username like '$email' " .
	        "AND password_hash like '$password'";
    $result = mysqli_query($connect, $query) or die(mysql_error()); 

    if (mysqli_num_rows($result) == 1) {
	    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		    extract($row);
		    echo "Welcome " . $name . ", redirecting to main page... <br>"; 
		    $_SESSION['username'] = $_POST['cstusername'];
		    $_SESSION['password'] = $_POST['cstpassword'];
		    echo "<SCRIPT LANGUAGE=\"JavaScript\">updateUser('$name');</SCRIPT>";
            header('Refresh: 3;url=index.php');
        }
    } else {
?>

Invalid Email address and/or Password<br>
Not registered? 
<a href="signup.php">Click here</a> to register.<br><br><br>
Try again?<br>
<a href="login.php">Click here</a> to try login again.<br>
<?php
 }
 include('footer.php');
?>