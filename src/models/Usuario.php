<?php

class Usuario {
    private $nome;
    private $senha;
    private $email;
    private $saldo;
    
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