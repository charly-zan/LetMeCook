<?php
$ingedientes ="";
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="./src/css/style.css">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <!-- Boostratp 4-->
    <link rel="stylesheet" href="/letmecook/libs/bootstrap-4.6.1/css/bootstrap.min.css">
    <!--Fonotawesom-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.24/dist/css/uikit.min.css" />



    <title>LetMeCook</title>
</head>
<header>
    <!--Navbar-->
    <nav
        class="navbar navbar-light navbar-expand-md bg-light justify-content-md-center justify-content-start fixed-top">
        <a class="navbar-brand d-md-none d-inline" href="">Let's Food!</a>
        <button class="navbar-toggler ml-1" type="button" data-toggle="collapse" data-target="#collapsingNavbar2">
            <span class="navbar-toggler-icon"></span>
        </button>
        <img style="width: 4%;" src="/letmecook/src/img/chef.png" class="img-fluid" alt="">
        <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="collapsingNavbar2">
            <ul class="navbar-nav mx-auto text-md-center text-left">
                <li class="nav-item">
                    <a class="nav-link" href="#">Food</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Food</a>
                </li>
                <li class="nav-item my-auto">
                    <a class="nav-link navbar-brand mx-0 d-none font-weight-bold d-md-inline"
                        href="/letmecook/index.php">Let's Food!</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Food</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Food</a>
                </li>
            </ul>
            <ul class="nav navbar-nav flex-row justify-content-md-center justify-content-start flex-nowrap">
                <i><a href="#"><img style="height: 35px;" src="./src/img/facebook.svg" alt="facebook"></a></i>
                <i><a href="#"><img style="height: 35px;" src="./src/img/twitter.svg" alt="twitter"></a></i>
            </ul>
        </div>
    </nav>
    <!--End Navbar-->
</header>

