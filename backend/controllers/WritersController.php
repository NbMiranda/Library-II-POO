<?php
session_start();
require_once("../../database/Connect.php");
require_once("../models/Writers.php");

$writers = new Writers();

$postResult = filter_input_array(INPUT_POST);

if(isset($_POST['register'])){

    $writers->setWriterName($postResult['writerName']);
    $writers->create($writers);

    $_SESSION['msg'] = "<p id='book_success'>Escritor cadastrado com sucesso</p>";
    header("Location: ../../frontend/page/writerForm?page=1");
    die();
} 
elseif (isset($_POST['edit'])) {
    $writers->setId($postResult['writerEditId']);
    $writers->setWriterName($postResult['editWriter']);
    $writers->update($writers);

    $_SESSION['msg'] = "<p id='book_success'>Escritor editado com sucesso</p>";
    header("Location: ../../frontend/page/writerForm?page=1");
    die();
}
elseif (isset($_POST['delete'])) {
    $writers->setId($postResult['writerNameDel']);
    $writers->delete($writers);

    $_SESSION['msg'] = "<p id='book_success'>Escritor deletado com sucesso</p>";
    header("Location: ../../frontend/page/writerForm?page=1");
    die();
}