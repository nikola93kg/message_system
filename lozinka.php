<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Promeni lozinku</title>
	<link rel="stylesheet" type="text/css" href="css/style.css?v1">
	<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:500&display=swap&subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
</head>
<body class="login_body">
	<div class="login_box">
		<h2>Промените лозинку</h2>
		<form action="logika/promeni_lozinku.php" method="post">
			<div class="inputBox">
				<input type="email" name="email" id="email" required autocomplete="off">
				<label for="email">Унесите имејл</label>
			</div>
			<div class="inputBox">
				<input type="password" name="old_password" id="old_pass" required>
				<label for="old_pass">Унесите стару лозинку</label>
			</div>
			<div class="inputBox">
				<input type="password" name="new_password" id="new_pass" required>
				<label for="new_pass">Унесите нову лозинку</label>
			</div>	
			<div class="inputBox">
				<input type="password" name="new_password_repeat" id="new_pass_repeat" required>
				<label for="new_pass_repeat">Поновите нову лозинку</label>
			</div>	
			<input type="submit" name="" value="Промените лозинку">
			<p class="reg"><a href="registracija.php"> Региструјте се</a></p>
		</form>
	</div>
	<p class="povratak">Врати се <a href="index.php">назад</a></p>
	<?php if (isset($_GET['greska'])): ?>
		<p class="error_lozinka">Нове лозинке се не подударају!</p>
	<?php endif ?>
	<?php if (isset($_GET['error'])): ?>
		<p class="error_podaci">Погрешни подаци за пријаву.</p>
	<?php endif ?>
</body>
</html>