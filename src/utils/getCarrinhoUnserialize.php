<?php

require_once dirname(__FILE__) . "/../models/Produto.php";

function getCarrinhoUnserialize(): array | bool {
    if (!isset($_SESSION["usuario"])) {
        session_start();
    }

    $carrinho = $_SESSION["carrinho"];
    
    if (isset($carrinho)) {
        return unserialize($carrinho);
    }
    
    return false;
}

