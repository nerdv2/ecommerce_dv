<?php
    include("header.php");
    include("config.php");
    global $connect;
?>
</p>
<div class="bs-callout bs-callout-warning hidden">
  <h4>Oh snap!</h4>
  <p>This form seems to be invalid :(</p>
</div>

<div class="bs-callout bs-callout-info hidden">
  <h4>Yay!</h4>
  <p>Everything seems to be ok :)</p>
</div>

<?php
    $username = $_SESSION['username'];
    $query2 = "SELECT ID FROM users WHERE username LIKE '$username'";
    $results = mysqli_query($connect, $query2) or die(mysql_error());
    $id_data = mysqli_fetch_array($results, MYSQLI_ASSOC);

    $dataid = $id_data['ID'];

    $query  = mysqli_query($connect,'select * from users_data where user_id = "'.$dataid.'"');
    $data   = mysqli_fetch_array($query);

    $addressname = $data['user_shipping_name'];
    $address = $data['user_shipping_address'];
    $city = $data['user_shipping_city'];
    $postcode = $data['user_shipping_country'];
    $country = $data['user_shipping_postcode'];
    $phone = $data['user_phone'];

?>

<form name="formInput" action="editdata.php" method="POST" autocomplete="off">
<table border='0' cellpadding="7" cellspacing="7">
    <tr>
        <td colspan="2">Edit User Shipping Data</td>
    </tr>
    <tr>
        <td>Address Name</td>
        <td><input type="text" name="cstaddressname" size="80" value="<?php echo $addressname ?>" placeholder="(example: Home address, Work address)" required=""></td>
    </tr>
    <tr>
        <td>Address</td>
        <td><input type="text" name="cstaddress" size="80" value="<?php echo $address ?>" required=""></td>
    </tr>
    <tr>
        <td>City</td>
        <td><input type="text" name="cstcity" size="80" value="<?php echo $city ?>" required=""></td>
    </tr>
    <tr>
        <td>Postcode</td>
        <td><input type="number" name="cstpost" size="80" value="<?php echo $postcode ?>" required=""></td>
    </tr>
    <tr>
        <td>Country</td>
        <td>
        <?php
            include("countrydata.php");
        ?>
        </td>
    </tr>
    <tr>
        <td>Phone</td>
        <td><input type="number" name="cstphone" size="80" value="<?php echo $phone ?>" required=""><span id="emailmsg"></span></td>
    </tr>
    <tr>
        <td colspan="2">
        <input type="submit" value="Submit">
        <input type="reset" value="Reset Form">
        </td>
    </tr>
</table>
</form>

<script type="text/javascript">
$(function () {
  $('#formInput').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
  })
  .on('form:submit', function() {
    return false; // Don't submit form for this demo
  });
});
</script>

<?php
    include("footer.php");
?>