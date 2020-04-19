<?php
require_once __DIR__ . '/Tabela.php';
require_once __DIR__ . '/Korisnik.php';
class Poruka extends Tabela {
	public $id;
	public $posiljalac;
	public $primalac;
	public $naslov;
	public $tekst_poruke;
	public $vreme;
	public $poslata;
	public $procitana;
	public $hitno;
	public $korisnik_id;

	public function getKorisnik() {
		return Korisnik::getById($this->korisnik_id, 'korisnici', 'Korisnik');
	}

	public static function posalji_poruku($posiljalac, $primalac, $naslov, $tekst_poruke, $vreme, $poslata, $hitno) {
		$db = Database::getInstance();
		$query = 'INSERT INTO poruke (posiljalac, primalac, naslov, tekst_poruke, vreme, poslata, hitno) VALUES (:po, :pr, :n, :t, :v, :pos, :h)';
		$params = [
			':po' => $posiljalac,
			':pr' => $primalac,
			':n' => $naslov,
			':t' => $tekst_poruke,
			':v' => $vreme,
			':pos' => $poslata,
			':h' => $hitno
		];
		$db->INSERT('Poruka', $query, $params);
		return $db->lastInsertId();
	}

	public static function sve_poruke() {
		$db = Database::getInstance();
		$query = 'SELECT * FROM poruke ORDER BY vreme DESC';
		$poruke = $db->select('Poruka', $query);
		return $poruke;
	}

	public static function vratiSvePoslatePoruke($posiljalac) {
		$db = Database::getInstance();
		$query = 'SELECT * FROM poruke WHERE posiljalac = :p ORDER BY vreme DESC';
		$params = [
			':p' => $posiljalac,
		];
		$rezultati = $db->select('Poruka', $query, $params);
		return $rezultati;
	}

	public static function vratiSvePrimljenePoruke($primalac) {
		$db = Database::getInstance();
		$query = 'SELECT * FROM poruke WHERE primalac = :p ORDER BY vreme DESC';
		$params = [
			':p' => $primalac,
		];
		$rezultati = $db->select('Poruka', $query, $params);
		return $rezultati;
	}

	public static function setProcitano($primalac) {
		$db = Database::getInstance();
		$query = "UPDATE poruke SET procitana = '1' WHERE primalac = :p";
		$params = [
			':p' => $primalac
		];
		$db->UPDATE('Poruka', $query, $params);
	}
		
	public static function obrisiPoruku($id) {
		$db = Database::getInstance();
		$query = 'DELETE FROM poruke WHERE id = :id';
		$params = [
			':id' => $id
		];
		$db->delete($query, $params);
	}
}