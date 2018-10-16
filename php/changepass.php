<?php
	require_once('DisplayLayout.php');

	session_start();

	
	DisplayHeader();
	DisplayNavbar();
	
	$oldpass = $_POST['oldpass'];
	$newpass = $_POST['newpass'];
	$newpass2 = $_POST['newpass2'];
	
	?>

	<h2>Zmiana hasła</h2>
	
	
	
	<?php
	DisplayFooter();
?>

?>