<?php

session_start();

$usuario = $_SESSION["usuario"];

if (isset($usuario)) {
    unset($_SESSION["usuario"]);
    header("Location: ../../");
}