<?php 

require_once dirname(__FILE__).'/../../../vendor/autoload.php';

use Sqlite\SQLiteConnection;

$conexao = new SQLiteConnection();
$pdo = ($conexao)->connect();

if($pdo != null) {
       echo $pdo->exec("
        UPDATE usuarios SET email=\"vitor@gmail.com\" WHERE email=\"vitorlimaborges@gmail.com\"
    ")."\n";
} else {
    echo "Achei dificil conectar! ;-;";
}    
