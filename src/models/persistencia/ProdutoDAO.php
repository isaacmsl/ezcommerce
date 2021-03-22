<?php

require_once dirname(__FILE__).'/../../../vendor/autoload.php';
require_once dirname(__FILE__).'/../Produto.php';

use Sqlite\SQLiteConnection;

class ProdutoDAO {
    private $pdo;

    public function __construct($isTest=false) {
        $conexao = new SQLiteConnection();
        if($isTest) $conexao->useTestDatabase();
        $this->pdo = ($conexao)->connect();
    }

    public function cadastrar(Produto $p) {
        $nome = $p->getNome();
        $estoque = $p->getEstoque();
        $valor = $p->getValor();
        $urlImg = $p->getUrlImg();
        $qntCurtidas = $p->getQntCurtidas();
        $emailUsuario = $p->getEmailUsuario();


        return $this->pdo->exec("
            INSERT INTO produtos (nome, estoque, valor, urlImg, qntCurtidas, emailUsuario) 
            VALUES (\"$nome\", $estoque, $valor, \"$urlImg\",$qntCurtidas, \"$emailUsuario\")
        ");
    }
    
    public function listarTodos() {
        return $this->pdo->query("SELECT * FROM produtos")->fetchALL(PDO::FETCH_ASSOC);
    }

    public function listarPorId($id) {
        return $this->pdo->query("SELECT * FROM produtos WHERE id=\"$id\"")->fetchALL(PDO::FETCH_ASSOC);
    }

    public function remover($id) {
        return $this->pdo->exec("DELETE FROM produtos WHERE id=\"$id\"");
    }

    public function alterar(Produto $p) {
        $id = $p->getId();
        $nome = $p->getNome();
        $estoque = $p->getEstoque();
        $valor = $p->getValor();
        $urlImg = $p->getUrlImg();
        $qntCurtidas = $p->getQntCurtidas();
        
        return $this->pdo->exec("
            UPDATE produtos
            SET 
                nome = \"$nome\", 
                estoque = \"$estoque\",
                valor = \"$valor\",
                urlImg = \"$urlImg\",
                qntCurtidas = \"$qntCurtidas\"
            WHERE id = \"$id\"
        ");
    }  
}


