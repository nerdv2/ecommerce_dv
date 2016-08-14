<?php
    include('header.php');
    include('config.php');


    function getItemData(){
        global $connect;
        $code = $_REQUEST['id'];
        $query = "SELECT id, name, category, price, image, info, stock, weight, dimension FROM product_data WHERE id LIKE '$code'";
        $results = mysqli_query($connect, $query) or die(mysql_error());
        if($results === FALSE) { 
            echo mysql_error();
        } else {
            $row = mysqli_fetch_array($results, MYSQLI_ASSOC);

            $item_code = $row['id'];
            $itemname = $row['name'];
            $itemprice = $row['price'];

            echo "<br><h2>". $row['name'] ."</h2><br>";
            echo "<table width='100%' border='0'><tr>";
            echo '<td width="30%"><img src=img/' . $row['image'] . ' style="max-width:220px;max-height:240px;width:220px;height:240px;"></img><br/></td>';
 		    echo "<td width='80%'>Category : ". $row['category'] ."<br>";
            echo "Stock : ". $row['stock'] ."<br>";
            echo "Weight : ". $row['weight'] ."kg<br>";
            echo "Dimension : ". $row['dimension'] ."cm<br>";
            echo "Price : Rp.". $row['price'] ."<br><br>";
            echo "<form method=\"POST\" action=\"cart.php?action=add&icode=$item_code&iname=$itemname&iprice=$itemprice\">";
            echo " Quantity: <input type=\"text\" name=\"quantity\" size=\"2\"> &nbsp;&nbsp;&nbsp<br><br>";
            echo "<input type=\"submit\" name=\"buynow\" value=\"Buy Now\">";
            echo "&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"addtocart\" value=\"Add To Cart\"></td>";
            echo"  </form>";
            echo "</td></tr><tr>";
            echo "<td colspan='2'>". $row['info'] ."<br>";
            echo "</td></tr>";
            echo "</table>";
        }
    }   
?>
</p>
    <?php
        getItemData();
        include('footer.php');
    ?>