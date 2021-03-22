<?php

class Produto {
    private $id;
    private $nome;
    private $valor;
    private $estoque;
    private $urlImg;
    private $qntCurtidas;
    private $emailUsuario;

    public function getId(){
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    
    public function getValor() {
        return $this->valor;
    }
    public function setValor($valor) {
        $this->valor = $valor;
    }
    
    public function getEstoque() {
        return $this->estoque;
    }
    public function setEstoque($estoque) {
        $this->estoque = $estoque;
    }
    
    public function getUrlImg() {
        return $this->urlImg;
    }
    public function setUrlImg($urlImg) {
        $this->urlImg = $urlImg;
    }

    public function getQntCurtidas() {
        return $this->qntCurtidas;
    }
    public function setQntCurtidas($qntCurtidas) {
        $this->qntCurtidas = $qntCurtidas;
    }

    public function getEmailUsuario() {
        return $this->emailUsuario;
    }
    public function setEmailUsuario($emailUsuario) {
        $this->emailUsuario = $emailUsuario;
    }
}



// $p = new Produto();

// $p->setId(4);
// $p->setNome("lalalalala");
// $p->setEstoque(2);
// $p->setValor(33.2);
// $p->setUrlImg("Douglas lindo");
// $p->setQntCurtidas(33);
// $p->setEmailUsuario("vitorlimaborges@gmail.com");

//  print_r($p->listarPorId());