<body>
    <!--Jumbotron-->
    <div class="jumbotron jumbotron-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-6 ">
                    <h1 class="display-4 font-weight-bold">Let´s me cook <br>for You !</h1>
                    <p class="lead">Crea impresionantes Recetas de manera Fácil</p>
                    <hr>
                    <p>Crea recetas en cuestión de minutos, tan solo ingresa la cantidad de ingredientes que tienes y te
                        recomendaremos recetas</p>
                    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                </div>
                <div class="col-6 uk-overflow-hidden">
                    <img class="img-fluid rounded-circle k-animation-reverse uk-transform-origin-top-right"
                        uk-scrollspy="cls: uk-animation-kenburns; repeat: true" style="height: 80%;"
                        src="/letmecook/src/img/cook.png" alt="Chef_index">
                </div>
            </div>
        </div>

    </div>
    <!--End Jumbotron-->

    <!--Second nav-->
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <p class="font-weight-bold">¿Qué se te antoja preparar?</p>
        </li>
        <li class="nav-item">
            <input class="ml-2" type="text" placeholder="Ingresa el platillo">
        </li>
        <li class="nav-item">
            <button type="button" class="align-content-center ml-3 btn btn-dark btn-sm"
                onclick="location.href='/letmecook/recipes.php';"><strong>BUSCAR </strong> <img style="height: 35px;"
                    class="img-fluid" src="/letmecook/src/img/glass.svg" alt="lupa"></button>
        </li>
    </ul>
    <!--End second var-->
    <hr>
    <!--Container -->
    <div class="container  mt-4" uk-scrollspy="cls: uk-animation-fade; target: .uk-card; delay: 100; repeat: true">
        <div class="row ">
            <div class="col-6 uk-card">
                <p class="text-uppercase uk-card">Un poco de <br> nosotros....<img style="height: 25px;"
                        class="img-fluid" src="/letmecook/src/img/heart.svg"></p>
                <h2 class="display-4 uk-card">Quién es Let Me Cook?</h2>
                <br>
                <p class=" text-muted uk-card">Let me cook es una plataforma de creación de alimentos saludables,
                    no saludables e incluso veganos , con tan solo ingresar la cantidad
                    de ingredientes que tienes nuestra plataforma te recomendará el tipo
                    de alimento que se puede preparar con los mismos.</p>
                <br>
                <p class=" text-muted uk-card">La preparación será sencilla con la sinplificación de pasos que tiene
                    nuestro recetario, cuidamos tu economía, salud y bienestar</p>
            </div>
            <div class=" col-6 uk-card">
                <h2 class="display-4 uk-card">Porqué usar nuestra App?</h2>
                <br>
                <p class=" text-muted uk-card">El uso de nuestra plataforma será de gran utilidad para cualquier persona
                    que quiere cocinar x receta o que quiere cocinar algo con los mínimos de
                    ingredientes disponibles en su casa.</p>
                <br>
                <p class=" text-muted uk-card">Con Let Me Cook cocinar será como ponerte los zapatos, será sencillo y
                    divertido.</p>
                <br>
                <p class="font-weight-bold uk-card">¡Qué esperas!</p>
            </div>
        </div>

    </div>
    <!--End container-->
    <br>
    <hr>

    <!--Container 2-->
    <div class="container text-center   align-items-center" uk-scrollspy="cls: uk-animation-slide-left; repeat: true">
        <div class="row">
            <div class="col-12">
                <h3 class="font-weight-bold">Beneficios</h3>
                <p class="text-muted">Let Me Cook ofrece un sin fin de beneficios para nuestros <br> visitantes: </p>
            </div>
        </div>
        <div class="row uk-animation-toggle " tabindex="0">
            <div class="col-4 uk-animation-slide-left">
                <img class="img-fluid" style="height: 40px;" src="/letmecook/src/img/pancakes.svg" alt="pancakes">
                <h4 class="font-weight-bold">Sencillo</h4>
                <p class="text-muted">Con pasos son prácticos de <br> realizar</p>
            </div>
            <div class="col-4  uk-animation-shake uk-animation-reverse">
                <img class="img-fluid" style="height: 35px;" src="/letmecook/src/img/donut.svg" alt="donut">
                <h4 class="font-weight-bold">Rápido</h4>
                <p class="text-muted">Sin conplicaciones y <br> instrucciones simplificadas</p>
            </div>
            <div class="col-4 uk-animation-slide-right">
                <img class="img-fluid" style="height: 35px;" src="/letmecook/src/img/salad.svg" alt="salad">
                <h4 class="font-weight-bold">Delicioso</h4>
                <p class="text-muted">Recetas Proporcionadas por <br> Chefs y personas expertas</p>
            </div>
        </div>
    </div>
    <!--End container 2-->



    <!--Container 3-->
    <div class="container mt-4">
        <div class="row">
            <div class="col-6">
                <h3 class="font-weight-bold">Acerca de</h3>
                <p class="font-weight-bold text-muted font-italic">Mr. Chef Ronal McDonal </p>
                <p class="text-muted">Idea generada en un pequeño cubículo de la universidad de guadalajara
                    con la finalidad de poder cocinar sin saber hacerlo y al mismo modo
                    crear recetas saludables con elementos que tenemos a la mano.</p>
            </div>
            <div class="col-6   text-center">
                <img style="height: 65%;" class="img-fluid mb-2" src="/letmecook/src/img/cook_logo.png" alt="chef">
                <br>
                <i><a href="#"><img style="height: 35px;" src="/letmecook/src/img/inta.svg" alt="inta"></a></i>
                <i><a href="#"><img style="height: 35px;" src="/letmecook/src/img/facebook.svg" alt="facebook"></a></i>
                <i><a href="#"><img style="height: 35px;" src="/letmecook/src/img/twitter.svg" alt="twitter"></a></i>
            </div>
        </div>
    </div>
    <hr>
    <!--End container 3-->

    <h2 class="text-center align-self-center font-weight-bold">Comentarios</h2>

    <!--Container 4-->
    <div class="container">
        <div class="row">
            <div style="background-color:  #f1f0ef;" class="col-3">

            </div>
            <div class="col-5 m-2  border border-black">
                <p class="font-italic pt-4">"Nunca me imaginé hacer una receta con tan solo 4
                    ingredientes, y lo mejor, de una manera super Fácil
                    !!."</p>
                <br>
                <div class="row">
                    <div class="col-2">
                        <img style="height: 60px;" src="/letmecook/src/img/womanstudent.svg" alt="womanstudent">
                    </div>
                    <div class="col-4 p-0 m-0">
                        <p class="font-weight-bold m-0">Alberta Jacobs</p>
                        <p class="text-muted">Estudiante</p>

                    </div>
                </div>
            </div>
            <div style="background-color:  #f1f0ef;" class="col-3">

            </div>
        </div>
    </div>

    <!--End container 4-->

    <!--Container 5-->
    <div class="container">

        <div class="text-center align-self-center  m-4 p-4">
            <div class="row">
                <div class="col-12">
                    <h2 class="font-weight-bold p-lg-4">¿Qué ingredientes tienes a la mano?</h2>
                    <p class="text-muted">Ingresa los ingredientes que tienes y te recomendaremos recetas:</p>

                    <form>
                        <input class="form-control form-control-lg  " type="text" id="ingredientes"
                            placeholder="Ingresa tus ingredientes separados por comas">
                        <button class="btn btn-dark btn- md font-weight-bold m-2 " type="button" id="buscar">Buscar
                            recetas</button>
                    </form>
                    <!--  <button class="btn btn-dark btn- md font-weight-bold"  onclick="location.href='/letmecook/recipes.html';"   > Buscar </button> -->
                </div>
            </div>
        </div>
    </div>

    <!--End container 5-->
    <div class="container">
        <div class="chatbox">
            <div class="chatbox__support">
                <div class="chatbox__header">
                    <div class="chatbox__image--header">
                        <img style="height: 60px;" src="/letmecook/src/img/chef.png" alt="image">
                    </div>
                    <div class="chatbox__content--header">
                        <h4 class="chatbox__heading--header">Let Me Chat</h4>
                        <p class="chatbox__description--header">
                            Hola, soy mr pilopi <br>
                            ¿En qué te puedo ayudar?
                    </div>
                </div>
                <div class="chatbox__messages">
                    <div></div>
                </div>
                <div class="chatbox__footer">
                    <input type="text" placeholder="Write a message...">
                    <button class="chatbox__send--footer send__button">Send</button>
                </div>
            </div>
            <div class="chatbox__button">
                <button><img src="./src/img/chatbox-icon.svg" /></button>
            </div>
        </div>
    </div>


    <!--Footer-->
    <footer>
        <div class="m-4 p-4">
            <i><a href="#"><img style="height: 35px;" src="/letmecook/src/img/inta.svg" alt="inta"></a></i>
            <i><a href="#"><img style="height: 35px;" src="/letmecook/src/img/facebook.svg" alt="facebook"></a></i>
            <i><a href="#"><img style="height: 35px;" src="/letmecook/src/img/twitter.svg" alt="twitter"></a></i>
            <p class="text-muted float-right">© Let Me Cook -2022</p>
        </div>
    </footer>
    <!-- End Footer-->


    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.24/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.24/dist/js/uikit-icons.min.js"></script>
</body>


</html>
<script src="./src/js/app.js"></script>
<script>
//en jquery
//id --> #
//clase --> .

//busca las recetas en la base de datos segun los ingredientes
$("#buscar").click(function() {
    var ingredientes = $("#ingredientes").val();

    $.ajax({
            method: "POST",
            url: "src/php/action.php",
            data: {
                ingredientes: ingredientes,
                buscaringredientes: 1
            }
        })
        .done(function(response) {
            console.log(response);
            datos = JSON.parse(response);
            UIkit.notification.closeAll();

            if (datos.estatus == 1) {
                UIkit.notification(datos.msj);
                console.log(datos.ingredientes);
                location.href = "/letmecook/recipes.php?ing=" + ingredientes;
            }

        });


});
</script>


<?php
?>