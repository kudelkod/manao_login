<?php

require('src/Controllers/Controller.php');
$c = new Controller();
if (empty($_POST)){
    if (!empty($_GET)){
        setcookie('login', '', time() - 3600);
        setcookie('password', '', time() - 3600);
    }
    header('Location: http://manao.loc/resources/views/login.php');
}
elseif(count($_POST) <= 2){
    $salt = 'qwerty';
    $password = md5($_POST['password'].$salt);
    $result = $c->loginUser($_POST['login'], $password);

    if($result === true){
        $user = $c->getUser($_POST['login']);
        session_start();
        $_SESSION['login'] = $user->login;
        $_SESSION['password'] = $user->password;
        $_SESSION['user_name'] = $user->name;
        setcookie('login', $_SESSION['login'], time() + 300);
        setcookie('password', $password, time() + 300);

        echo json_encode(array('success' => 1));
    }
    else{
        echo json_encode(array('success' => 0));
    }
}
elseif(count($_POST) > 2){
    $result = $c->registerUser($_POST);

    if ($result === true){
        echo json_encode(array('success' => 1));
    }
    else{
        echo json_encode($result);

    }

}

