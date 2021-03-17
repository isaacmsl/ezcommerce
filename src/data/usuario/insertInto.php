<?php 

require_once dirname(__FILE__).'/../../../vendor/autoload.php';

use Sqlite\SQLiteConnection;

$pdo = (new SQLiteConnection())->connect();

if($pdo != null) {
    echo $pdo->exec("
        INSERT INTO usuarios (nome, email, senha, saldo)
        VALUES(\"Paulo\",\"vitorlimaborges@gmail.com\", \"123\", 30.0)
    ");
} else {
    echo "Achei dificil conectar! ;-;";
}    