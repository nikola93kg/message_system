<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registracija</title>
	<link rel="stylesheet" type="text/css" href="css/style.css?v1">
	<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:500&display=swap&subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
</head>

<body class="login_body">
	<div class="login_box">
		<h2>Региструј се</h2>
		<form action="logika/registruj_se.php" method="post" enctype="multipart/form-data">
			<div class="inputBox">
				<input type="email" name="email" id="email" required autocomplete="off">
				<label for="email">Унесите имејл адресу</label>
			</div>
			<div class="inputBox">
				<input type="password" name="password" id="pass" required>
				<label for="password">Унесите лозинку</label>
			</div>
			<div class="inputBox">
				<input type="password" name="password_repeat" id="pass_repeat" required>
				<label for="pass_repeat">Поновите лозинку</label>
			</div>
			<div class="inputBox">
				<input type="text" name="ime_prezime" id="ime_prezime" required autocomplete="off">
				<label for="ime_prezime">Унесите име и презиме</label>
			</div>
			<div class="inputBox">
				<input type="text" name="telefon" id="telefon" required autocomplete="off">
				<label for="telefon">Унесите број телефона</label>
			</div>
			<div class="inputBox">
				<input type="file" name="slika" id="slika">
				<label for="slika">Одаберите слику</label>
			</div>
			<input type="submit" name="" value="Региструј се">
		</form>
	</div>
	<p class="pass_reset">Заборавили сте лозинку? <a href="lozinka.php">Промените лозинку</a></p>
	<p class="povratak">Врати се <a href="index.php">назад</a></p>
	<?php if (isset($_GET['greska'])) : ?>
		<p class="error">Лозинке се не подударају!</p>
	<?php endif ?>
	<?php if (isset($_GET['error'])) : ?>
		<p id="error">Већ је регистрован налог са том имејл адресом.</p>
	<?php endif ?>
</body>

</html>