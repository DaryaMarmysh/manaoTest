<?php
require './classes/Json.class.php';
require 'functions.php';

class User
{
    public $db;
    public $username;
    public $login;
    public $password;
    public $email;
    function __construct()
    {
        $this->db = new Json();
    }
    public function validateUser($login, $username, $password, $password_re, $email)
    {

        $nameError = $loginError = $emailError = $passwordError  = $password_reError = '';
        $username = clearString($username);
        $login = clearString($login);
        $email = clearString($email);
        $password = clearString($password);
        $password_re = clearString($password_re);

        //loginvalidate
        if ($login == '') {
            $loginError .= "Заполните поле";
        } else if ((!preg_match('/^.{6,}$/m', $login))) {
            $loginError = "Поле должно содержать минимум 6 символов";
        } else {
            if ($this->db->checkUnique('login',$login)!==false) $loginError .= "Данный логин занят";
        }

        //password validate
        if ($password == '') {
            $passwordError .= "Заполните поле";
        } else if (!preg_match('/(*UTF8)(?=.+[A-zА-я])(?=.+\d)^([A-zА-я0-9]){6,}$/m', $password)) {
            $passwordError = "Поле должно содержать минимум 6 символов , обязательно должно состоять из цифр и букв";
        }
        if ($password_re == '') {
            $password_reError = "Заполните поле";
        } else if ($password_re !== $password) {
            $password_reError = "Пороли не совпадают";
        } else {
            $password = md5($password).'1afa148';
        }

        //email validate
        if ($email == '') {
            $emailError .= "Заполните поле";
        } else if ((!preg_match('/[A-z0-9]+\@[A-z0-9]+\.{1}[A-z0-9]+$/m', $email))) {
            $emailError .= "Некорректный email адрес";
        } else {
            if ($this->db->checkUnique('email',$email)!==false) $emailError .= "Пользователь с данной почтой уже существует";
        }

        //name validate
        if ($username == '') {
            $nameError .= "Заполните поле";
        } else if ((!preg_match('/(*UTF8)^([A-zА-я]){2,}$/m', $username))) {
            $nameError = "Поле должно содержать минимум 2 символа, только буквы";
        }

        if ($nameError . $loginError . $emailError . $passwordError . $password_reError == '') {
            $this->username = $username;
            $this->login = $login;
            $this->email = $email;
            $this->password = $password;
            return [];
        } else {
            return [
                'nameError' => $nameError,
                'loginError' => $loginError,
                'emailError' => $emailError,
                'passwordError' => $passwordError,
                'password_reError' => $password_reError
            ];
        }
    }
    public function regUser()
    {
        $this->db->addUser([
            'login' => $this->login,
            'password' => $this->password,
            'email' =>  $this->email,
            'username' =>   $this->username
        ]);
        
    }
    public function loginUser($login,$password){
        $login = clearString($login);
        $password = clearString($password);
        //login validate
        $userIndex =  $this->db->checkUnique('login', $login);
        
        if ($userIndex !== false) {
           
            $user = $this->db->getUsers()[$userIndex];
            if($user['password']==md5($password).'1afa148'){
                $_SESSION["userName"] = $user['username'];
                setcookie("username", $user['username']);

            }
            else return ['passwordError'=>'Неверный пароль'];
        } else return ['loginError'=> 'Данный логин не зарегистрирован'];
    }
}
