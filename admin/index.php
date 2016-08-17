<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8589-1" />
<title>ecommerce_dv Login Panel</title>
<link href="style.css" rel="stylesheet">
</head>

<body>

<h1><strong><p align="center">ecommerce_dv</p></strong></h1><br>
<h2><strong><p align="center">Login Panel</p></strong></h2>
    <center>
        <div>
            <div class="block-margin-top">
                <?php 
                    $errors = array(
                                    1=>"Invalid user name or password, Try again",
                                    2=>"Please login to access this area"
                                  );

                                $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;

                                if ($error_id == 1) {
                                        echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                                    }elseif ($error_id == 2) {
                                        echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                                    }
                               ?>  

                              <form action="auth.php" method="POST" role="form">  
                                  <input class="biginput" type="text" name="username" placeholder="Username" required autofocus><br/>
                                  <input class="biginput" type="password" name="password"  placeholder="Password" required><br/>
                                  <button type="submit">Sign in</button>
                             </form>
                           </div>
            </div>
            <p align="center">Copyright (c) 2016 eCommerce_dv, All Right Reserved. Programmed by : <a href="mailto:gema_wardian@hotmail.com">Gema Aji W.</a> and <a href="mailto:dangridho99@gmail.com">Dang Ridho</a></p>
    </center>
</body>
</html>