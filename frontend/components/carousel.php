<?php
require_once("../../backend/models/Books.php");

$books = new Books;

$result = $books->readLastNine();
?>
    <!-- Teste -->
<section>
    <h2 class="text-center" style="margin:2em 0 1.5em 0;">Últimos Livros Cadastrados</h2>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            
        </div>
        <div class="carousel-inner text-center">
            <div class="carousel-item active">
                <div class="cards-wrapper">
                    <div class="card">
                        <div class="image-wrapper">
                            <img src="/assets/imgs/BookCover/<?php echo $result[0]->getBookCover() ?>"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" id="orange-text"><b><?php echo $result[0]->getBookName() ?></b></h5>
                            <p class="card-text">
                                <b>Genêros:</b> <?php echo $result[0]->getGenre(), $result[0]->getOtherGenre(); ?>
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image-wrapper">
                        <img src="/assets/imgs/BookCover/<?php echo $result[1]->getBookCover() ?>"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" id="orange-text"><b><?php echo $result[1]->getBookName() ?></b></h5>
                            <p class="card-text">
                                <b>Genêros:</b> <?php echo $result[1]->getGenre(), $result[1]->getOtherGenre(); ?>
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image-wrapper">
                        <img src="/assets/imgs/BookCover/<?php echo $result[2]->getBookCover() ?>"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" id="orange-text"><b><?php echo $result[2]->getBookName() ?></b></h5>
                            <p class="card-text">
                                <b>Genêros:</b> <?php echo $result[2]->getGenre(), $result[2]->getOtherGenre(); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="cards-wrapper">
                    <div class="card">
                        <div class="image-wrapper">
                        <img src="/assets/imgs/BookCover/<?php echo $result[3]->getBookCover() ?>"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" id="orange-text"><b><?php echo $result[3]->getBookName() ?></b></h5>
                            <p class="card-text">
                                <b>Genêros:</b> <?php echo $result[3]->getGenre(), $result[3]->getOtherGenre(); ?>
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image-wrapper">
                        <img src="/assets/imgs/BookCover/<?php echo $result[4]->getBookCover() ?>"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" id="orange-text"><b><?php echo $result[4]->getBookName() ?></b></h5>
                            <p class="card-text">
                                <b>Genêros:</b> <?php echo $result[4]->getGenre(), $result[4]->getOtherGenre(); ?>
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image-wrapper">
                        <img src="/assets/imgs/BookCover/<?php echo $result[5]->getBookCover() ?>"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" id="orange-text"><b><?php echo $result[5]->getBookName() ?></b></h5>
                            <p class="card-text">
                                <b>Genêros:</b> <?php echo $result[5]->getGenre(), $result[5]->getOtherGenre(); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="cards-wrapper">
                    <div class="card">
                        <div class="image-wrapper">
                        <img src="/assets/imgs/BookCover/<?php echo $result[6]->getBookCover() ?>"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" id="orange-text"><b><?php echo $result[6]->getBookName() ?></b></h5>
                            <p class="card-text">
                                <b>Genêros:</b> <?php echo $result[6]->getGenre(), $result[6]->getOtherGenre(); ?>
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image-wrapper">
                        <img src="/assets/imgs/BookCover/<?php echo $result[7]->getBookCover() ?>"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" id="orange-text"><b><?php echo $result[7]->getBookName() ?></b></h5>
                            <p class="card-text">
                                <b>Genêros:</b> <?php echo $result[7]->getGenre(), $result[7]->getOtherGenre(); ?>
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image-wrapper">
                        <img src="/assets/imgs/BookCover/<?php echo $result[8]->getBookCover() ?>"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" id="orange-text"><b><?php echo $result[8]->getBookName() ?></b></h5>
                            <p class="card-text">
                                <b>Genêros:</b> <?php echo $result[0]->getGenre(), $result[0]->getOtherGenre(); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

</section>

<!-- <style>
    .card {
            border: none;
            border-radius: 0;
            box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
            background-color: #141414;
        }

        .carousel-control-prev span,
        .carousel-control-next span {
            /* width: 1.5rem;
            height: 1.5rem; */
        }
        @media screen and (min-width: 577px) {
        .cards-wrapper {
            display: flex;
            background-color: #141414;
        }
        .card {
            margin: 0 0.5em;
            width: calc(100% / 2);
        }
        .image-wrapper {
            height: 30vw;
            margin: 0 auto;
        }
        }
        @media screen and (max-width: 576px) {
        .card:not(:first-child) {
            display: none;
        }
        }

        .image-wrapper img {
            max-width: 100%;
            max-height: 100%;
        }
        .card-body{
            color: white;
            background-color: #141414;
        }
</style> -->