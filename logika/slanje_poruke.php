<?php
require_once __DIR__ . '/../tabele/Poruka.php';

$poruka = $_POST['poruka'];
$naslov_poruke = $_POST['naslov_poruke'];
$posiljalac = $_POST['posiljalac'];
$primalac = $_POST['primalac'];
$hitno = $_POST['hitno'];
$vreme = date('Y-m-d H:i:s');
	
if (strlen($poruka) > 160) {
	$poruka = substr($poruka, 0, 160);
}

$poruka = Poruka::posalji_poruku($posiljalac, $primalac, $naslov_poruke, $poruka, $vreme, '1', $hitno);

if ($poruka > 0) {
	header('Location: ../korisnik.php');
} else {
	header('Location: ../korisnik.php?error');
}
