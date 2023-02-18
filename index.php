<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Регистрация</title>
    <meta content='HTML5 Template Design' name='description' />
    <meta content='width=device-width, initial-scale=1' name='viewport' />
    <link rel="stylesheet" href="style/style.css" />

</head>


<body>
    <noscript id="noJS">
        Включите javascript!
    </noscript>

    <?php require 'header.php' ?>
    <main id="main">
        <form id="registrForm" onSubmit='return false'>

            <input type="hidden" name='form_reg' value="form" required>
            <input type="text" name="login" placeholder="Логин" value="<?= @$login; ?>" required>
            <span class="error hidden" name="loginError"></span>

            <input type="password" name="password" placeholder="Пароль" value="<?php echo @$password; ?>" required>
            <span class="error hidden" name="passwordError"></span>

            <input type="password" name="password_re" placeholder="Повторите пароль" value="<?= @$password_re; ?>" required>
            <span class="error hidden" name="password_reError"></span>

            <input type="text" name="email" placeholder="Email" value="<?= @$email; ?>" required>
            <span class="error hidden" name="emailError"></span>

            <input type="text" name="username" placeholder="Имя" value="<?= @$username; ?>" required>
            <span class="error hidden" name="nameError"></span>

            <input type="submit" value="Зарегистрироваться" class="button" id="submit_btn_reg">
        </form>
    </main>
    <?php require 'footer.php' ?>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="ajax.js"></script>
</body>

</html>