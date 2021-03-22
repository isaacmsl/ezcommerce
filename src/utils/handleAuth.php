<?php

function handleAuth(bool $expected, string $locationFailed) {
    session_start();
    $usuario = $_SESSION["usuario"];
    
    $expectedNotPass = $expected && !isset($usuario) || !$expected && isset($usuario);

    if ($expectedNotPass) {
        header("Location: ../../" . $locationFailed);
    }
}
    