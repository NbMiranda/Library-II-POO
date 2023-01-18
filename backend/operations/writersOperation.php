<?php
include_once("../controllers/WritersController.php");

$writersController = new WritersController();

$writersController->setPost(filter_input_array(INPUT_POST));

if(isset($_POST['register'])){
    $writersController->register();
} 
elseif (isset($_POST['edit'])) {
    $writersController->edit();
}
elseif (isset($_POST['delete'])) {
    $writersController->delete();
}