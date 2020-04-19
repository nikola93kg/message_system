<?php
session_start();
if (!isset($_SESSION['korisnik_id'])) {
	header('Location: index.php?prijavi_se');
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Page not found</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:500&display=swap&subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css?v15">
</head>

<body class="error_body">
	<div class="container">
		<h2>Упс! Страница није пронађена :(</h2>
		<h1>404</h1>
		<p>Не можемо да пронађемо страницу, разумеш.</p>
		<a href="korisnik.php">врати се назад</a>
	</div>
</body>

</html>