<form class="form" id="loginForm" onSubmit ='return false'>
    <input type="hidden" name="loginForm" value="form">
    <input class="input" name="login" type="text" placeholder="Логин" required value='222222'>
    <span class="error hidden" name="loginError"></span>

    <input class="input" name="password" type="password" placeholder="Пароль" required value='22222q'>
    <span class="error hidden" name="passwordError"></span>


    <input type="submit" class="button" value="Войти" id="submit_btn_log">

</form>

<form action="index.php" method="post" class='reg'>
    <input class="registrate-input" type="submit" value="Зарегистрироваться">
</form>