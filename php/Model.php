<?php
namespace php;

use PDO;
use PDOException;

/**
 *
 * @author Edi
 *        
 */
abstract class Model
{
    protected $conn;                       // Uchwyt połączenia z bazą danych
    protected $config = array(             // Tablica konfiguracji połączenia
        'host'     => 'localhost',
        'user'     => 'root',
        'password' => '',
        'database' => 'cemek'
        // 'host'     => 'sql.5v.pl',
        // 'user'     => 'db-user45519',
        // 'password' => 'becederia1',
        // 'database' => 'db-user45519'
    );
    /**
     * Konstruktor klasy Baza
     */
    function __construct()
    {
        try {
            $this->conn = new PDO('mysql:host='.$this->config['host'].';dbname='.$this->config['database'].';charset=utf8',
                $this->config['user'], $this->config['password']);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }
}

