<?php
session_start();
include_once '../../backend/models/Books.php';
include_once '../../backend/models/Writers.php';

if (!$_SESSION['logged']) {
    header("Location: oops");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/app.css">
    <link rel="shortcut icon" href="/assets/imgs/library.png" type="image/x-icon">
</head>
<?php
include_once('../components/header.php');

$books = new Books();
$writers = new Writers();
$books->setInputPost(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
?>
<body>
    <!-- Edit form -->
    <div class="container">
        <h1 class="text-center" id="orange-text" style="margin:1.4em;">Edite o livro</h1>
        <h2 class='text-center'><i>
                <?php
                $booksResult = $books->readOne();
                echo $booksResult[0]['book_name'];
                ?>
            </i> </h2>
        <form action="../../backend/operations/booksOperation.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="bookEditId" value="<?php echo $booksResult[0]['id'] ?>">
            <div class="row" id="orange-text">

                <div class="col-md-6 col-sm-12" id="forms">
                    <div class="form-group">
                        <label for="bookName">Nome do Livro</label>
                        <input type="text" class="form-control" value="<?php echo $booksResult[0]['book_name'] ?>"
                            name="bookName" required>
                    </div>
                </div>
                <div class="col-md-4 col-sm-8" id="forms">
                    <div class="form-group">
                        <label for="writer-name">Nome do escritor</label>
                        <select class="form-select" aria-label="Default select example" name="writerId" required
                            id="writer-name">
                            <option value="">-- Escolha o escritor --</option>
                            <?php

                            foreach ($writers->read() as $row) {
                                $writerName = $row->getWriterName();
                                $writer_id = $row->getId();
                                if ($booksResult[0]['writer_id'] === $writer_id) {
                                    echo "<option value='$writer_id' selected>$writerName</option>";
                                }else {
                                    echo "<option value='$writer_id'>$writerName</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4">
                    <br> <br>
                    <a href="writerForm?page=1" class="btn btn-outline-warning"
                     id="writerButton" style="margin-top:-1.2em;">Novo escritor</a>
                </div>
            </div>
            <div class="row" id="orange-text">
                <div class="col-md-6 col-sm-12" id="forms">
                    <div class="form-group">
                        <label for="">Genero</label>
                        <select class="form-select" aria-label="Default select example" name="genre" required>
                            <option value="">-- Escolha o Gênero --</option>
                            <?php
                            foreach (Books::genres() as $row) {
                                if ($booksResult[0]['genre'] === $row) {
                                    echo "<option value='$row' selected>$row</option>";
                                }else {
                                    echo "<option value='$row'>$row</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12" id="forms">
                    <div class="form-group">
                        <label for="otherGenre">Gêneros secundarios</label>
                        <input type="text" minlength="2" maxlength="50" class="form-control" 
                         value="<?php echo $booksResult[0]['other_genre'] ?>" name="otherGenre">
                    </div>
                </div>
            </div>
            <div class="row" id="orange-text">
                <div class="form-group col-md-6 col-lg-9 col-sm-12" id="forms">
                    <label for="textarea" id="orange-text">Sinopse</label>
                    <textarea class="form-control" name="sinopse" id="textarea" cols="20"
                        rows="13"><?php echo $booksResult[0]['sinopse'] ?></textarea>
                </div>
                <div class="form-group col-md-6 col-lg-3 col-sm-12" id="forms">
                    <?php
                    $coverUrl = $booksResult[0]['book_cover'];
                    echo " 
                    <div id='bookCoverDisplay' 
                    style='background-image: url(/assets/imgs/BookCover/$coverUrl);
                    margin-top:1.2em;'>
                        
                    </div>";
                    ?>
                    <!-- Edit book cover Modal -->
                    <form action="../../backend/operations/booksOperation.php" method="post" enctype="multipart/form-data">

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-lg btn-outline-warning btn-block" id="writerButton" 
                        data-bs-toggle="modal" data-bs-target="#bookCover" style="margin-top:1em; margin-left:5.3em;">
                            Trocar Capa
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="bookCover" tabindex="-1" aria-labelledby="bookCoverLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="bookCoverLabel">Editar Capa do livro</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <label class="form-label" for="EditFile">Capa do Livro</label>
                                        <input type="file" class="form-control" id="EditFile" name="image" accept="image/*"/>
                                        <div id='Editdisplay' 
                                        style='margin-top:1.6em; margin-left: 6.2em;'>
                                            
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary" name="editBookCover">Editar capa</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!-- <style>
                    #Editdisplay, #bookCoverDisplay{
                        /* background-image: url(/assets/imgs/bookCover.png); */
                        background-position: center;
                        background-size: contain;
                        background-repeat: no-repeat;
                        width: 9.5em;
                        height: 13.4em;
                        /* border: 1px solid #ee9b014f; */
                        border-radius: 10px;
                        margin-left: 2.375em;
                        margin-top: .3em;
                        /* display: inline-flex;
                        flex-direction: row; */
                        /* display: flex;
                        justify-content: center;
                        align-items: center; */
                        
                    }
                    #bookCover{
                        color: #000;
                    }
                </style> -->
            <!-- edit -->
            <div class="row text-center" style="margin: 1.5em;">
                <div class="col-12">
                    <button type="submit" name="edit" class="btn btn-primary">Editar</button>
                </div>
            </div>
        </form>
    </div>
    <!-- delete modal -->
    <div class="container text-center">
        <div class="row">
            <div class="col-12">
                <form action="../../backend/operations/booksOperation.php" method="post">
                <input type="hidden" name="writerId" value="<?php echo $booksResult[0]['id'] ?>">
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
                                    <button type="submit" name="delete" class="btn btn-danger">Deletar</button>
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
    <script type="text/javascript" src="/src/src.js"></script>

</body>