<?php
require_once __DIR__ . '/Tabela.php';
require_once __DIR__ . '/Poruka.php';
class Korisnik extends Tabela {
	public $id;
	public $email;
	public $password;
	public $ime_prezime;
	public $telefon;
	public $slika;

	public static function register($email, $password, $ime_prezime, $telefon, $slika) {
		$db = Database::getInstance();
		$query = 'INSERT INTO korisnici (email, password, ime_prezime, telefon, slika) VALUES (:e, :p, :i, :t, :s)';
		$params = [
			':e' => $email,
			':p' => $password,
			':i' => $ime_prezime,
			':t' => $telefon,
			':s' => $slika
		];

		try {
			$db->INSERT('Korisnik', $query, $params);
		} catch(Exception $e) {
			return false;
		}
		return $db->lastInsertId();
	}

	public static function login($email, $password) {
		$db = Database::getInstance();
		$query = 'SELECT * FROM korisnici WHERE email = :e AND password = :p';
		$params = [
			':e' => $email,
			':p' => $password
		];
		$korisnici = $db->SELECT('Korisnik', $query, $params);

		if (!empty($korisnici)) {
			return $korisnici[0];
		}	
		else {
			return null;
		}	
	 }

	public static function promeni_pass($email, $new_password) {
		$db = Database::getInstance();
		$query = 'UPDATE korisnici SET password = :p WHERE email = :e';
		$params = [
			':p' => $new_password,
			':e' => $email
		];
		$db->UPDATE('Korisnik', $query, $params);
	}

	public static function getAll() {
		$db = Database::getInstance();

		$query = 'SELECT * FROM korisnici';

		return $db->select('Korisnik', $query);
	}

	public static function korisnik_za_id($id) {
		$db = Database::getInstance();
		$query = 'SELECT * FROM korisnici WHERE id = :id';
		$params = [
			':id' => $id
		];
		$korisnici = $db->select('Korisnik', $query, $params);
		foreach ($korisnici as $korisnik) {
			return $korisnik;
		} return null;
	}
	
}