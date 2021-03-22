<?php

require_once dirname(__FILE__)."/persistencia/UsuarioDAO.php";

class Usuario {
    private $nome;
    private $senha;
    private $email;
    private $saldo;
    private $usuarioDAO;

    public function __construct() {
        $this->usuarioDAO = new UsuarioDAO($isTest=false);
    }

    public function cadastrar() {
        return $this->usuarioDAO->cadastrar($this);
    }

    public function remover() {
        return $this->usuarioDAO->remover($this->email);
    }

    public function alterar() {
        return $this->usuarioDAO->alterar($this);
    }

    public function listarTodos() {
        return $this->usuarioDAO->listarTodos();
    }

    public function listarPorEmail() {
        return $this->usuarioDAO->listarPorEmail($this->email);
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    
    public function getSenha() {
        return $this->senha;
    }
    public function setSenha($senha) {
        $this->senha = $senha;
    }
    
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function getSaldo() {
        return $this->saldo;
    }
    public function setSaldo($saldo) {
        $this->saldo = $saldo;
    }
}