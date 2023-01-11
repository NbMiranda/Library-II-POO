<?php
session_start();

include_once '../../database/Connect.php';
include_once "../../backend/models/Writers.php";
include_once "../../backend/WritersQuery.php";

$writers = new Writers();
$writersQuery = new WritersQuery();

$writersQuery->setPage(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escritores</title>
    <link rel="stylesheet" href="/assets/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="shortcut icon" href="/assets/imgs/library.png" type="image/x-icon">
</head>

<body>
    <?php include '../components/header.php';?>
    <!-- writer register writer Form -->
    <div class="container" id="orange-text">
        <h1 class="text-center" style="margin:1.5em;">Escritores</h1>
        <form action="../../backend/controllers/WritersController.php" method="post">
            <div class="form-group" id="forms">
                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
                <h2>Cadastrar Escritor</h2>
                <label for="writerName" id="forms" style="color:#fff;">Nome do Escritor</label>
                <input type="text" class="form-control" name="writerName" id="writerName" required>
            </div>
            <button type="submit" class="btn btn-light" name="register" style="margin-top:1em;">Cadastrar</button>
        </form>
    </div>

    <div class="container text-center">
        <div class="row">
            <div class="col-6">
                <h3 id="orange-text" style="margin: 1.3em 0 1.3em 0 ;">Escritores já cadastrados</h3>
            </div>
            <div class="col-6">
                <h3 id="orange-text" style="margin: 1.3em 0 1.3em 0 ;">Editar escritor</h3>
            </div>
        </div>
    </div>

<!-- select writers output -->
    <div class="container">
        <div class="row">
            <div class="col-6 text-center" style="font-size: 1.2em;">
                <?php
                foreach ($writersQuery->readLimit() as $row) {
                    $writerName = $row->getWriterName();
                    $id = $row->getId();
                    echo "<p>$writerName</p>";
                }
                ?>
            </div>
            <!-- writer edit form -->
            <div class="col-6">
                <div class="form-group">
                    <form action="../../backend/controllers/WritersController.php" method="post">
                        <label for="writerNameEdit">Nome do escritor</label>
                        <select class="form-select" aria-label="Default select example" name="writerEditId"
                            id="writerEditId" required>
                            <option value="">-- Escritor que quer editar --</option>
                            <?php
                            foreach ($writersQuery->read() as $row) {
                                $writerName = $row->getWriterName();
                                $writer_id = $row->getId();

                                echo "<option value='$writer_id'>$writerName</option>";
                            }
                            ?>
                        </select>

                        <div class="form-group" id="forms">
                            <label for="editWriter" id="forms">Novo Nome do Escritor</label>
                            <input type="text" class="form-control" name="editWriter" id="editWriter"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="edit" style="margin-top:1em;">Editar</button>
                    </form>
                    <!-- Delete writer form -->
                    <form action="../../backend/controllers/WritersController.php" method="post" style="color: black; margin-top:1em;">
                        <!-- Button trigger modal -->
                        <button type="button" name="delete" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Deletar
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <select class="form-select" aria-label="Default select example" name="writerNameDel"
                                        id="writerNameDel" required>
                                        <option value="">-- Escritor que quer deletar --</option>
                                        <?php
                                        foreach ($writersQuery->read() as $row) {
                                            $writerName = $row->getWriterName();
                                            $idWriter = $row->getId();

                                            echo "<option value='$idWriter'>$writerName</option>";
                                        }
                                        ?>
                                    </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="delete" class="btn btn-danger">Deletar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- pagination -->
    <div class="container text-center">
        <div class="row">
            <div class="col-6">
                <div style="font-size: 1.4em;">
                    <?php
                    $writersQuery->pageNav();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once '../components/footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
</body>