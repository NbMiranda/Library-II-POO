<?php
session_start();
require_once "../models/Users.php";
require_once "../../database/UserConnect.php";
// require_once "";
$user = new User();

$postResult = filter_input_array(INPUT_POST);

if (isset($_POST['login'])){
    $user->setEmail($postResult['email']);
    $user->setUSerPassword($postResult['password']);

    $result = $user->read();
    
    if ($result) {
        $_SESSION['logged'] = true ;
        header("Location: ../../frontend/page/cadastros?page=1");
        die();
    }else {
        $_SESSION['message'] = "<span style='color: red;'>Erro! usuario ou senha invalida<br></span>";
        header("Location: ../../frontend/page/login");
        die();
    }    
}
else if (isset($_POST['register'])){
    $user->setUserName($postResult['userName']);
    $user->setEmail($postResult['email']);
    $user->setUserPassword($postResult['password']);
    $user->setPhoneNumber($postResult['phoneNumber']);
    $user->create($user);
    
    header("Location: ../../frontend/page/login");
    die();
}
else if (isset($_POST['logout'])) {
    unset($_SESSION['logged']);
    header("Location: ../../frontend/page/login");
    die();
}
else {
   
}