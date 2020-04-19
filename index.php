<?php 
session_start();
if(isset($_SESSION['korisnik_id'])) {
	header('Location: korisnik.php');
	die();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css?v2">
	<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:500&display=swap&subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
</head>
<body class="login_body">
	<div class="login_box">
		<h2>Улогуј се</h2>
		<form action="logika/prijavi_se.php" method="post">
			<div class="inputBox">
				<input type="email" name="email" id="email" required autocomplete="off">
				<label for="email">Имејл</label>
			</div>
			<div class="inputBox">
				<input type="password" name="password" id="pass" required>
				<label for="pass">Лозинка</label>
			</div>
			<input type="submit" name="" value="Улогуј се">
			<?php if(isset($_GET['greska'])): ?>
				<p class="login_greska">Погрешни подаци за пријаву.</p>
			<?php endif ?>
			<p class="reg">Немате налог?<a href="registracija.php"> Региструјте се</a></p>
		</form>
	</div>
	<p class="pass_reset">Заборавили сте лозинку? <a href="lozinka.php">Промените лозинку</a></p>

</body>
</html>