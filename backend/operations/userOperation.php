<?php
session_start();
include_once("../controllers/UserController.php");

$userController = new UserController();

$postResult = filter_input_array(INPUT_POST);
$userController->setPost($postResult);

if (isset($_POST['login'])) {
    $userController->login();
}
else if (isset($_POST['register'])){
    $userController->register();
}
else if (isset($_POST['logout'])) {
    $userController->logout();
}