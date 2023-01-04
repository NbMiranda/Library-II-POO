<?php
//editing writers from writer table 
session_start();
include('../database/connection.php');
$conn =connect();

$editWriter = filter_input(INPUT_POST, 'editWriter', FILTER_SANITIZE_STRING);
$writerNameEdit = filter_input(INPUT_POST, 'writerNameEdit', FILTER_SANITIZE_STRING);

$sql = $conn->prepare("UPDATE writers SET writer_name='$editWriter' WHERE id='$writerNameEdit'");

$sql->execute();

if($sql){
    $_SESSION['msg'] = "<p id='book_success'>Escritor editado com sucesso</p>";
    header("Location: ../frontend/page/writerForm?page=1");
 }else{
    $_SESSION['msg'] = "<p>Erro!! escritor não foi cadastrado</p>";
    header("Location: ../frontend/page/writerForm?page=1");
 }
?>
