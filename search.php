<?php
    include('header.php');
    include('config.php');

    

    function getData(){
        global $connect;
        $tosearch = $_POST['tosearch'];
        $query = "select * from product_data where ";
        $query_fields = Array();
        $sql = "SHOW COLUMNS FROM product_data";
        $columnlist = mysqli_query($connect, $sql) or die(mysql_error()); 
        while($arr = mysqli_fetch_array($columnlist, MYSQLI_ASSOC)){
	        extract($arr);
 	        $query_fields[] = $Field . " like('%". $tosearch . "%')";
        }

        $query .= implode(" OR ", $query_fields);
        $results = mysqli_query($connect, $query) or die(mysql_error()); 
        echo "<table border = 0 >";
        $x=1;
        echo "<tr>";
        while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
            if($x<=3){
                $x = $x + 1;
 		        extract($row);
   		        echo "<td style=\"padding-right:15px;\">";
		        echo "<a href=itemdetails.php?id=$id>";
		        echo '<img src=img/' . $image . ' style="max-width:220px;max-height:240px;width:220px;height:240px;"></img><br/>';
 		        echo $name .'<br/>';
		        echo "</a>";
    		    echo '$'.$price .'<br/>';
    		    echo "</td>";
	        } else {
		        $x=1;
		        echo "</tr><tr>";
	        }
        }
            echo "</table>";
        }   
?>
</p>
    <?php
        getData();
        include('footer.php');
    ?>