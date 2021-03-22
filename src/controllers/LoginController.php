<?php 

require_once dirname(__FILE__).'/../../vendor/autoload.php';

class LoginController {
    public function index($params) {
        $email = $params['email'];
        $senha = $params['senha'];
        $u = new Usuario();
        
        $u->setEmail($email);
        
        $usuarioMatch = $u->listarPorEmail();

        if (!empty($usuarioMatch)) {
            if ($usuarioMatch['senha'] == $senha) {
                // usar session aqui
                header("Location: ../../");
            } else {
                // session error senha incorreta
                header("Location: ../../login.php");
            }
        } else {
            // $_SESSION['error'] = isso ai em baixo
            // session error email e/ou senha incorretos
            header("Location: ../../login.php");
        }
    }
}
