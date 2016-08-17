<?php
    include("header.php");
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

<form name="formInput" action="createuser.php" method="POST" autocomplete="off">
<table border='0' cellpadding="7" cellspacing="7">
    <tr>
        <td colspan="2">Signup Form</td>
    </tr>
    <tr>
        <td>Customer Name</td>
        <td><input type="text" data-parsley-type="alphanum" size="80" name="cstname" placeholder="Full Name (example:John Smith)" required=""><span id="usrmsg"></span></td></td>
    </tr>
    <tr>
        <td>Username</td>
        <td><input type="text" minlength="6" name="cstusername" size="80" required=""></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type="password" minlength="6" name="cstpassword" size="80" required=""><span id="passwdmsg"></span></td>
    </tr>
    <tr>
        <td>Confirm Password</td>
        <td><input type="password" data-parsley-equalto="#cstpassword" name="cstrepassword" size="80" required=""><span id="repasswdmsg"></span></td>
    </tr>
    <tr>
        <td>E-Mail</td>
        <td><input type="email" name="cstemail" size="80" required=""><span id="emailmsg"></span></td>
    </tr>
    <tr>
        <td>Phone</td>
        <td><input type="number" name="cstphone" size="80" required=""><span id="emailmsg"></span></td>
    </tr>
    <tr>
        <td>Address Name</td>
        <td><input type="text" name="cstaddressname" size="80" placeholder="(example: Home address, Work address)" required=""></td>
    </tr>
    <tr>
        <td>Address</td>
        <td><input type="text" name="cstaddress" size="80" required=""></td>
    </tr>
    <tr>
        <td>City</td>
        <td><input type="text" name="cstcity" size="80" required=""></td>
    </tr>
    <tr>
        <td>Postcode</td>
        <td><input type="number" name="cstpost" size="80" required=""></td>
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