<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css" type="text/css">
    <title>Авторизация</title>
</head>
<?php
require './classes/User.class.php';

if (isset($_POST['exit_form'])) {
    session_unset();
}

if (isset($_POST['form'])) {
    $loginError =  $passwordError = '';
    $user = new User();
    $result = $user->loginUser($_POST['login'], $_POST['password']);
   if ($result) {
        extract($result);
    } else {
        header("Location: main_page.php");
    }

}
?>
<body>
    <?php require './header.php' ?>

    <main>
        <form action="login.php" method="post" class="form">
            <input type="hidden" name="form" value="form">
            <input class="input" name="login" type="text" placeholder="Логин" required value='111111'>
            <span class="error"><?= @$loginError; ?></span>

            <input class="input" name="password" type="password" placeholder="Пароль" required value='11111q'>
            <span class="error"><?= @$passwordError; ?></span>


            <input type="submit" class="button" value="Войти">

        </form>

        <form action="index.php" method="post" class='reg'>
            <input class="registrate-input" type="submit" value="Зарегистрироваться">
        </form>

        </div>
    </main>

    <?php require 'footer.php' ?>
</body>

</html>