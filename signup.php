<?php
if (@$_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
    require_once './classes/User.class.php';
    $user = new User();
    $nameError = $loginError = $emailError = $passwordError = $captchaError = '';
    $result = $user->validateUser($_POST['login'], $_POST['username'], $_POST['password'], $_POST['password_re'], $_POST['email']);
    if ($result) {
        $response = [
            "status" => false,
            "message" => "Проверьте правильность полей",
            "fields" => $result
        ];
        echo json_encode($response);
        die();
    } else {
        $user->regUser();
        $response = [
            "status" => true,
            "message" => "Регистрация прошла успешно",
        ];
        echo json_encode($response);
    }
} else {
    echo 'это не ajax запрос';
}
