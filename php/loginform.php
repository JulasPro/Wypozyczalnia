<?php
	require_once('RegLogFunction.php');


	session_start();
	
	if(!isset($_POST['login'])){
		$_POST['login'] = "";
	}
	
	$login = $_POST['login'];
	
	if(!isset($_POST['pass'])){
		$_POST['pass'] = "";
	}
	
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