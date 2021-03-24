<?php 

require_once dirname(__FILE__).'/../../../vendor/autoload.php';

use Sqlite\SQLiteConnection;

$conexao = new SQLiteConnection();

$pdo = ($conexao)->connect();

if($pdo != null) {
    
    echo $pdo->exec('CREATE TABLE produtos(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome VARCHAR(150) NOT NULL,
        valor DOUBLE NOT NULL,
        estoque INTEGER NOT NULL,
        urlImg TEXT,
        qntCurtidas INTEGER NOT NULL,
        emailUsuario VARCHAR(100) NOT NULL,
        CONSTRAINT fk_usuarioProduto 
        FOREIGN KEY (emailUsuario) REFERENCES usuarios(email)
        ON DELETE CASCADE
        ON UPDATE CASCADE
        )'
    )."\n";

} else {
    echo "Achei dificil conectar! ;-;";
}    
