<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/assets/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="shortcut icon" href="/assets/imgs/library.png" type="image/x-icon">
</head>

<body>
    <?php include_once "../components/header.php"; ?>

    <!-- <div class="container">
        <form class="form-signin" action="/backend/controllers/UserController.php" method="post" id="registerForm">
            <h1 class="h3 mb-3 font-weight-normal text-center" style="margin-top:2.5em;">Cadastre-se</h1>
            <div class="row" id="register" >
                <div class="col-sm-0 col-sm-0 col-md-1 col-lg-2 col-xl-2 col-xxl-2"></div>

                <div class="col-sm-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4" id="testeup1">
                    <label for="inputEmail" class="sr-only" style="margin-top:2em;">Email address</label>
                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required
                        autofocus>
                </div>

                <div class="col-sm-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4" id="testeup2">
                    <label for="inputPassword" class="sr-only" style="margin-top:2em;">Password</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" minlength="6"
                        maxlength="16" required>
                </div>

                <div class="col-sm-0 col-sm-0 col-md-1 col-lg-2 col-xl-2 col-xxl-2"></div>
            </div>
            
            <div class="row" id="register">
                <div class="col-sm-0 col-sm-0 col-md-1 col-lg-2 col-xl-2 col-xxl-2">

                </div>
                <div class="col-sm-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4" id="testedown1">
                    <label for="userName" class="sr-only" style="margin-top:2em;">Nome completo</label>
                    <input type="text" id="userName" class="form-control" placeholder="Sigite seu nome completo"
                        required>
                </div>
                <div class="col-sm-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4" id="testedown2">
                    <label for="phoneNumber" class="sr-only" style="margin-top:2em;">Celular (opcional)</label>
                    <input type="password" id="phoneNumber" name="phoneNumber" class="form-control"
                        placeholder="(xx) xxxxx-xxxx">
                </div>
                <div class="col-sm-0 col-sm-0 col-md-1 col-lg-2 col-xl-2 col-xxl-2">

                </div>
            </div>
            <div class="row text-center">
                <div class="col-12">
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="register" 
                style="margin: 3em 0 5em 0;" >Sign in</button>
                </div>
            </div>
        </form>
        <p class="mt-5 mb-3 text-muted text-center" style="font-size: 1.4em;">&copy; Copyright 2023 | VirtualLibrary</p>

    </div> -->
    <div class="container" id="orange-text" style="margin-top: 6em;">
        <form class="form-signin" action="/backend/controllers/UserController.php" method="post" id="loginForm">
            <!-- <h1 class="h3 mb-3 font-weight-normal text-center" style="margin-top:2.5em;">Login</h1> -->
            <div class="row" id="login">

                <div class="col-sm-0  col-lg-5 d-none d-lg-block">
                    <img src="/assets/imgs/study.png" alt="">
                </div>

                <div class="col-sm-0 col-lg-1 col-md-1"></div>

                <div class="col-sm-12 col-md-12 col-lg-6">
                    <h1 class="text-center">Cadastre-se</h1>
                    <label for="userName" class="sr-only" style="margin-top:1em;">Nome Completo</label>
                    <input type="text" id="userName" class="form-control" placeholder="Digite seu nome completo"
                        required>

                    <label for="inputEmail" class="sr-only" style="margin-top:1em;">Email</label>
                    <input type="email" id="inputEmail" class="form-control" placeholder="Digite o endereço de email" required
                        autofocus>

                    <label for="inputPassword" class="sr-only" style="margin-top:1em;">Senha</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Digite uma senha" minlength="6"
                        maxlength="16" required>
                    
                    <label for="phoneNumber" class="sr-only" style="margin-top:1em;">Celular (opcional)</label>
                    <input type="text" id="phoneNumber" class="form-control" placeholder="(xx) xxxxx-xxxx"
                        required>

                    <button class="btn btn-lg btn-outline-warning btn-block" style="margin-top: 2em;" 
                    name="register" id="writerButton" type="submit">Sign in</button>
                    
                </div>
                
            </div>
        </form>
        <!-- <p class="text-muted text-center" style="margin-top: 1.3em; font-size: 1.4em;">&copy; Copyright 2023 | VirtualLibrary</p> -->
        <!-- <p class="mt-5 mb-3 text-muted text-center">&copy; Copyright 2023 | VirtualLibrary</p> -->

    </div>
    <style>
        /* #testeup1, #testeup2, #testedown1,#testedown2{
            border: 3px solid orange;
            border-radius: 10px;
            padding: 0 1em 0 1em;
        }
        #testeup2,#testedown2{
            border-left: none;
        }
        #testeup1,#testedown1{
            border-right: none;
        }
        #testeup1, #testeup2{
            border-bottom: none;
        }
        #testedown1, #testedown2{
            border-top: none;
            padding-bottom: 1em;
        } */
        /* #register {
            border: 3px solid orange;
            width: 70%;
            margin-left: 15%;
            margin-top: 1em;
            height: 40em;
            justify-content: center;

        }
        #registerForm {
            width: 30em !important;
            margin: auto;
            justify-content: center;
            
        } */
    </style>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript" src="/src/app.js"></script>
</body>

</html>