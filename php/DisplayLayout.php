<?php
	require_once ('RegLogFunction.php');
	
	
	Function DisplayHeader(){
		session_start();
		?>
		<!doctype html>
			<html>
				<head>
					<title>Wypożyczalnia samochodów</title>
					
					<meta charset="UTF-8"/>
					<meta name="description" content="Wypożyczalnia samochodów"/>
					<meta name="author" content="Julian Chodorowski"/>
					
					<link href="..\css\style.css" type="text/css" rel="stylesheet"/>
				</head>
				<body>
				<div style="container">
		<?php
	}
	
	Function DisplayNavbar(){
		?>
			<ul>
				<li><a href="./home.php">Strona głowna</a></li>
				<?php
				if(isset($_SESSION['uzytkownik'])){
					?><li><a href="./logout.php">Wyloguj</a></li><?php
				} else {
					?><li><a href="./loginregister.php">Logowanie/Rejestracja</a></li><?php
				}
				?>
				
				<li><a href="./search.php">Wyszukiwarka</a></li>
				<li><a href="./cars.php">Samochody</a></li>
				<li><a href="./contact.php">Kontakt</a></li>
				<?php
				if(isset($_SESSION['uzytkownik'])){
					?><li><a href="./settings.php">Ustawienia</a></li><?php
				}
				?>
				
			</ul>
		<?php
	}
	
	Function DisplayFooter(){
		?>
			<footer>
				<p>Strona stworzona przez: Julian Chodorowski<br/>
				Przykładowe dane</p>
			</footer>
		</div>
		</body>
		</html>
		<?php
	}

	Function DisplayFilterBar(){
		?>
		<div class="filterbar">
			<form action="">
				<fieldset> 
					<legend>Miasto</legend>      
					<input type="checkbox" name="city" value="Gdansk">Gdańsk<br>      
					<input type="checkbox" name="city" value="Gdynia">Gdynia<br>        
				</fieldset>
				<fieldset> 
					<legend>Typ</legend>      
					<input type="checkbox" name="type" value="Miejski">Miejski<br>
					<input type="checkbox" name="type" value="Sportowy">Sportowy<br>
					<input type="checkbox" name="type" value="Dostawczy">Dostawczy<br>        
				</fieldset> 
			 <input type="submit" name="submit" value="Sprawdź!">
			</form>
		</div>
		<?php
	}
	
	Function DisplayLoginForm(){
		?>
		<div id="loginpanel">
		<h4>Logowanie</h4>
			<form action="loginform.php" method="post" id="loginform">
				<table>
					<tr><td>Login:</td><td><input type="text" name="login"></td>
					<tr><td>Hasło:</td><td><input type="password" name="pass" minlength="6" maxlength="16"></td>
					<tr><td colspan="2"><button type="submit" value="log_submit">Zaloguj</button></td>
				</table>
			</form>
		</div>
		<?php
	}
	
	Function DisplayRegisterForm(){
		?>
		<div id="registerpanel">
		<h4>Rejestracja</h4>
			<form action="registerform.php" method="post" id="registerform">
				<table>
					<tr><td>Login:</td><td><input type="text" name="login"></td>
					<tr><td>Hasło:</td><td><input type="password" name="pass" minlength="6" maxlength="16"></td>
					<tr><td>Powtórz hasło:</td><td><input type="password" name="pass2" minlength="6" maxlength="16"></td>
					<tr><td>Email:</td><td><input type="email" name="email"></td>
					<tr><td colspan="2"><button type="submit" value="reg_submit">Zarejestruj</button></td>
				</table>
			</form>
		</div>
		<?php
	}
	
		Function DisplayChangePassForm(){
		?>
		<div id="loginpanel">
		<h4>Logowanie</h4>
			<form action="changepassform.php" method="post" id="changepass">
				<table>
					<tr><td>Stare hasło:</td><td><input type="password" name="oldpass" minlength="6" maxlength="16"></td>
					<tr><td>Nowe hasło:</td><td><input type="password" name="newpass" minlength="6" maxlength="16"></td>
					<tr><td>Powtórz nowe hasło:</td><td><input type="password" name="newpass2" minlength="6" maxlength="16"></td>
					<tr><td colspan="2"><button type="submit" value="changepass_submit">Zmień</button></td>
				</table>
			</form>
		</div>
		<?php
	}
	
	Function DisplaySearch(){
		$query = ConnectDB();
		
		$sql = $query->query("SELECT ss.ID_Status_Samochod, s.Marka, s.Model, s.Rocznik, m.Nazwa, stat.Status from status_samochod as ss
			INNER JOIN Samochody as s on ss.ID_Samochod = S.ID_Samochod
			INNER JOIN Miasta as m ON SS.ID_Miasto = m.ID_Miasto
			INNER JOIN Status as stat ON ss.ID_Status = stat.ID_Status AND ss.ID_Status ='1';");
		
		if ($sql -> num_rows > 0){
			?>
			<table>
			<?php			
			while ($row = $sql -> fetch_assoc()){
				echo "<tr><td>".$row['Marka']."</td><td>".$row['Model']."</td><td>".$row['Rocznik']."</td><td>".$row['Nazwa']."</td><td>".$row['Status']."</td>";

			}
			?>
			</table>
			<?php
		}
	}
?>