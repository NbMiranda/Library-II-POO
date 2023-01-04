<?php 
//registering writers from writer table
session_start();
include('../database/connection.php');
$conn =connect();

$writerName = filter_input(INPUT_POST, 'writerName', FILTER_SANITIZE_STRING);

$sql = $conn->prepare("INSERT INTO writers (writer_name) VALUES('$writerName');");

$sql->execute();

if($sql){
    $_SESSION['msg'] = "<p id='book_success'>Escritor cadastrado com sucesso</p>";
    header("Location: ../frontend/page/writerForm?page=1");
 }else{
    $_SESSION['msg'] = "<p>Erro!! escritor não foi cadastrado</p>";
    header("Location: ../frontend/page/writerForm?page=1");
 }
?>
