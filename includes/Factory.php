<?php
if(!defined('DS'))
	define('DS', 'DIRECTORY_SEPARATOR');

class Factory {
	/** @var  array $instance */
	private static $instance = [];
	public static $app_path = __DIR__.DS.'..';

	/**
	 * Metoda automatski ucitava fajlove i vraca novi objekat za zadato ime klase.
	 * Moze vratiti singleton objekat ili potpuno novi objekat
	 * @param string $class
	 * @param bool $singleton
	 * @return mixed|null
	 */
	public static function getInstance($class, $singleton = true) {
		if($singleton === true) {
			if(isset(self::$instance[$class])) {
				return self::$instance[$class];
			}

			self::$instance[$class] = new $class();
			return self::$instance[$class];
		}
		return new $class();
	}
	public static function setInstance($class, $object) {
		self::$instance[$class] = $object;
	}

	/**
     * Automatski ucitava klasu za zadato ime $class.
	 * @param string $class
	 * @param bool $autoload
	 * @return bool vraca true ako uspe, false ako ne uspe.
	 */
	public static function autoload($class, $autoload = true) {
		$paths = [
			'tabele',
			'includes'
		];
		foreach($paths as $path) {
			$file = self::$app_path.DS.$path.DS.$class.'.php';
			if(file_exists($file)) {
				if($autoload)
					require_once $file;
				return true;
			}
		}

		return false;
	}
}