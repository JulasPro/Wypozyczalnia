<?php
	require_once('RegLogFunction.php');


	session_start();
	
	$login = $_POST['login'];
	$pass = $_POST['pass'];
	
	if($login && $pass){
		try{
			Login($login, $pass);
			$_SESSION['uzytkownik'] = $login;
			header('Location: ./home.php');
		}
		catch (Exception $e){
			echo 'Zalogowanie niemożliwe.';
			exit;
		}
	}
?>