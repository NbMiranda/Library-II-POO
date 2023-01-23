<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>oops!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/app.css">
    <link rel="shortcut icon" href="/assets/imgs/library.png" type="image/x-icon">
</head>

<body>
    <?php include_once "../components/header.php"; ?>
    <div class="container">
        <div class="row" style="margin-top: 18vh;">
            <div class="col-sm-0 col-lg-5 d-none d-lg-block">
                <img src="/assets/imgs/confusednew.png" alt="">
            </div>
            
            <div class="col-sm-0 col-lg-1 col-md-1"></div>

            <div class="col-sm-12 col-md-12 col-lg-6">
                <h1 id="orange-text" style="font-size:3em; margin-top: 1.7em;">OPPS!</h1>
                <p style="font-size: 1.7em;">
                    Opps, parece que você não tem acesso a essa pagina
                    <span id="orange-text">(-_-)</span>, ou não está logado
                    ainda, faça o <a href="/frontend/page/login">login</a> para ter acesso a todo o nosso conteudo,
                    caso não tenha um registro <a href="/frontend/page/register">registre-se</a> agora.   
                </p>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</body>

</html>