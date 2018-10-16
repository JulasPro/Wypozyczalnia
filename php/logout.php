<?php
	require_once('DisplayLayout.php');

	session_start();
	@$logout_user = $_SESSION['uzytkownik'];
	
	unset($_SESSION['uzytkownik']);
	$destroy = session_destroy();
	
	
	DisplayHeader();
	DisplayNavbar();
	
	if(!empty($logout_user)){
		if($destroy){
			echo 'Wylogowano.<br/>';
		} else {
			echo 'Wylogowanie niemożliwe.<br/>';
		}
	} else {
		echo 'Użytkownik niezalogowany. Wylogowanie niemożliwe.<br/>';
	}
	DisplayFooter();
?>