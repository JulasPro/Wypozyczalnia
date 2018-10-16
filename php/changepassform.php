<?php
	require_once('RegLogFunction.php');


	session_start();
	
	$oldpass = $_POST['oldpass'];
	$newpass = $_POST['newpass'];
	$newpass2 = $_POST['newpass2'];
	
	if($newpass != $newpass2){
			throw new Exception('Hasła są różne - Wróć i spróbuj ponownie!.');
	}
	
	if($oldpass && $newpass){
		try{
			ChangePass($oldpass, $newpass);
		header('Location: ./home.php');
		}
		catch (Exception $e){
			echo 'Zmiana hasła niemożliwa.';
			exit;
		}
	}
?>