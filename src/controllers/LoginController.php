<?php 

require_once dirname(__FILE__).'/../../vendor/autoload.php';

class LoginController {
    public function index($params) {
        $email = $params['email'];
        $senha = $params['senha'];
        
        $u = new Usuario();
        $u->setEmail($email);
         
        $usuarioMatch = $u->listarPorEmail();

        session_start();

        if (!empty($usuarioMatch)) {
            if ($usuarioMatch['senha'] == $senha) {
                $usuarioLogado = new Usuario();

                $usuarioLogado->setNome($usuarioMatch["nome"]);
                $usuarioLogado->setEmail($usuarioMatch["email"]);
                $usuarioLogado->setSenha($usuarioMatch["senha"]);
                $usuarioLogado->setSaldo($usuarioMatch["saldo"]);
                
                //$usuarioSerializado = serialize($usuarioLogado);
                
                $_SESSION["usuario"] = "isaac";
                header("Location: ../../");
            } else {
                $_SESSION["error"] = "Email e/ou senha incorretos";                 
                header("Location: ../../login.php");
            }
        } else {
 
            $_SESSION["error"] = "Email e/ou senha incorretos";           
            header("Location: ../../login.php");
        }
    }
}
