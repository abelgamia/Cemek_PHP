<?php
namespace php\model;

use PDO;
use PDOException;
use php\config\Config;
/**
 *
 * @author Edi
 *
 */
class Model {
	public $conn; // Uchwyt połączenia z bazą danych
	/**
	 */
	public function __construct() {
		try {
			$this->conn = new PDO('mysql:host='.Config::$config['DB_HOST'].';dbname='.Config::$config['DB_NAME'].';charset=utf8',Config::$config['DB_USER'],Config::$config['DB_PASS']);
		}
		catch(PDOException $e) {
			echo $e->getMessage();
			exit();
		}
	}
}
