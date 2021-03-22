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
    <title>Ezcommerce - Alterar Senha</title>

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
            <h1 class="form__title">Alterar Senha</h1>
            <div class="form__group">
                <div class="form__input__container">
                    <img src="/public/lock.svg" alt="Ícone de senha">
                    <input 
                        name="novaSenha"
                        type="password"
                        minlength="8"
                        placeholder="Nova senha"
                        required
                    ></input>
                </div>
                <div class="form__input__container">
                    <img src="/public/lock.svg" alt="Ícone de senha">
                    <input 
                        name="novaSenhaConfirmacao"
                        type="password"
                        minlength="8"
                        placeholder="Confirme sua nova senha"
                        required
                    ></input>
                    <img
                        class="btnMostrarSenhas" 
                        src="/public/eye-off.svg" 
                        alt="Ícone de olho"
                    >
                </div>
            </div>
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
            </div>
            <div class="form__group">
                <button
                    class="form__btn__submit"
                    type="submit"
                >
                    Alterar!
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