<?php
	function connectDB(){
		
		$ip = '127.0.0.1';
		$user = 'root';
		$pass ='';
		$db = 'wypozyczalnia';
		
		$sql = new mysqli($ip, $user, $pass, $db);
		
		if(!$sql){
			throw new Exception('Połączenie z bazą danych nie powiodło się.');
		} else {
			return $sql;
		}
	}
?>