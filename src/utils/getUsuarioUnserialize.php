<?php

require_once dirname(__FILE__) . "/../models/Usuario.php";

function getUsuarioUnserialize(): Usuario | bool {
    session_start();

    $usuario = $_SESSION["usuario"];
    
    if (isset($usuario)) {
        return unserialize($usuario);
    }
    
    return false;
}

