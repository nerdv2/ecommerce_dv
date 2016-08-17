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

<form name="formInput" action="processconfirm.php" method="POST" autocomplete="off">
<table border='0' cellpadding="7" cellspacing="7">
    <tr>
        <td colspan="2">Payment Confirmation Form</td>
    </tr>
    <tr>
        <td>Transaction ID</td>
        <td><input type="number" size="80" name="cstid" required=""><span id="usrmsg"></span></td></td>
    </tr>
    <tr>
        <td>Card Holder Name</td>
        <td><input type="text" data-parsley-type="cstname" size="80" name="cstname" placeholder="Full Name (example:John Smith)" required=""><span id="usrmsg"></span></td></td>
    </tr>
    <tr>
        <td>Transfer Value</td>
        <td><input type="number" minlength="6" name="cstvalue" size="80" required=""></td>
    </tr>
    <tr>
        <td>Transfer Target</td>
        <td><input type="text" minlength="6" name="csttarget" size="80" required=""><span id="passwdmsg"></span></td>
    </tr>
    <tr>
        <td>Date of Transfer</td>
        <td><input type="text" name="cstdate" size="80" required=""><span id="repasswdmsg"></span></td>
    </tr>
    <tr>
        <td>Account Username</td>
        <td><input type="text" name="cstusername" size="80" required=""><span id="emailmsg"></span></td>
    </tr>
    <tr>
        <td>Account E-Mail</td>
        <td><input type="email" name="cstemail" size="80" required=""><span id="emailmsg"></span></td>
    </tr>
    <tr>
        <td>Account Phone</td>
        <td><input type="number" name="cstphone" size="80" required=""></td>
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