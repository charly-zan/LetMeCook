<?php
include './src/php/conn.php';
$idReceta = (isset($_GET['idReceta'])) ? $_GET['idReceta'] : "";
$ing = (isset($_GET['ing'])) ? $_GET['ing'] : "";
$nombre='';
$pasos='';
$calorias='';
$indicaciones='';
$dificultad ='';
$autor = '';
$img ='';
$imgtype='';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boostratp 4-->
    <link rel="stylesheet" href="/letmecook/libs/bootstrap-4.6.1/css/bootstrap.min.css">
    <!--Fonotawesom-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.24/dist/css/uikit.min.css" />


    <title>Preparation</title>
    <style>
    .checked {
        color: orange;
    }
    </style>
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
                    <a class="nav-link navbar-brand mx-0 d-none font-weight-bold d-md-inline" href="/index.html">Let's
                        Food!</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Food</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Food</a>
                </li>
            </ul>
            <ul class="nav navbar-nav flex-row justify-content-md-center justify-content-start flex-nowrap">
                <i><a href="#"><img style="height: 35px;" src="/letmecook/src/img/facebook.svg" alt="facebook"></a></i>
                <i><a href="#"><img style="height: 35px;" src="/letmecook/src/img/twitter.svg" alt="twitter"></a></i>
            </ul>
        </div>
    </nav>
    <!--End Navbar-->
</header>

<body>

    <?php
    $sth = $conn->query("SELECT * From recipe WHERE id ='$idReceta' ");
    while ($rows = $sth->fetch(PDO::FETCH_ASSOC)) {
        $nombre = $rows['name'];
        $pasos= $rows['numbstep'];
        $calorias= $rows['calories'];
        $indicaciones= $rows['indication'];
        $dificultad = $rows['difficulty'];
        $autor = $rows['author'];
        $img = $rows['img'];
        $imgtype= $rows['imgtype'];

    }
echo'
    <!--Container 1-->
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-6 text-center" style="height: 350px;">
                <h1 class="font-weight-light font-italic" id="textTitle"> '.$nombre.'</h1>
                <img style="height: 65%;" class="img-fluid pt-0" src="data:' . $imgtype . ';base64,' . base64_encode($img) . '" alt="'.$nombre.'">
                <h3>Total de pasos: '.$pasos.'</h3>
                ';
                for( $i = 0; $i < $dificultad; $i++ ){
                    echo'<span class="fa fa-star checked"></span>';
                };
                for( $i = 0; $i + $dificultad < 5; $i++ ){
                    echo'<span class="fa fa-star "></span>';
                }
            

            ;echo'</div>
            <div class="col-6">
                <div class="row shadow">
                    <div class="col-6">
                        <h1 class="pt-5 pb-0 font-weight-bold">Lets Cook!</h1>
                        <img style="height: 40%;" class="img-fluid pt-0" src="/letmecook/src/img/bolw.svg" alt="bolw">
                    </div>
                    <div class="col-6">
                        <img class="img-fluid rounded pt-5 uk-animation-shake uk-animation-reverse" src="/letmecook/src/img/cook_logo.png" alt="cook_logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Container 1-->';
    ?>

    <!--Modificar los pasos para que en cada salto de linea sea como un parrafo 2-->


    <!--Container 2-->
    <div class="container pt-3">
        <h1>Paso 1:</h1>
        <div class="row">
            <div class="col-8">
                <p class="p-5">Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit. Nulla quam velit
                    , vulputate eu pharetra nec, mattis ac neque. Duis
                    vulputate commodo lectus, ac blandit elit tincidunt id.
                    Sed rhoncus, tortor sed eleifend tristique, tortor mauris
                    molestie elit, et lacinia ipsum quam nec dui. Quisque nec
                    mauris sit amet elit iaculis pretium sit amet quis magna.
                    Aenean velit odio, elementum in tempus ut, vehicula eu diam.
                    Pellentesque rhoncus aliquam mattis. Ut vulputate eros sed
                    felis sodales nec vulputate justo hendrerit. Vivamus varius
                    pretium ligula, a aliquam odio euismod sit amet. Quisque laoreet
                    sem sit amet orci ullamcorper at ultricies metus viverra. Pellentesque
                    arcu mauris, malesuada quis ornare accumsan, blandit sed diam.</p>
            </div>
            <div class="col-4">
                <img style="height: 84%;" class="img-fluid" src="/letmecook/src/img/glass.svg" alt="">
            </div>
        </div>
        <h1 class="text-right">Paso 2:</h1>
        <div class="row">
            <div class="col-4">
                <img style="height: 84%;transform: rotateY(180deg);" class="img-fluid"
                    src="/letmecook/src/img/glass.svg" alt="">
            </div>
            <div class="col-8">
                <p class="p-5">Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit. Nulla quam velit
                    , vulputate eu pharetra nec, mattis ac neque. Duis
                    vulputate commodo lectus, ac blandit elit tincidunt id.
                    Sed rhoncus, tortor sed eleifend tristique, tortor mauris
                    molestie elit, et lacinia ipsum quam nec dui. Quisque nec
                    mauris sit amet elit iaculis pretium sit amet quis magna.
                    Aenean velit odio, elementum in tempus ut, vehicula eu diam.
                    Pellentesque rhoncus aliquam mattis. Ut vulputate eros sed
                    felis sodales nec vulputate justo hendrerit. Vivamus varius
                    pretium ligula, a aliquam odio euismod sit amet. Quisque laoreet
                    sem sit amet orci ullamcorper at ultricies metus viverra. Pellentesque
                    arcu mauris, malesuada quis ornare accumsan, blandit sed diam.</p>
            </div>
        </div>
        <h1>Paso 3:</h1>
        <div class="row">
            <div class="col-8">
                <p class="p-5">Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit. Nulla quam velit
                    , vulputate eu pharetra nec, mattis ac neque. Duis
                    vulputate commodo lectus, ac blandit elit tincidunt id.
                    Sed rhoncus, tortor sed eleifend tristique, tortor mauris
                    molestie elit, et lacinia ipsum quam nec dui. Quisque nec
                    mauris sit amet elit iaculis pretium sit amet quis magna.
                    Aenean velit odio, elementum in tempus ut, vehicula eu diam.
                    Pellentesque rhoncus aliquam mattis. Ut vulputate eros sed
                    felis sodales nec vulputate justo hendrerit. Vivamus varius
                    pretium ligula, a aliquam odio euismod sit amet. Quisque laoreet
                    sem sit amet orci ullamcorper at ultricies metus viverra. Pellentesque
                    arcu mauris, malesuada quis ornare accumsan, blandit sed diam.</p>
            </div>
            <div class="col-4">
                <img style="height: 84%;" class="img-fluid" src="/letmecook/src/img/glass.svg" alt="">
            </div>
        </div>
    </div>
    <!--End Container 2-->


    <!--Container 3-->
    <!--End Container 3-->


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
    <<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
        </script>
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