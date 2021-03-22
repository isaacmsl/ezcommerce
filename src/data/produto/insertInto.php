<?php 

require_once dirname(__FILE__).'/../../../vendor/autoload.php';

use Sqlite\SQLiteConnection;

$conexao = new SQLiteConnection();

if($pdo != null) {
       echo $pdo->exec("
        INSERT INTO produtos (nome, valor, estoque, urlImg, qntCurtidas, emailUsuario)
        VALUES(\"produtoC\", 30.2, 2, \"link\", 30, \"vitorlimaborges@gmail.com\")
    ")."\n";
} else {
    echo "Achei dificil conectar! ;-;";
}    
