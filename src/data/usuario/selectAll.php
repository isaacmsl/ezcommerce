<?php 

require_once dirname(__FILE__).'/../../../vendor/autoload.php';

use Sqlite\SQLiteConnection;

$pdo = (new SQLiteConnection())->connect();

if($pdo != null) {
    $usuarios = $pdo->query("
        SELECT * FROM usuarios
    ")->fetchALL(PDO::FETCH_ASSOC);

    print_r($usuarios);
} else {
    echo "Achei dificil conectar! ;-;";
}    