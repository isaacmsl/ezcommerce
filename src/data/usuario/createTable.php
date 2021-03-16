<?php 

require_once dirname(__FILE__).'/../../../vendor/autoload.php';

use Sqlite\SQLiteConnection;

$pdo = (new SQLiteConnection())->connect();

if($pdo != null) {
    echo $pdo->exec("
        CREATE TABLE usuarios(
            nome TEXT NOT NULL,
            email TEXT PRIMARY KEY,
            senha TEXT NOT NULL,
            saldo DOUBLE 
        )
    ");
} else {
    echo "Achei dificil conectar! ;-;";
}    




