<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Регистрация</title>
    <meta content='HTML5 Template Design' name='description' />
    <meta content='width=device-width, initial-scale=1' name='viewport' />
    <link rel="stylesheet" href="style/style.css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="ajax.js"></script>
</head>
<?php
require_once './classes/User.class.php';

if (isset($_POST['form'])) {

    $user = new User();
    $nameError = $loginError = $emailError = $passwordError = $captchaError = '';
    $result = $user->validateUser($_POST['login'], $_POST['username'], $_POST['password'], $_POST['password_re'], $_POST['email']);
    if ($result) {
        extract($result);
    } else {
        $user->regUser();
        print "<script language='Javascript' type='text/javascript'>
                    alert('Вы успешно зарегистрировались! Спасибо!');
                    </script>";
        header("Location: login.php");
    }
}
?>

<body>

    <?php require 'header.php' ?>
    <main>
        <form action='' method="post" id="registrForm">

            <input type="hidden" name='form' value="form" required>
            <input type="text" name="login" placeholder="Логин" value="<?= @$login; ?>" required>
            <span class="error"><?= @$loginError; ?></span>

            <input type="password" name="password" placeholder="Пароль" value="<?php echo @$password; ?>" required>
            <span class="error"><?= @$passwordError; ?></span>

            <input type="password" name="password_re" placeholder="Повторите пароль" value="<?= @$password_re; ?>" required>
            <span class="error"><?= @$password_reError; ?></span>

            <input type="text" name="email" placeholder="Email" value="<?= @$email; ?>" required>
            <span class="error"><?= @$emailError; ?></span>

            <input type="text" name="username" placeholder="Имя" value="<?= @$username; ?>" required>
            <span class="error"><?= @$nameError; ?></span>

            <input type="submit" value="Зарегистрироваться" class="button" id="submit_btn">
        </form>
    </main>
    <?php require 'footer.php' ?>
</body>

</html>