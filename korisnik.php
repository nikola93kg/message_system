<?php
session_start();
$_SESSION['korisnik_ime_prezime'];

if(!isset($_SESSION['korisnik_id'])) {
	header('Location: index.php');
}
$ime = $_SESSION['korisnik_ime_prezime'];

require_once __DIR__ . '/tabele/Korisnik.php';
$podaci = Korisnik::getAll();

?>

<?php require_once "partials/head.php" ?>
<?php require_once "partials/navbar.php" ?>
<?php require_once "partials/main.php" ?>
<?php require_once "partials/footer.php" ?>	