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
    setcookie("username", "", time() - 3600);
}
?>

<body>
    <noscript id="noJS">
        Включите javascript!
    </noscript>
    <?php require './header.php' ?>
    <main>
        <?php require 'forms/log.php' ?>
    </main>
    <?php require 'footer.php' ?>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="ajax.js"></script>
</body>

</html>