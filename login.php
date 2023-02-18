<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css" type="text/css">
    <title>Авторизация</title>
</head>

<body>
    <noscript id="noJS">
        Включите javascript!
    </noscript>
    <?php require 'header.php'; ?>
    <main>
        <form class="form" id="loginForm" onSubmit='return false'>
            <input type="hidden" name="loginForm" value="form">
            <input class="input" name="login" type="text" placeholder="Логин" required >
            <span class="error hidden" name="loginError"></span>

            <input class="input" name="password" type="password" placeholder="Пароль" required >
            <span class="error hidden" name="passwordError"></span>


            <input type="submit" class="button" value="Войти" id="submit_btn_log">

        </form>

        <form action="../index.php" method="post" class='reg'>
            <input class="registrate-input" type="submit" value="Зарегистрироваться">
        </form>
    </main>
    <?php require 'footer.php' ?>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="ajax.js"></script>
</body>

</html>