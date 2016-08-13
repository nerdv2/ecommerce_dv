<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>ecommerce_dv</title>
<link rel="stylesheet" href="assets/bootstrap.min.css">
<link rel="stylesheet" href="assets/style.css">
<link rel="stylesheet" href="assets/parsley.css">
<script src="assets/jquery.min.js"></script>
<script src="assets/parsley.js"></script>
<script language="JavaScript" type="text/JavaScript">
	function makeRequestObject(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject('Msxml2.XMLHTTP');
	} catch (e) {
	try {
		xmlhttp = new
		ActiveXObject('Microsoft.XMLHTTP');
	} catch (E) {
		xmlhttp = false;
	}
	}
	
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
	}

	function updateCart(){
		var xmlhttp=makeRequestObject();
		xmlhttp.open('GET', 'countcart.php', true);
		xmlhttp.onreadystatechange = function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var ajaxCart = document.getElementById("cartcountinfo");
			ajaxCart.innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.send(null);
	}
</script>
</head>
<body>
<div class="container">
<table cellspacing="0" cellpadding="2">
<p align="right">
<?php
	if (session_status() == PHP_SESSION_NONE) {
    			session_start();
		}
		if (isset($_SESSION['username']))
		{
			echo "Welcome, " . $_SESSION['username'] .  "&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "<a href=\"confirmpayment.php\">Confirm Payment</a>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "<a href=\"logout.php\">Log Out</a>";
		}
		else
		{
  			echo "<a href=\"login.php\">Login</a> &nbsp;&nbsp;&nbsp;";
			echo "<a href=\"signup.php\">Create Account</a></td></tr>";
		}?>
</p>
	<tr><td style="font-size: 35px;">
    	<b><a href="index.php" class="titlebar">ecommerce_dv</a></b></font></td>
	<td>

	<form method="post" action="search.php">
	<div class="input-group stylish-input-group">
        <input type="text" class="form-control" name="tosearch"  placeholder="Search" >
        <span class="input-group-addon">
            <button type="submit">
            	<span class="glyphicon glyphicon-search"></span>
            </button>  
        </span>
    </div>
	</form>
	</td>
	<td align="right"><a href="cart.php"><img style="max-width:40px;max-height:40px;width:auto;height:auto;" src="img/Cart-32.png"></img><span id="cartcountinfo"></a></td></tr>
</table>
<p>