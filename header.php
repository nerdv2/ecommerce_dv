<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>ecommerce_dv</title>
<link rel="stylesheet" href="assets/bootstrap.min.css">
<link rel="stylesheet" href="assets/style.css">
<link rel="stylesheet" href="assets/parsley.css">
<link type="text/css" rel="stylesheet" href="assets/css/lightslider.css" />

<script src="assets/jquery.min.js"></script>
<script src="assets/bootstrap.min.js"></script>
<script src="assets/js/lightslider.js"></script>
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
<div class="page-wrap">
<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">sebelas.id Store</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <?php
	if (session_status() == PHP_SESSION_NONE) {
    			session_start();
		}
		if (isset($_SESSION['username']))
		{
			?>
			
			
			
				<li class="search"><form action="search.php" method="POST" role="search">
					<div class="[ input-group ]">
						<input class="[ form-control ]" name="tosearch" placeholder="Search here..." type="text">
						<span class="[ input-group-btn ]">
							<button class="[ btn btn-danger ]" type="reset"><span class="[ glyphicon glyphicon-remove ]"></span></button>
						</span>
					</div>
				</form>
				</li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-shopping-cart"></span></a>
              <ul class="dropdown-menu">
                <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
				<li><a href="orderhistory.php"><span class="glyphicon glyphicon-time"></span> Order History</a></li>
                <li><a href="confirmpayment.php"><span class="glyphicon glyphicon-credit-card"></span> Confirm Payment</a></li>
              </ul>
            </li>
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <?php echo "&nbsp" . $_SESSION['username'] ?></a>
              <ul class="dropdown-menu">
                <li><a href="edituser.php"><span class="glyphicon glyphicon-shopping-cart"></span> My Profile</a></li>
				<li><a href="orderhistory.php"><span class="glyphicon glyphicon-time"></span> My Order</a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-credit-card"></span> Logout</a></li>
              </ul>
            </li>
			
			<?php
			
		}
		else
		{
  			echo "<li><a href=\"login.php\">Login</a></li>";
			echo "<li><a href=\"signup.php\">Create Account</a></li>";
}?>
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
	</td>
	<td align="right"></td></tr>
</table>
<p>
<div class="box-slider">
