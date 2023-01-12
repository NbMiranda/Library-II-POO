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
    // print_r($result[0]['user_password']);
    if ($result) {
        header("Location: ../../frontend/page/cadastros?page=1");
    }else {
        $_SESSION['message'] = "<span style='color: red;'>Erro! usuario ou senha invalida<br></span>";
        header("Location: ../../frontend/page/login");
    }    
}
else if (isset($_POST['register'])){
    $user->setUserName($postResult['userName']);
    $user->setEmail($postResult['email']);
    $user->setUserPassword($postResult['password']);
    $user->setPhoneNumber($postResult['phoneNumber']);
    $user->create($user);
    
    header("Location: ../../frontend/page/login");
}
else {
    header("Location: ../../frontend/page/register");
}