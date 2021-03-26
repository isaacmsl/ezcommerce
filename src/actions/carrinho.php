<?php

require_once dirname(__FILE__).'/../../vendor/autoload.php';
require_once dirname(__FILE__).'/../utils/getCarrinhoUnserialize.php';


if (!isset($_SESSION['usuario'])) {
    session_start();
}

$idProduto = $_REQUEST['id'];
$carrinho = getCarrinhoUnserialize();

$jaColocouProduto = isset($carrinho[$idProduto]);
$querRemoverProduto = isset($_REQUEST['acao']) && $_REQUEST['acao'] == 'remover';

if (isset($idProduto) && !$jaColocouProduto) {
    $produtoDAO = new ProdutoDAO();
    $p = $produtoDAO->listarPorId($idProduto);

    $carrinho[$p->getId()] = $p;

    $carrinhoSerializado = serialize($carrinho);

    $_SESSION["carrinho"] = $carrinhoSerializado;
    header("Location: ../../");
} else if (isset($idProduto) && $querRemoverProduto) {
    unset($carrinho[$idProduto]);

    $carrinhoSerializado = serialize($carrinho);

    $_SESSION["carrinho"] = $carrinhoSerializado;
    header("Location: ../../carrinho.php");
} else {
    header("Location: ../../");
}




