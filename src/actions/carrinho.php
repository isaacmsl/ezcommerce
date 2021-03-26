<?php

require_once dirname(__FILE__).'/../../vendor/autoload.php';
require_once dirname(__FILE__).'/../utils/getCarrinhoUnserialize.php';

if (!isset($_SESSION['usuario'])) {
    session_start();
}

$idProduto = $_REQUEST['id'];
$carrinho = getCarrinhoUnserialize();

$jaColocouProduto = isset($carrinho[$idProduto]);

if (isset($idProduto) && !$jaColocouProduto) {
    $produtoDAO = new ProdutoDAO();
    $p = $produtoDAO->listarPorId($idProduto);

    $carrinho[$p->getId()] = $p;

    $carrinhoSerializado = serialize($carrinho);

    $_SESSION["carrinho"] = $carrinhoSerializado;
}

header("Location: ../../");

