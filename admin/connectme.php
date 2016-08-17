<?php
   // define database related variables
   $database = 'ecommerce_dv';
   $host = '127.0.0.1';
   $user = 'root';
   $pass = 'development';

   // try to conncet to database
   $dbh = new PDO("mysql:dbname={$database};host={$host};port={3306}", $user, $pass);
   $db_link	= mysqli_connect($host,$user,$pass,$database);


   if(!$dbh){

      echo "unable to connect to database";
   }

   if(!$db_link){

      echo "unable to connect to database";
   }
   
?>
