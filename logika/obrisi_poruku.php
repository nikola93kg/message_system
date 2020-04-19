<?php
session_start();

require_once __DIR__ . '/../tabele/Poruka.php';

try {
	Poruka::obrisiPoruku($_GET['id']);
	header('Location: ../poruke.php');
} catch (Exception $ex) {
	header('Location: ../korisnik.php');
}
