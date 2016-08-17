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

<form name="formInput" action="auth.php" method="POST" autocomplete="off">
<table border='0' cellpadding="7" cellspacing="7">
    <tr>
        <td colspan="2">Welcome, please enter your credential.</td>
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
        <td colspan="2" width="600px">
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