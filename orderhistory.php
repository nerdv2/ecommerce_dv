<?php
    include('header.php');
    include('config.php');

    global $connect;

    $username = $_SESSION['username'];

    $query2 = "SELECT ID FROM users WHERE username LIKE '$username'";
    $results = mysqli_query($connect, $query2) or die(mysql_error());
    $id_data = mysqli_fetch_array($results, MYSQLI_ASSOC);

    $iddata = $id_data['ID'];

    $query = "CALL getOrder('$iddata')";
    $results = mysqli_query($connect, $query) or die (mysql_query());
    
    if(mysqli_num_rows($results)==0)
    {
      echo "Your Order is empty";
    } else { 
?>
<h3>Order Data</h3>
<table border="0" align="center" cellpadding="5">
    <tr><td> Transaction ID</td><td>Time of Order</td><td>Status</td><td>Shipping name</td><td>Total Price</td></tr>
<?php
  while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
      extract($row);
      echo "<tr><td>";
      echo $id;
      echo "</td>";
      echo "<td>";
      echo $timestamp;
      echo "</td><td>";
      echo $name;
      echo "</td><td>";
      echo $shipping_name;
      echo "</td><td>";
        echo $product_cost;
        echo "</td></tr>";
    }
?>
</table>
<?php
    }
    include('footer.php');
?>