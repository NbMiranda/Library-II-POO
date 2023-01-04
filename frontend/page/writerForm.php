<?php
session_start();
include_once '../../database/connection.php';
$conn = connect();
include_once '../components/header.php';
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
</head>

<body>
    <!-- register writer Form -->
    <div class="container" id="orange-text">
        <h1 class="text-center" style="margin:1.5em;">Escritores</h1>
        <form action="../../backend/writerRegister.php" method="post">
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
            <button type="submit" class="btn btn-light" style="margin-top:1em;">Cadastrar</button>
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

    <div class="container">
        <div class="row">
            <div class="col-6 text-center" style="font-size: 1.2em;">
                <?php
                //page limitation
                $page_current = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT);
                $page = (!empty($page_current)) ? $page_current : 1;
                $pg_qty = 8;
                $start = ($pg_qty * $page) - $pg_qty;

                // sql select to limit the page
                $stmt = $conn->prepare("SELECT * FROM writers LIMIT $start, $pg_qty");
                $stmt->execute(array());
                $result = $stmt->fetchAll();

                foreach ($result as $row) {
                    $writerName = $row['writer_name'];
                    $id = $row['id'];
                    echo "<p>$writerName</p>";
                }
                ?>
            </div>
            <!-- writer edit form -->
            <div class="col-6">
                <div class="form-group">
                    <form action="../../backend/writerEdit.php" method="post">
                        <label for="writerNameEdit">Nome do escritor</label>
                        <select class="form-select" aria-label="Default select example" name="writerNameEdit"
                            id="writerNameEdit" required>
                            <option value="">-- Escritor que quer editar --</option>
                            <?php
                            $stmt = $conn->prepare("SELECT * FROM writers");
                            $stmt->execute(array());
                            $result = $stmt->fetchAll();

                            foreach ($result as $row) {
                                $writerName = $row['writer_name'];
                                $writer_id = $row['id'];

                                echo "<option value='$writer_id'>$writerName</option>";
                            }
                            ?>
                        </select>

                        <div class="form-group" id="forms">

                            <label for="editWriter" id="forms">Novo Nome do Escritor</label>
                            <input type="text" class="form-control" name="editWriter" id="editWriter"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-top:1em;">Editar</button>
                    </form>
                    <!-- Delete writer form -->
                    <form action="../../backend/writerDelete.php" method="post" style="color: black; margin-top:1em;">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
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
                                        $state = $conn->prepare("SELECT * FROM writers");
                                        $state->execute(array());
                                        $stateResult = $state->fetchAll();

                                        foreach ($stateResult as $rowState) {
                                            $writerName = $rowState['writer_name'];
                                            $idWriter = $rowState['id'];

                                            echo "<option value='$idWriter'>$writerName</option>";
                                        }
                                        ?>
                                    </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Deletar</button>
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
                    $count = $conn->query("SELECT count(*) FROM writers")->fetchColumn();
                    $i = 1;
                    while ($count > 0) {
                        if ($page_current == $i) {
                            echo "<span id='page-nav'><a href='writerForm?page=$i'>$i</a></span> ";
                            
                        } else {
                            echo "<a href='writerForm?page=$i'>$i</a> ";
                            
                        }
                        $count = $count - 8;
                        $i++;
                    }
                    if ($page_current >= $i) {
                        include_once '../components/error.php';
                    }
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