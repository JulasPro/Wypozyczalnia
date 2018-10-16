<?php
	require_once('DisplayLayout.php');

	
	DisplayHeader();
	DisplayNavbar();
	
	if(isset($_SESSION['uzytkownik'])){
		?>
		<h2>Zmiana hasła</h2>	
		<?php
		DisplayChangePassForm();
	} else { 
		echo "Nie jesteś zalogowany.<br/>";
	}
	DisplayFooter();

?>