<?php
namespace Sqlite;

/**
 * SQLite connnection
 */
class SQLiteConnection {
    /**
     * PDO instance
     * @var type 
     */
    private $pdo;
    private $isTest = false;
    /**
     * return in instance of the PDO object that connects to the SQLite database
     * @return \PDO
     */
    public function useTestDatabase() {
        $this->isTest = true;
    }
    public function connect() {
        if ($this->pdo == null) {
            $path = $this->isTest ? "bancoTeste.db" : "banco.db";
            $this->pdo = new \PDO("sqlite:" . dirname(__FILE__)."/../$path");
        }
        return $this->pdo;
    }
}