<?php
    if ( ! isset($totalamount)) {
   	    $totalamount=0;
    }
    $totalquantity=0;
    if (!session_id()) {
  	    session_start();
    }
    $sessid = session_id();
    $query = "SELECT * FROM cart WHERE session_id = '$sessid'";
    $results = mysqli_query($connect, $query) or die (mysql_query());
    
    if(mysqli_num_rows($results)==0)
    {
	    echo "Your Cart is empty";
    } else { 
?>

<table border="1" align="center" cellpadding="5">
  	<tr><td> Item Code</td><td>Quantity</td><td>Item Name</td><td>Price</td><td>Total Price</td>
<?php
	while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
  		extract($row);
  		echo "<tr><td>";
  		echo $product_id;
  		echo "</td>";
  		echo "<td> <form method=\"POST\" action=\"cart.php?action=change&icode=$product_id\"> <input type=\"text\" name=\"modified_quantity\" size=\"2\" value=\"$quantity\">";
  		echo "</td><td>";
  		echo $product_name;
  		echo "</td><td>";
  		echo $price;
  		echo "</td><td>";
		$totalquantity = $totalquantity + $quantity;
  		$totalprice = number_format($price * $quantity, 2);
		$totalamount=$totalamount + ($price * $quantity);
  		echo $totalprice;
  		echo "</td><td>";
  		echo "<input type=\"submit\" name=\"Submit\"  value=\"Change quantity\"> </form></td>";
  		echo "<td>";
  		echo "<form method=\"POST\" action=\"cart.php?action=delete&icode=$product_id\">";
  		echo "<input type=\"submit\" name=\"Submit\" value=\"Delete Item\"> </form></td></tr>";
	}
	echo "<tr><td >Total</td><td>$totalquantity</td><td></td><td></td><td>";
  	$totalamount = number_format($totalamount, 2);
	echo $totalamount;
	echo "</td></tr>";
	echo "</table><br>";
	echo "<div style=\"width:400px; margin:auto;\">You currently have " . $totalquantity . " product(s) selected in your cart</div> ";
?>
	<table border="0" style="margin:auto;">
	<tr><td  style="padding: 10px;">
	<form method="POST" action="cart.php?action=empty">
		<input type="submit" name="Submit" value="Empty Cart" style="font-family:verdana; font-size:150%;" > 
	</form>
	</td><td>
	<form method="POST" action="getauth.php">
		<input id="cartamount" name="cartamount" type="hidden" value= "<?php echo $totalamount ; ?>">
		<input type="submit" name="Submit" value="Checkout"  style="font-family:verdana; font-size:150%;" >
	</form>
	</td></tr></table>
<?php
}
?>
</body>
</html>
