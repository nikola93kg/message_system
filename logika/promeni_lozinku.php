<?php

if(!isset($_POST['email'])) {
	header('Location: ../index.php');
	die();
}

$email = $_POST['email'];
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$new_password_repeat = $_POST['new_password_repeat'];

$old_password = hash('sha512', $old_password);
$new_password = hash('sha512', $new_password);
$new_password_repeat = hash('sha512', $new_password_repeat);

if ($new_password !== $new_password_repeat) {
	header('Location: ../lozinka.php?greska=lozinka');
	die();
}

require_once __DIR__ . '/../tabele/Korisnik.php';
$korisnik = Korisnik::login($email, $old_password);

if ($korisnik !== null) {
	Korisnik::promeni_pass($email, $new_password);
	header('Location: ../index.php?change=success');
} else {
	header('Location: ../lozinka.php?error=podaci');
}