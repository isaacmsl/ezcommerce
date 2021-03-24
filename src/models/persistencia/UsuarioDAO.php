<?php

require_once dirname(__FILE__).'/../../../vendor/autoload.php';
require_once dirname(__FILE__).'/../Usuario.php';

use Sqlite\SQLiteConnection;

class UsuarioDAO {
    private $pdo;

    public function __construct($isTest=false) {
        $conexao = new SQLiteConnection();
        if($isTest) $conexao->useTestDatabase();
        $this->pdo = ($conexao)->connect();
    }

    public function cadastrar(Usuario $u) {
        $nome = $u->getNome();
        $email = $u->getEmail();
        $senha = $u->getSenha();
        $saldo = $u->getSaldo();

        return $this->pdo->exec("
            INSERT INTO usuarios (nome, email, senha, saldo) 
            VALUES (\"$nome\",\"$email\", \"$senha\", $saldo)
        ");
    }
    
    public function listarTodos() {
        return $this->pdo->query("SELECT * FROM usuarios")->fetchALL(PDO::FETCH_ASSOC);
    }

    public function listarPorEmail($email) {
        return $this->pdo->query("SELECT * FROM usuarios WHERE email=\"$email\"")->fetchALL(PDO::FETCH_ASSOC)[0];
    }

    public function remover($email) {
        return $this->pdo->exec("DELETE FROM usuarios WHERE email=\"$email\"");
    }

    public function alterar(Usuario $u, string $emailAntigo) {
        $nome = $u->getNome();
        $email = $u->getEmail();
        $senha = $u->getSenha();
        $saldo = $u->getSaldo();
        
        return $this->pdo->exec("
            UPDATE usuarios
            SET 
                nome = \"$nome\", 
                senha = \"$senha\",
                saldo = \"$saldo\",
                email = \"$email\"
            WHERE email = \"$emailAntigo\"
        ");
    }  
}

/*
$u = new Usuario();

$u->setNome("Paulo Vitor Lima Borges");
$u->setEmail("vitorlimaborges@gmail.com");
$u->setSenha("1234");
$u->setSaldo(120380.0);

$dao = new UsuarioDAO();

print_r($dao->listarTodos());*/