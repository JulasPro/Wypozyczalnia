<?php
	require_once('ConnectDB.php');


	Function Register($imie, $haslo, $email){
		$query = connectDB();
			
			$sql = $query->query("SELECT * FROM uzytkownik WHERE login='".$imie."'");
			if(!$sql){
				throw new Exception('Wykonanie zapytania nie powiodło się.');
			}
			
			$duplicated = $sql->num_rows;
			
			if($duplicated > 0){
				throw new Exception('Nazwa użytkownika zajęta - Wróć i podaj inną.');
			}
			
			$sql = $query->query("INSERT INTO uzytkownik (Login,Pass,email) VALUES ('".$imie."', sha1('".$haslo."'), '".$email."')");
			
			if(!$sql){
				throw new Exception('Rejestracja w bazie danych niemożliwa - Spróbuj ponownie później.');
			}
		return true;
	}
	
	Function Login($login, $pass){
		
		$query = ConnectDB();
		
		$sql = $query->query("SELECT * FROM uzytkownik WHERE login='".$login."' AND pass='".sha1($pass)."'");
		
		if(!$sql){
			Throw new Exception('Logowanie nie powiodło się.');
		}
		
		$var = $sql->num_rows;
		
		if($var == "1"){
			return true;
		} else {
			throw new Exception('Logowanie nie powiodło się.');
		}
	}
	
	Function ChangePass($stare, $nowe){
		
		$query = ConnectDB();
		
		$sql = $query->query("UPDATE uzytkownik SET Pass= '".sha1($nowe)."' WHERE login = '".$_SESSION['uzytkownik']."");
		
		if($sql){
			return true;
		} else {
			Throw new Exception('Zmiana hasła niepowiodła się.');
		}
	}
	
	Function IsCompletedForm($var){
		foreach($_POST as $var => $wartosc){
				if((!isset($var)) || ($wartosc == '')){
					return false;
				} else {
					return true;
				}
			}
	}
	
	Function CorrectEmail($email){
		if(preg_match('/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/', $email)){
			return true;
		} else {
			return false;
		}
	}	
	
	
	Function CheckUserStatus(){
		if(isset($_SESSION['uzytkownik'])){
			echo "Zalogowany jako ".$_SESSION['uzytkownik'].".<br/>";
		} else { 
			echo "Nie jesteś zalogowany.<br/>";
		}
	}
	
	
?>