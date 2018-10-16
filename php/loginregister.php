<?php
	require_once('DisplayLayout.php');
	
	DisplayHeader();
	DisplayNavbar();
	?>
	<div class="loginregister">
	<?php
	DisplayLoginForm();
	DisplayRegisterForm();
	?></div><?php
	DisplayFooter();
?>