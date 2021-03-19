<?php 

require_once dirname(__FILE__).'/../../../vendor/autoload.php';

use Sqlite\SQLiteConnection;

$conexao = new SQLiteConnection();

$pdo = ($conexao)->connect();

if($pdo != null) {
    echo $pdo->exec('CREATE TABLE usuarios(
        nome VARCHAR(100) NOT NULL,
        email VARCHAR(100) PRIMARY KEY,
        senha VARCHAR(20) NOT NULL,
        saldo DOUBLE
        )'
    );
} else {
    echo "Achei dificil conectar! ;-;";
}    




