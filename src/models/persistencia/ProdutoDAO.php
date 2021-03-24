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
        $produtos = $this->pdo->query("SELECT * FROM produtos")->fetchALL(PDO::FETCH_ASSOC);
        
        foreach($produtos as $index => $produto) {
            $p = new Produto();

            $p->setId($produto["id"]);
            $p->setNome($produto["nome"]);
            $p->setValor($produto["valor"]);
            $p->setEstoque($produto["estoque"]);
            $p->setUrlImg($produto["urlImg"]);
            $p->setQntCurtidas($produto["qntCurtidas"]);
            $p->setEmailUsuario($produto["emailUsuario"]);
            
            $produtos[$index] = $p;
        }

        return $produtos;
    }

    public function listarPorId($id) {
        $produtoArray = $this->pdo->query("SELECT * FROM produtos WHERE id=\"$id\"")->fetchALL(PDO::FETCH_ASSOC)[0];
        $p = new Produto();

        $p->setId($produtoArray['id']);
        $p->setNome($produtoArray['nome']);
        $p->setValor($produtoArray['valor']);
        $p->setEstoque($produtoArray['estoque']);
        $p->setUrlImg($produtoArray['urlImg']);
        $p->setQntCurtidas($produtoArray['qntCurtidas']);
        $p->setEmailUsuario($produtoArray['emailUsuario']);

        return $p;
    }

    public function listarPorEmailUsuario($emailUsuario) {
        $produtos = $this->pdo->query("SELECT * FROM produtos WHERE emailUsuario=\"$emailUsuario\"")->fetchALL(PDO::FETCH_ASSOC);
        
        foreach($produtos as $index => $produto) {
            $p = new Produto();

            $p->setId($produto["id"]);
            $p->setNome($produto["nome"]);
            $p->setValor($produto["valor"]);
            $p->setEstoque($produto["estoque"]);
            $p->setUrlImg($produto["urlImg"]);
            $p->setQntCurtidas($produto["qntCurtidas"]);
            $p->setEmailUsuario($produto["emailUsuario"]);
            
            $produtos[$index] = $p;
        }

        return $produtos;
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