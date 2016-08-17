<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!=1){
      header('Location: index.php?err=2');
    }
?>
<!DOCTYPE html>
<html>

<link href="style.css" rel="stylesheet">
<body>
<h4><p align="center"><a href="adminpanel.php">Return to Admin Panel</a></p></h4>
<form action="upload_photo.php" method="post" enctype="multipart/form-data">
    <h4>Select image to upload:</h4><br>
    
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
