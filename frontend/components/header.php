<?php
if ($_SESSION['logged']) {
    $_SESSION['btn'] = "<button class='nav-item btn btn-link' type='submit' name='logout'
    style='margin-left:-14px; color: orange;'>Logout</button>";
}else {
    $_SESSION['btn'] = "<a href='/frontend/page/login' class='nav-item'>Login</a>";
}
?>
<header id="nav">
    
    <nav class="navbar fixed-top " style="background-color: #141414;" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="/index">
                <img src="/assets/imgs/library.png" style="margin-bottom: 11px;" alt="Bootstrap" width="30" height="25" style="margin">
                <span id="orange-text">Biblioteca</span>
            </a>
            <a class="navbar-brand" href="/frontend/page/writerForm?page=1"><span id="orange-text">Escritores</span></a>
            <a class="navbar-brand" href="/frontend/page/cadastros?page=1"><span id="orange-text">Cadastros</span></a>
            <!-- <a class="navbar-brand" href="#"><span id="orange-text">asd</span></a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" style="border: none;" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span id="navicon"><img src="/assets/imgs/menu-4-32.ico" alt=""></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"><span id="orange-text">Menu</span></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#"><span id="orange-text">Livros</span></a>
                        </li>
                        <li class="nav-item">
                            <form action="/backend/operations/userOperation.php" method="post">
                            <?php
                                if (isset($_SESSION['btn'])) {
                                    echo $_SESSION['btn'];
                                    unset($_SESSION['btn']);
                                }
                            ?>  
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>