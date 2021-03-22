<?php 
require_once dirname(__FILE__).'/../../vendor/autoload.php';


class UsuarioController{
    public function criar($params) {
        $u = new Usuario();

        $u->setNome($params['nomeCompleto']);
        $u->setSenha($params['senha']);
        $u->setEmail($params['email']);
        $u->setSaldo(0.0);
        
        return $u->cadastrar();
    }
    public function remover($params) {
        $u = new Usuario();
        $u->setEmail($params['email']);
        return $u->remover();
    }
    public function alterar($params) {
        $u = new Usuario();

        $u->setNome($params['nomeCompleto']);
        $u->setSenha($params['senha']);
        $u->setEmail($params['email']);
        $u->setSaldo($params['saldo']);

        return $u->alterar();
    }
    
    public function listarTodos($params) {
        $u = new Usuario();
        return $u->listarTodos();
    }

    public function listarPorEmail($params) {
        $u = new Usuario();
        $u->setEmail($params['email']);
        return $u->listarPorEmail();
    }
}

