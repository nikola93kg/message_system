<?php

if(!isset($_POST['email'])) {
	header('Location: ../index.php');
	die();
}

$email = $_POST['email'];
$password = $_POST['password'];

$password = hash('sha512', $password);

require_once __DIR__ . '/../tabele/Korisnik.php';
$korisnik = Korisnik::login($email, $password);

if ($korisnik !== null) {
	session_start();
	$_SESSION['korisnik_id'] = $korisnik->id;
	$_SESSION['korisnik_ime_prezime'] = $korisnik->ime_prezime;
	$_SESSION['korisnik_slika'] = $korisnik->slika;	
	header('Location: ../korisnik.php'); 
} else {
	header('Location: ../index.php?greska=podaci');
}