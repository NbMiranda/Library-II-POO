<?php
if ($_SESSION['logged']) {

    $_SESSION['btn'] = "<button class='nav-item btn btn-link' type='submit' name='logout'
    style='margin-left:-14px text-; color: orange; text-decoration: none;'>Exit
    <svg xmlns='http://www.w3.org/2000/svg' width='20' height='19' fill='currentColor' class='bi bi-box-arrow-left' viewBox='0 0 16 16'>
      <path fill-rule='evenodd' d='M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z'/>
      <path fill-rule='evenodd' d='M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z'/>
    </svg> </button>";
    
}else {
     $_SESSION['btn'] = "<a href='/frontend/page/login' class='nav-item'>
     <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-box-arrow-in-right' viewBox='0 0 16 16'>
        <path fill-rule='evenodd' d='M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z'/>
        <path fill-rule='evenodd' d='M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z'/>
    </svg> Login</a>";

}
?>
<header id="nav">
    
    <nav class="navbar navbar-expand-lg navbar sticky-top " style="background-color: #141414;" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="/index">
                <img src="/assets/imgs/library.png" style="margin-bottom: 11px; margin-right: .8em;" alt="Bootstrap" width="30" height="25">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" style="border: none;" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span id="navicon"><img src="/assets/imgs/menu-4-32.ico" alt=""></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"><span id="orange-text">Menu</span></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="navbar-brand" href="/index">
                                Biblioteca
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="navbar-brand" href="/frontend/page/livros"
                            style="margin-right: 1em;">Livros</a>
                        </li>

                        <li class="nav-item">
                            <a class="navbar-brand" href="/frontend/page/cadastros?page=1"
                            style="margin-right: 1em;">Cadastros</a>
                        </li>

                        <li class="nav-item">
                            <a class="navbar-brand" href="/frontend/page/writerForm?page=1"
                            style="margin-right: 1em;">Escritores</a>
                        </li>
                    </ul>
                    <!-- Login/Logout -->
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

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