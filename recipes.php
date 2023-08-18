<?php
$ing=(isset($_GET['ing']))?$_GET['ing']:"";
#link other page
#<li><a href="index.php?rand='.rand(1,99999).'&seccion='.$seccion.'&subseccion=controlpedidos&id='.$id.'" class="color-red">Control De Pedidos '.$rowCONSULTA10['nombre'].'</a></li>
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boostratp 4-->
    <link rel="stylesheet" href="/letmecook/libs/bootstrap-4.6.1/css/bootstrap.min.css">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.24/dist/css/uikit.min.css" />



    <title>Recetas</title>
    <style>
        a {
            text-decoration: none;
            color: black;
        }

        a:hover {

            text-decoration: none;

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
if($ing != ""){
    include './src/php/conn.php';

    // Ingredientes proporcionados
$ingredientesProporcionados = ["pollo", "queso", "tortilla de maiz"];

$sth = $conn->query("SELECT r.id,r.name,r.type,r.img, COUNT(*) AS num_ingredientes
    FROM recipe r
    JOIN recipe_ingredients ri ON r.id = ri.id_recipe
    JOIN ingredients i ON ri.id_ingredient = i.id
    WHERE i.name IN ('" . implode("', '", $ingredientesProporcionados) . "')
    GROUP BY r.id");

    if($sth ->rowCount() > 0){
        echo'<!--Container 1-->
    <div style="height: 350px; width: 70%;" class="container mt-5 pt-5">
        <div class="row  shadow-lg rounded">
            <div class="col-6 text-center pt-5">
                <h1 class="font-weight-bold"  id="textTitle"> Se encontraron "'.$sth ->rowCount().' " <br> Recetas con esos ingredientes!!
                </h1>
                </div>
                <div class="offset-2 col-4">
                <img id="imgTitle" class="img-fluid" src="/letmecook/src/img/Food.png" alt="Food">
                </div>
                
                </div>
                </div>
    <!--End Container 1-->
    <!--Container 2-->
    <div class="text-center">
    <div class="d-flex  justify-content-center">
    <h1 class="pr-3">Ingredientes Seleccionados: </h1>
    <div>
    <h1  class="text-danger " id="numbIngredients" >'.sizeof($ingredientesProporcionados).'</h1>
    </div>
    </div>';
    foreach($ingredientesProporcionados as $ingr=>$ingri )print($ingri.',').'
        
        </div>
        <!--End Container 2-->';
        while($rows = $sth->fetch(PDO::FETCH_ASSOC)){
            $nombre = $rows['name'];
            $tipo = $rows['type'];
            $imagen = $rows['img'];
            $id = $rows['id'];
            
        #probAR  este segmento de codigo
            echo'<div class="container pt-5">
            <div class="row pb-4">
                <div class="d-flex col-12">
                    <h2 class="pr-2">Categoría:  </h2>
                        <p class="text-success font-weight-bold pt-3" >'.$tipo.'</p>
                        <p class="text-success font-weight-bold pt-3">(1)</p>        
                </div>
                <div class="col-6 shadow p-2">
                    <a href="/letmecook/preparation.php">
                        <div class="row p-3">
                            <div class="col-8">
                                <h2 class="font-italic">'.$nombre.'</h2>
                                <div class="d-flex">
                                    <p class="font-weight-bold text-success pr-2">ingredientes: </p>
                                    <p> Masa de hojaldre
                                        vegana, Margarina vegetal,
                                        Edulcorante</p>
                                </div>
                                <div class="d-flex">
                                    <p class=" font-weight-bold text-success pr-2">ingredientes faltantes:</p>
                                    <p class="font-weight-bold">0 </p>
                                </div>
                            </div>
                            <div class="col-4">
                                <img class="img-fluid  pt-3" src="data:image/jpg;base64,'.base64_encode($imagen).'" alt="">
                            </div>
                        </div>
                    </a>
                </div>';
                
          }
        }else{
         echo 'Image not found...';
            }
            
}else{
 echo '    <!--Container 1-->
    <div style="height: 350px; width: 70%;" class="container mt-5 pt-5">
        <div class="row  shadow-lg rounded">
            <div class="col-6 text-center pt-5">
                <h1 class="font-weight-bold"  id="textTitle"> No se encontraron recetas :(!
                </h1>
            </div>
            <div class="offset-2 col-4">
                <img id="imgTitle" class="img-fluid" src="/letmecook/src/img/Food.png" alt="Food">
            </div>

        </div>
    </div>
    <!--End Container 1-->';
}

?>

    <!--Container 1 
    <div style="height: 350px; width: 70%;" class="container mt-5 pt-5">
        <div class="row  shadow-lg rounded">
            <div class="col-6 text-center pt-5">
                <h1 class="font-weight-bold"  id="textTitle"> Se encontraron " 6 " <br> Recetas con esos ingredientes!!
                </h1>
            </div>
            <div class="offset-2 col-4">
                <img id="imgTitle" class="img-fluid" src="/letmecook/src/img/Food.png" alt="Food">
            </div>

        </div>
    </div>
    End Container 1-->

    <!--Container 2 
    <div class="text-center">
        <div class="d-flex  justify-content-center">
            <h1 class="pr-3">Ingredientes Seleccionados: </h1>
            <div>
                <h1  class="text-danger " id="numbIngredients" >3</h1>
            </div>
        </div>
        <p id="ingredients">(Masa de hojaldre vegana, Margarina vegetal, Edulcorante)</p>
    </div>
    End Container 2-->


    <!--Container 3-->
    <div class="container pt-5">
        <div class="row pb-4">
            <div class="d-flex col-12">
                <h2 class="pr-2">Categoría:  </h2>
                    <p class="text-success font-weight-bold pt-3" >Vegana</p>
                    <p class="text-success font-weight-bold pt-3">(1)</p>        
            </div>
            <div class="col-6 shadow p-2">
                <a href="/letmecook/preparation.php">
                    <div class="row p-3">
                        <div class="col-8">
                            <h2 class="font-italic">Cruasanes veganos</h2>
                            <div class="d-flex">
                                <p class="font-weight-bold text-success pr-2">ingredientes: </p>
                                <p> Masa de hojaldre
                                    vegana, Margarina vegetal,
                                    Edulcorante</p>
                            </div>
                            <div class="d-flex">
                                <p class=" font-weight-bold text-success pr-2">ingredientes faltantes:</p>
                                <p class="font-weight-bold">0 </p>
                            </div>
                        </div>
                        <div class="col-4">
                            <img class="img-fluid  pt-3" src="/letmecook/src/img/croasant.png" alt="">
                        </div>
                    </div>
                </a>
            </div>
                <!-- 
                <div class="col-6 shadow p-2">        
                 </div>
                -->
        </div>
       
        <div class="row pb-4">
            <div class="d-flex col-12">
                <h2 class="pr-2">Categoría: </h2>
                <p class="text-warning font-weight-bold pt-3">Comida chatarra
                <p class="text-warning font-weight-bold pt-3">(2)</p>
                </p>
            </div>


            <div class="col-6 shadow p-2">
                <a href="/preparation.html">
                    <div class="row">
                        <div class="col-8">
                            <h2 class="font-italic"> Cruasane Chocolatoso</h2>
                            <div class="d-flex">
                                <p class="font-weight-bold text-warning pr-2">ingredientes:</p>
                                <p> Masa de hojaldre
                                    vegana, Margarina vegetal,
                                    Edulcorante </p>
                                <p class="font-weight-bold">Chocolate líquido</p>
                            </div>
                            <div class="d-flex">
                                <p class="font-weight-bold text-warning pr-2">ingredientes faltantes:</p>
                                <p class="font-weight-bold"> 1</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <img class="img-fluid  pt-3" src="/letmecook/src/img/croasant_novegano.jpg" alt="">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 shadow p-2">
                <a href="/preparation.html">

                    <div class="row">
                        <div class="col-8">
                            <h2 class="font-italic"> Nito </h2>
                            <div class="d-flex">

                                <p class="font-weight-bold text-warning pr-2">ingredientes:</p>
                                <p> Masa de hojaldre
                                    vegana, Margarina vegetal,
                                    Edulcorante </p>
                                <p class="font-weight-bold">Chocolate líquido</p>
                            </div>
                            <div class="d-flex">

                                <p class="font-weight-bold text-warning pr-2">ingredientes faltantes:</p>
                                <p class="font-weight-bold"> 1</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <img class="img-fluid  pt-3" src="/letmecook/src/img/nito.jpg" alt="">
                        </div>
                    </div>
                </a>

            </div>
        </div>
        <div class="row pb-5">
            <div class="d-flex col-12">
                <h2 class="pr-2">Categoría: </h2>
                <p style="color:rgb(7, 141, 175)" class=" font-weight-bold pt-3">Balanceada
                <p style="color:rgb(7, 141, 175)" class=" font-weight-bold pt-3">(3)</p>
                </p>
            </div>

            <div class="col-6 shadow p-2">
                <a href="/preparation.html">

                    <div class="row">
                        <div class="col-8">
                            <h2 class="font-italic"> Cruasane Clásicos </h2>
                            <div class="d-flex">
                                <p style="color:rgb(7, 141, 175)" class="font-weight-bold  pr-2">ingredientes:</p>
                                <p> Masa de hojaldre
                                    vegana, Margarina vegetal,
                                    Edulcorante </p>
                            </div>
                            <div class="d-flex">
                                <p style="color:rgb(7, 141, 175)" class="font-weight-bold pr-2">ingredientes faltantes:
                                </p>
                                <p class="font-weight-bold"> 0</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <img class="img-fluid pt-3" src="/letmecook/src/img/croasant_novegano.jpg" alt="">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 shadow p-2">
                <a href="/preparation.html">

                    <div class="row">
                        <div class="col-8">
                            <h2 class="font-italic"> Cruasane veganos</h2>
                            <div class="d-flex">
                                <p style="color:rgb(7, 141, 175)" class="font-weight-bold  pr-2">ingredientes:</p>
                                <p> Masa de hojaldre
                                    vegana, Margarina vegetal,
                                    Edulcorante </p>
                            </div>
                            <div class="d-flex">
                                <p style="color:rgb(7, 141, 175)" class="font-weight-bold pr-2">ingredientes faltantes:
                                </p>
                                <p class="font-weight-bold"> 0</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <img class="img-fluid  pt-3" src="/letmecook/src/img/croasant_novegano.jpg" alt="">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 shadow p-2 p-2">
                <a href="/preparation.html">

                    <div class="row">
                        <div class="col-8">
                            <h2 class="font-italic"> Cruasane veganos</h2>
                            <div class="d-flex">
                                <p style="color:rgb(7, 141, 175)" class="font-weight-bold  pr-2">ingredientes:</p>
                                <p> Masa de hojaldre
                                    vegana, Margarina vegetal,
                                    Edulcorante </p>
                            </div>
                            <div class="d-flex">
                                <p style="color:rgb(7, 141, 175)" class="font-weight-bold pr-2">ingredientes faltantes:
                                </p>
                                <p class="font-weight-bold"> 0</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <img class="img-fluid  pt-3" src="/letmecook/src/img/croasant_novegano.jpg" alt="">
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>

    <!--End Container 3-->

    <!--Container 4-->
    
    <!--End Container 4-->

    <!--Container 5-->
    <!--End Container 5-->



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
    <<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.24/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.24/dist/js/uikit-icons.min.js"></script>
</body>

</html>