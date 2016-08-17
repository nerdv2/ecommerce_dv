</div>
<br><br><br><table border="0">
<tr>
    <td><a href="howto.php">How to shop?</a></td>
    <td><a href="privacy.php">Privacy Policy</a></td>
    <td><a href="terms.php">Terms of use</a></td>
    <td><a href="about.php">About Us</a></td>
</tr>
<tr>
    <td colspan='4'><br>Copyright (c) 2016 eCommerce_dv, All Right Reserved. Built by <a href="team.php">sebelas.id Development Team</a></td>
</tr>
</table>
</div>

<script type="text/javascript">
	$(function() { 

    $('a[href="#toggle-search"], .navbar-bootsnipp .bootsnipp-search .input-group-btn > .btn[type="reset"]').on('click', function(event) {
		event.preventDefault();
		$('.navbar-bootsnipp .bootsnipp-search .input-group > input').val('');
		$('.navbar-bootsnipp .bootsnipp-search').toggleClass('open');
		$('a[href="#toggle-search"]').closest('li').toggleClass('active');

		if ($('.navbar-bootsnipp .bootsnipp-search').hasClass('open')) {
			/* I think .focus dosen't like css animations, set timeout to make sure input gets focus */
			setTimeout(function() { 
				$('.navbar-bootsnipp .bootsnipp-search .form-control').focus();
			}, 100);
		}			
	});

	$(document).on('keyup', function(event) {
		if (event.which == 27 && $('.navbar-bootsnipp .bootsnipp-search').hasClass('open')) {
			$('a[href="#toggle-search"]').trigger('click');
		}
	});
    
});
	</script>
</body>
</html>