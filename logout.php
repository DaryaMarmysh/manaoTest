<?php
if (@$_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
    unset( $_SESSION["userName"]);
    setcookie("username", "", time() - 3600);
    $response = [
        "status" => true,
        "message" => "Вы вышли из системы",
    ];
    echo json_encode($response);
} else {
    echo 'это не ajax запрос';
}
