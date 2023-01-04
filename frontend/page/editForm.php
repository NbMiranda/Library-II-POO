<?php
session_start();
include_once '../../database/connection.php';
$conn = connect();
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="/assets/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<?php
include_once('../components/header.php');
//sql query
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$sql_edit = $conn->prepare("SELECT * FROM books WHERE id = '$id'");
$sql_edit->execute(array());
$row_sql = $sql_edit->fetchAll();;

//validation
$validation = $conn->prepare("SELECT * FROM books ORDER BY id DESC LIMIT 1; ");
$validation->execute(array());
$row = $validation->fetchAll();

if ($id > $row[0][0]) {
    include_once("../components/error.php");
} else {

}
?>

<body>
    <!-- Edit form -->
    <div class="container">
        <h1 class="text-center" id="orange-text" style="margin:1.4em;">Edite o livro</h1>
        <h2 class='text-center'><i>
                <?php echo ($row_sql[0]['book_name']) ?>
            </i> </h2>
        <form action="../../backend/edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row_sql[0]['id'] ?>">
            <div class="row" id="orange-text">

                <div class="col-6" id="forms">
                    <div class="form-group">
                        <label for="bookName">Nome do Livro</label>
                        <input type="text" class="form-control" value="<?php echo $row_sql[0]['book_name'] ?>"
                            name="bookName" required>
                    </div>
                </div>
                <div class="col-4" id="forms">
                    <div class="form-group">
                        <label for="writer-name">Nome do escritor</label>
                        <select class="form-select" aria-label="Default select example" name="writer-name" required
                            id="writer-name">
                            <option value="">-- Escolha o escritor --</option>
                            <?php
                            $option_result = $conn->prepare("SELECT * FROM writers");
                            $option_result->execute(array());
                            $row_option = $option_result->fetchAll();

                            $i = 0;
                            foreach ($row_option as $row) {
                                $writerName = $row_option[$i][1];
                                $writer_id = $row_option[$i][0];
                                if ($row_sql[0]['writer_id'] === $writer_id) {
                                    echo "<option value='$writer_id' selected>$writerName</option>";
                                }else {
                                    echo "<option value='$writer_id'>$writerName</option>";
                                }
                                
                                $i++;
                            }
                            ?>
                        </select>
                    </div>

                </div>
                <div class="col-2">
                    <br> <br>
                    <a href="writerForm?page=1" class="btn btn-outline-warning"
                     id="writerButton" style="margin-top:-1.2em;">Novo escritor</a>
                </div>
            </div>
            <div class="row" id="orange-text">
                <div class="col-6" id="forms">
                    <div class="form-group">
                        <label for="">Genero</label>
                        <select class="form-select" aria-label="Default select example" name="genre" required>
                            <option value="">-- Escolha o Gênero --</option>
                            <?php 
                            $array = array('Acao e aventura', 'Biografia', 'Drama', 'Ficcao', 'Terror', 'Humor', 'Infantil', 'Romance',);
                            $i = 0;
                            foreach ($array as $row) {
                                $genre = $array[$i];
                                
                                if ($row_sql[0]['genre'] === $genre) {
                                    echo "<option value='$genre' selected>$genre</option>";
                                }else {
                                    echo "<option value='$genre'>$genre</option>";
                                }
                                
                                $i++;
                            }
                            ?>
                        </select>

                    </div>
                </div>
                <div class="col-6" id="forms">
                    <div class="form-group">
                        <label for="otherGenre">Gêneros secundarios</label>
                        <input type="text" minlength="2" maxlength="50" class="form-control" 
                         value="<?php echo $row_sql[0]['other_genre'] ?>" name="otherGenre">
                    </div>
                </div>
            </div>
            
            <div class="row" id="orange-text">
                <div class="form-group col-12" id="forms">
                    <label for="textarea" id="orange-text">Sinopse</label>
                    <textarea class="form-control" name="sinopse" id="textarea" cols="20"
                        rows="6"><?php echo $row_sql[0]['sinopse'] ?></textarea>
                </div>
            </div>
            <!-- edit modal -->
            <div class="row text-center" style="margin: 1.5em;">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </div>
        </form>
    </div>

    <!-- delete modal -->
    <div class="container text-center">
        <div class="row">
            <div class="col-12">
                <form action="../../backend/delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row_sql[0]['id'] ?>">
                    <!-- Button Modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete">
                        Deletar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                        aria-labelledby="deleteLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteLabel">Deletar</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Deseja mesmo deletar o livro?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-danger">Deletar</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>



    <?php
    include_once('../components/footer.php')
        ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
</body>