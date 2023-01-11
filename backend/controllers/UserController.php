<?php
require_once "../models/User.php";
// require_once "";
$user = new User();

$postResult = filter_input_array(INPUT_POST);

if (isset($_POST['login'])){
    $user->setEmail($postResult['email']);
    $user->setUSerPassword($postResult['password']);
    
}
if (isset($_POST['register'])){
    $user->setUserName($postResult['userName']);
    $user->setEmail($postResult['email']);
    $user->setUSerPassword($postResult['password']);
    $user->setPhoneNumber($postResult['phoneNumber']);
    $user->create();
    
}