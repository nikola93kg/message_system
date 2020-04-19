<?php

if(!isset($_POST['email'])) {
	header('Location: ../index.php');
	die();
}

$email = $_POST['email'];
$password = $_POST['password'];
$password_repeat = $_POST['password_repeat'];
$ime_prezime = $_POST['ime_prezime'];
$telefon = $_POST['telefon'];
$slika = $_FILES['slika'];

$password = hash('sha512', $password);
$password_repeat = hash('sha512', $password_repeat);

if ($password !== $password_repeat) {
	header('Location: ../registracija.php?greska=lozinka');
	die();
}

require_once __DIR__ . '/../tabele/Korisnik.php';

$korisnik_id = Korisnik::register($email, $password, $ime_prezime, $telefon, $slika['name']);

if ($korisnik_id !== null && isset($_FILES['slika'])) {
	require_once __DIR__ . '/../includes/Upload.php';
	$upload = Upload::factory('uploads', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
	$upload->file($slika);
	$upload->set_allowed_mime_types(['jpg/jpeg', 'image/png', 'image/gif']);
	$upload->set_max_file_size(2);
	$upload->set_filename($slika['name']);
	$upload->save();
	header('Location: ../index.php?register=uspesno');
} else {
	header('Location: ../registracija.php?error=podaci');
	die();
}