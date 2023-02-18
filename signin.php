<?php
session_start();
if (@$_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
    require './classes/User.class.php';

    $loginError =  $passwordError = '';
    $user = new User();
    $result = $user->loginUser($_POST['login'], $_POST['password']);
    if ($result) {
        $response = [
            "status" => false,
            "message" => "Проверьте правильность полей",
            "fields" => $result
        ];
        echo json_encode($response);
        die();
    } else {
        $response = [
            "status" => true,
            "message" => "Авторизация прошла успешно",
        ];
        echo json_encode($response);
    }
}
else{
    echo 'это не ajax запрос';
}
