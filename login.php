<?php
    require_once dirname(__FILE__) . "/src/utils/handleAuth.php";
    handleAuth(false, "index.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezcommerce - Login</title>

    <!-- STYLES -->
    <link rel="stylesheet" href="/styles/global.css">
    <link rel="stylesheet" href="/styles/form/form.css">
    <link rel="stylesheet" href="/styles/span/span.css">
</head>
<body class="form__background__image">
    <main class="form__background">
        <form 
            class="form"
            action="/src/actions/login.php"
            method="POST"
        >
            <?php 
                if (isset($_SESSION["error"])) {
            ?>
                <span class="span--error"><?= $_SESSION["error"]; ?></span>
            <?php 
                    unset($_SESSION["error"]);
                }
            ?>
            <header class="form__header">
                <img src="/public/logo-ez-gray.svg" alt="Logo da loja">
                <label>Ezcommerce</label>
            </header>
            <h1 class="form__title">Realizar login</h1>
            <div class="form__group">
                <div class="form__input__container">
                    <img src="/public/mail.svg" alt="Ícone de email">
                    <input 
                        name="email"
                        type="email"
                        placeholder="Seu email" 
                        required
                    ></input>
                </div>
                <div class="form__input__container">
                    <img src="/public/lock.svg" alt="Ícone de senha">
                    <input 
                        name="senha"
                        type="password"
                        placeholder="Sua senha" 
                        required
                    ></input>
                </div>
            </div>
            <div class="form__group">
                <button
                    class="form__btn__submit"
                    type="submit"
                >
                    Entrar!
                </button>
                <a 
                    class="form__link__ghost"
                    href="/cadastroPerfil.php"
                >
                    Cadastrar nova conta
                </a>
            <div>
        </form>
    </main>
</body>
</html>