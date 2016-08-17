<?php
    include('header.php');
    include('config.php');
?>
</p>
<div class="box-slider">
<ul id="lightSlider">
  <li>
      <h3>Dell XXx</h3>
      <p><img src="img/1.png" style="max-width:220px;max-height:240px;width:220px;height:240px;"><br>Rp.1900</p>
  </li>
  <li>
      <h3>Second Slide</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut commodo orci, nec tincidunt nisi. Morbi ut ultricies nisl. Aenean blandit pretium rhoncus. Vivamus eu nunc fermentum, placerat risus nec, mattis quam. Duis ac nisi ligula. Vestibulum mollis nisl ac ante aliquet, quis lobortis massa ornare. Donec eget diam non ante luctus lobortis. </p>
  </li>
  <li>
      <h3>Third Slide</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut commodo orci, nec tincidunt nisi. Morbi ut ultricies nisl. Aenean blandit pretium rhoncus. Vivamus eu nunc fermentum, placerat risus nec, mattis quam. Duis ac nisi ligula. Vestibulum mollis nisl ac ante aliquet, quis lobortis massa ornare. Donec eget diam non ante luctus lobortis. </p>
  </li>
  <li>
      <h3>Fourth Slide</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut commodo orci, nec tincidunt nisi. Morbi ut ultricies nisl. Aenean blandit pretium rhoncus. Vivamus eu nunc fermentum, placerat risus nec, mattis quam. Duis ac nisi ligula. Vestibulum mollis nisl ac ante aliquet, quis lobortis massa ornare. Donec eget diam non ante luctus lobortis. </p>
  </li>
  <li>
      <h3>Fifth Slide</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut commodo orci, nec tincidunt nisi. Morbi ut ultricies nisl. Aenean blandit pretium rhoncus. Vivamus eu nunc fermentum, placerat risus nec, mattis quam. Duis ac nisi ligula. Vestibulum mollis nisl ac ante aliquet, quis lobortis massa ornare. Donec eget diam non ante luctus lobortis. </p>
  </li>
</ul>
</div>
<?php

    function getData(){
        global $connect;
        $query = "SELECT id, name, category, price, image, info FROM product_data";
        $results = mysqli_query($connect, $query) or die(mysql_error());
        echo "<table border = 0 >";
        $x=1;
        echo "<tr class='homepagetable'>";
        while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
            if($x <=3){
                $x++;
            }
 		        extract($row);
   		        echo "<td class='homepagetable'>";
		        echo "<a href=itemdetails.php?id=$id>";
		        echo '<img src=img/' . $image . ' style="max-width:220px;max-height:240px;width:220px;height:240px;"><br/>';
 		        echo '<div class="truncate">'. $name .'</div><br/>';
		        echo "</a>";
    		    echo 'Rp.'.$price .'<br/>';
    		    echo "</td>";
	        if($x == 4){
		        $x=1;
		        echo "</tr>";
	        }
        }
            echo "</table>";
        }   
?>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#lightSlider").lightSlider({
                item: 1,
                speed: 800,
                pause: 5000,
                pauseOnHover: true,
                auto: true,
                loop: true,
                        responsive : [
            {
                breakpoint:800,
                settings: {
                    item:1,
                    slideMove:1,
                    slideMargin:6,
                  }
            },
            {
                breakpoint:480,
                settings: {
                    item:1,
                    slideMove:1
                  }
            }
        ]
            });
        });
    </script>
    <?php
        getData();
        include('footer.php');
    ?>
