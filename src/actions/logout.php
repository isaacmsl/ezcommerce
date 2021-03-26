<?php

session_start();

$usuario = $_SESSION["usuario"];

if (isset($usuario)) {
    unset($_SESSION["usuario"]);
    unset($_SESSION["carrinho"]);
    header("Location: ../../");
}