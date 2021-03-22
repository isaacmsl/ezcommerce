<?php 
require_once dirname(__FILE__).'/../../vendor/autoload.php';


class UsuarioController{
    private $dao;
    
    public function __construct(){
        $this->$dao = new UsuarioDAO();
    }

    public function criar($params) {
        $u = new Usuario();

        $u->setNome($params['nomeCompleto']);
        $u->setSenha($params['senha']);
        $u->setEmail($params['email']);
        $u->setSaldo(0.0);
        
        return ($this->dao)->cadastrar($u);
    }
    public function remover($params) {
        return ($this->dao)->remover($params['email']);
    }
    public function alterar($params) {
        $u = new Usuario();

        $u->setNome($params['nomeCompleto']);
        $u->setSenha($params['senha']);
        $u->setEmail($params['email']);
        $u->setSaldo($params['saldo']);

        return ($this->dao)->alterar($u);
    }
    
    public function listarTodos($params) {
        return ($this->dao)->listarTodos();
    }

    public function listarPorEmail($params) {
        return ($this->dao)->listarPorEmail($params['email']);
    }
}

