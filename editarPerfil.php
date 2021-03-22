<?php
    require_once dirname(__FILE__) . "/src/utils/handleAuth.php";
    handleAuth(true, "login.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezcommerce - Editar Perfil</title>

    <!-- STYLES -->
    <link rel="stylesheet" href="/styles/global.css">
    <link rel="stylesheet" href="/styles/form/form.css">

    <!-- SCRIPTS -->
    <script src="/public/scripts/btnMostrarSenhas.js" defer></script>
    <script src="/public/scripts/checarSenhas.js" defer></script>
</head>
<body class="form__background__image">
    <main class="form__background">
        <form class="form">
            <header class="form__header">
                <img src="/public/logo-ez-gray.svg" alt="Logo da loja">
                <label>Ezcommerce</label>
            </header>
            <h1 class="form__title">Editar perfil</h1>
            <div class="form__group">
                <div class="form__input__container">
                    <img src="/public/lock.svg" alt="Ícone de senha">
                    <input 
                        name="senhaAtual"
                        type="password"
                        minlength="8"
                        placeholder="Sua senha atual"
                        required
                    ></input>
                    <img
                        class="btnMostrarSenhas" 
                        src="/public/eye-off.svg" 
                        alt="Ícone de olho"
                    >
                </div>
                <div class="form__input__container">
                    <img src="/public/user.svg" alt="Ícone de usuário">
                    <input 
                        name="nomeCompleto"
                        type="type"
                        placeholder="Seu nome completo"
                        value="Rebeca"
                        required
                    ></input>
                </div>
                <div class="form__input__container">
                    <img src="/public/mail.svg" alt="Ícone de email">
                    <input 
                        name="email"
                        type="email"
                        placeholder="Seu email" 
                        value="rebeca@seguros.com"
                        required
                    ></input>
                </div>
            </div>
            <div class="form__group">
                <button
                    class="form__btn__submit"
                    type="submit"
                >
                    Editar!
                </button>
                <a 
                    class="form__link__ghost"
                    href="/"
                >
                    Cancelar
                </a>
            <div>
        </form>
    </main>
</body>
</html>