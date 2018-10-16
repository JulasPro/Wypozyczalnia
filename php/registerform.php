<?php
	require_once('RegLogFunction.php');
	require_once('DisplayLayout.php');
	require_once('ConnectDB.php');
	
	$login = $_POST['login'];
	$pass = $_POST['pass'];
	$pass2 = $_POST['pass2'];
	$email = $_POST['email'];
	
	try{
		if(!IsCompletedForm($_POST)){
			throw new Exception('Formularz wypełniony nieprawidłowo - Wróć i spróbuj ponownie.');
		}

		if($pass != $pass2){
			throw new Exception('Hasła są różne - Wróć i spróbuj ponownie!.');
		}
		
		if(!CorrectEmail($email)){
			throw new Exception('Nieprawidłowy adres email - Wróć i spróbuj ponownie.');
		}	
			
		if((strlen($pass) < 6) || (strlen($pass) > 16)){
			throw new Exception('Haslo musi mieć co najmniej 6 oraz maksymalnie 16 znaków - Wróć i spróbuj ponownie!.');
		}
		
		Register($login, $pass, $email);
		$_SESSION['Uzytkownik'] = $login;
		
		require_once('DisplayLayout.php');
		
		DisplayHeader();
		DisplayNavbar();
		?>
		<div class="loginregister">
		<h2>Pomyślnie utworzony konto! Teraz możesz się zalogować.</h2>
		</div>
		<?php
		DisplayFooter();
	}
	catch(Exception $e){
		DisplayHeader();
		DisplayNavbar();
		echo $e->getMessage();
		DisplayFooter();
		exit;
	}
?>
