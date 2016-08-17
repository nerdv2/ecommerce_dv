<?php
    include('header.php');
    include('config.php');

    if (session_status() == PHP_SESSION_NONE) {
	    session_start();
    }

    global $connect;
    $message = "";
    $quantity = "";
    $action = "";
    $query = "";

    if(isset($_POST['quantity'])){
        $quantity = trim($_POST['quantity']);
    }
    if($quantity==''){
        $quantity=1;
    }
    if($quantity<=0){
        echo "Quantity value is invalid";
        echo "Go back and enter the valid value";
    } else {
        if(isset($_REQUEST['icode'])) {
            $itemcode = $_REQUEST['icode'];
        }
        if(isset($_REQUEST['iname'])) {
            $item_name = $_REQUEST['iname'];
        }
        if(isset($_REQUEST['iprice'])) {
            $price = $_REQUEST['iprice'];
        }
        if(isset($_REQUEST['modified_quantity'])) {
            $modified_quantity = $_REQUEST['modified_quantity'];
        }
        $session_id = session_id();
        if(isset($_REQUEST['action'])) {
            $action = $_REQUEST['action'];
        }

        switch($action) {
            case "add":
			$query="select * from cart where session_id = '$session_id' and product_id like '$itemcode'";
            $result = mysqli_query($connect, $query) or die(mysql_error()); 
			if(mysqli_num_rows($result)==1)
			{
				$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
				$qt=$row['quantity'];
				$qt=$qt + $quantity;
				$query="UPDATE cart set quantity=$qt where session_id = '$session_id' and product_id like '$itemcode'";
				$result = mysqli_query($connect, $query)  or die(mysql_error());
			}
			else
			{
    				$query = "INSERT INTO cart (session_id, product_id, product_name, quantity, price) VALUES ('$session_id', $itemcode, '$item_name', '$quantity', '$price')";
                    $message = "<div align=\"center\"><strong>Item added.</strong></div>";
			}
    			break;

  		case "change":
			if($modified_quantity==0)
			{
    				$query = "DELETE FROM cart WHERE session_id = '$session_id' and product_id like '$itemcode'";
    				$message = "<div style=\"width:200px; margin:auto;\">Item deleted</div>";
			}
			else
			{
				if($modified_quantity <0)
				{
					echo "Invalid quantity entered";
				}
				else
				{
    					$query = "UPDATE cart SET quantity = $modified_quantity  WHERE session_id = '$session_id' and product_id like '$itemcode'";
    					$message = "<div style=\"width:200px; margin:auto;\">Quantity changed</div>";
				}
			}
    			break;
  		case "delete":
    			$query = "DELETE FROM cart WHERE session_id = '$session_id' and product_id like '$itemcode'";
    			$message = "<div style=\"width:200px; margin:auto;\">Item deleted</div>";
    			break;
  		case "empty":
    			$query = "DELETE FROM cart WHERE session_id = '$session_id'";
      			break;
	    }
	    if($query !="") {
		$results = mysqli_query($connect, $query) or die(mysql_error());
		echo $message;
	    }
	    include("cartview.php");
	    echo "<SCRIPT LANGUAGE=\"JavaScript\">updateCart();</SCRIPT>";
        }
        

    include('footer.php');
?>