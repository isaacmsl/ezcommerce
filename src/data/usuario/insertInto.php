<?php 

require_once dirname(__FILE__).'/../../../vendor/autoload.php';

use Sqlite\SQLiteConnection;

$pdo = (new SQLiteConnection())->connect();

if($pdo != null) {
    echo $pdo->exec("
        INSERT INTO usuario VALUES(nome, email, senha, saldo) 
    ");
} else {
    echo "Achei dificil conectar! ;-;";
}    