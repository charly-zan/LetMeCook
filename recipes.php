<?php
$ingredientesProporcionados = (isset($_GET['ing'])) ? $_GET['ing'] : "";
$uno = '';
$dos = '';
$data = '';


$todaslasrecetas = (isset($_GET['todaslasrecetas'])) ? $_GET['todaslasrecetas'] : 0;
#link other page
#<li><a href="index.php?rand='.rand(1,99999).'&seccion='.$seccion.'&subseccion=controlpedidos&id='.$id.'" class="color-red">Control De Pedidos '.$rowCONSULTA10['nombre'].'</a></li>
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="./src/css/style.css">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/letmecook/src/img/cook_logo.ico" type="image/x-icon">
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
        <a class="navbar-brand d-md-none d-inline" href="">¡Vamos a cocinar!</a>
        <button class="navbar-toggler ml-1" type="button" data-toggle="collapse" data-target="#collapsingNavbar2">
            <span class="navbar-toggler-icon"></span>
        </button>
        <img style="width: 4%;" src="/letmecook/src/img/chef.png" class="img-fluid" alt="">
        <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="collapsingNavbar2">
            <ul class="navbar-nav mx-auto text-md-center text-left">
                <li class="nav-item">
                    <img style="height: 35px;" class="img-fluid uk-animation-slide-left"
                        src="/letmecook/src/img/pizzahut.svg" alt="pizza">
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#modal-ingredientes" id="ingredientes" uk-toggle>Ingredientes</a>
                </li>
                <!-- MODAL -->
                <div id="modal-ingredientes" class="mt-5" uk-modal>
                    <div class="uk-modal-dialog">

                        <button class="uk-modal-close-default" type="button" uk-close></button>

                        <div class="uk-modal-header mt-3 text-center align-items-center"><strong>Total de ingredientes
                                en la base de datos</strong>
                            <div class="row">
                                <div class="col-6 mt-4">
                                    <h3>Ingredientes con recetas</h3>
                                </div>
                                <div class="col-6 mt-4">
                                    <h3>Ingredientes</h3>
                                </div>
                            </div>
                        </div>

                        <div class="uk-modal-body" uk-overflow-auto>
                            <div class="container">
                                <div class="row">
                                    <div class="col-6" id="listaIngredientesreceta">
                                    </div>
                                    <div class="col-6" id="listaIngredientes">
                                    </div>
                                </div>
                                <div class="row">

                                    <label for="AgregarIngrediente">Agregar nuevo ingrediente: </label>
                                    <input type="text" class="ml-2 mr-2 col-4" id="AgregarIngrediente"
                                        pattern="[A-Za-záéíóúÁÉÍÓÚñÑ\s]+">
                                    <button type="button" id="AgregarIngredienteBoton"
                                        class="uk-button uk-button-primary col-3">Agregar</button>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MODAL -->

                <li class="nav-item my-auto">
                    <a class="nav-link navbar-brand mx-0 d-none font-weight-bold d-md-inline"
                        href="/letmecook/index.php">¡Vamos a cocinar!</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#modal-agregar" uk-toggle>Agregar</a>
                </li>
                <!-- MODAL -->
                <div id="modal-agregar" class="mt-5" uk-modal>
                    <div class="uk-modal-dialog">

                        <button class="uk-modal-close-default" type="button" uk-close></button>

                        <div class="uk-modal-header mt-3 text-center align-items-center"><strong>Ingrese una nueva
                                receta</strong>
                            <h2 class="uk-modal-title"></h2>
                        </div>

                        <div class="uk-modal-body" uk-overflow-auto>
                            <div class="container">
                                <form action="./src/php/action.php" method="post" enctype="multipart/form-data">
                                    <div class="row text-center align-items-center">
                                        <div class="col-6 p-3">
                                            <label for="numeroSelects">¿Cuantos ingredientes contiene?:</label>
                                            <input type="number" id="numeroSelects" name="numeroSelects" min="1"
                                                title="Ingredientes que contiene tu receta" max="20" step="1" value="1"
                                                onchange="generarSelects()">

                                        </div>
                                        <div class="col-6 p-2" name="contenedorSelects" id="contenedorSelects">
                                            <!-- Aquí se generarán los selects -->
                                        </div>
                                        <div class="col-6 p-3">
                                            <label for="nombreRecetaForm">Nombre de la receta:</label>
                                            <input type="text" name="nombreRecetaForm" id="nombreRecetaForm"
                                                title="Ingresa solo LETRAS" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ\s]+" required>
                                        </div>
                                        <div class="col-6 p-3">
                                            <label for="caloriasRecetaForm">Calorias:</label>
                                            <input type="number" name="caloriasRecetaForm" id="caloriasRecetaForm"
                                                title="Calorias que contiene tu receta" required>
                                        </div>
                                        <div class="col-6 p-3">
                                            <label for="TipoRecetaForm">Tipo:</label>

                                            <select name="TipoRecetaForm" id="TipoRecetaForm" title="Tipo de receta">
                                                <option value="Vegana">Vegana</option>
                                                <option value="Bebida">Bebida</option>
                                                <option value="Desayuno">Desayuno</option>
                                                <option value="Ensalada">Ensalada</option>
                                                <option value="Postre">Postre</option>
                                                <option value="Pan">Pan</option>
                                                <option value="PlatoFuerte">Plato Fuerte</option>

                                            </select>
                                        </div>
                                        <div class="col-6 p-3">
                                            <label for="TipoDificultadForm">Dificultad:</label>
                                            <input type="number" id="TipoDificultadForm" name="TipoDificultadForm"
                                                title="Dificultad de tu receta" min="1" max="5" step="1" value="1">
                                        </div>
                                        <div class="col-6 p-3">
                                            <label for="TipoAutorForm">Autor:</label>
                                            <input type="text" name="TipoAutorForm" id="TipoAutorForm"
                                                title="Ingresa el nombre sin numeros" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ\s]+"
                                                required>
                                        </div>
                                        <div class="col-6 p-3">
                                            <label for="image">Imagen:</label>
                                            <input type="file" accept="image/*" id="image" name="image"
                                                title="Selecciona la imagen de tu receta" required />
                                        </div>
                                        <div class="col">
                                            <label for="PasosRecetaForm">Ingrese los pasos de la receta</label>
                                            <textarea name="PasosRecetaForm" id="PasosRecetaForm" cols="50" rows="30"
                                                title="Ingresa los pasos de tu receta" required></textarea>
                                        </div>
                                    </div>

                            </div>
                        </div>

                        <div class="uk-modal-footer uk-text-right">
                            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
                            <button class="uk-button uk-button-primary" type="submit" id="enviarDatosForm"
                                name="enviarDatosForm">Guardar</button>
                        </div>
                        </form>

                    </div>
                </div>
                <!-- END MODAL -->
                <li class="nav-item">
                    <img style="height: 35px;" class="img-fluid uk-animation-slide-right"
                        src="/letmecook/src/img/drikfood.svg" alt="drikfood">
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

    <?php
    if ($ingredientesProporcionados != "" ) {
        include './src/php/conn.php';
        // Ingredientes proporcionados
        //$ingredientesProporcionados = ["pollo", "queso", "tortilla de maiz"];
        //Lo hacemos array separado por comas
        $ingredientesProporcionados = array_map('trim', explode(',', $ingredientesProporcionados));

        $sth = $conn->query("SELECT r.id,r.name,r.type,r.img,r.imgtype, COUNT(*) AS num_ingredientes
                            FROM recipe r
                            JOIN recipe_ingredients ri ON r.id = ri.id_recipe
                            JOIN ingredients i ON ri.id_ingredient = i.id
                            WHERE i.name IN ('" . implode("', '", $ingredientesProporcionados) . "')
                            GROUP BY r.id");
        if ($sth->rowCount() > 0) {
            echo '
        <!--Container 1-->
        <div style="height: 350px; width: 70%;" class="container mt-5 pt-5">
            <div class="row  shadow-lg rounded">
                <div class="col-6 text-center pt-5">
                    <h1 class="font-weight-bold"  id="textTitle"> Tenemos "' . $sth->rowCount() . ' " <br> Recetas con esos ingredientes!!
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
                <h1  class="text-danger " id="numbIngredients" >' . sizeof($ingredientesProporcionados) . '</h1>
            </div>
        </div>';

            foreach ($ingredientesProporcionados as $ingr => $ingri)
                $uno .= $ingri . ' ,'
                ;
            $uno = substr($uno, 0, strlen($uno) - 1);
            print($uno) . '
    </div>
    <!--End Container 2-->


        <div class="row pb-4">
            <div class="d-flex col-12">
                <h2 class="pr-2">Categorías: </h2>
                    <p class="Vegana font-weight-bold p-3">Vegana
                    <br>
                    <p class="Bebida font-weight-bold p-3">Bebidas
                    <br>
                    <p class="Desayuno font-weight-bold p-3">Desayunos
                    <p class="Ensalada font-weight-bold p-3">Ensaladas
                    <br>
                    <p class="Postre font-weight-bold p-3">Postres
                    <p class="Pan font-weight-bold p-3">Pan
                    <br>
                    <p class="PlatoFuerte font-weight-bold p-3">Plato Fuerte
                    </p>
            </div>

    <div class="container pt-5">
    <div class="row pb-5">';
            while ($rows = $sth->fetch(PDO::FETCH_ASSOC)) {
                $nombre = $rows['name'];
                $tipo = $rows['type'];
                $imagen = $rows['img'];
                $id = $rows['id'];
                $imagentype = $rows['imgtype'];

                #probAR  este segmento de codigo
                echo '
                <div class="col-6  p-2 uk-card-hover uk-card-body ">
                    <a href="/letmecook/preparation.php?idReceta='.$id.'">
                        <div class="row p-3">
                            <div class="col-8">
                                <h2 class="font-italic ' . $tipo . '">' . $nombre . '</h2>
                                    <div class="d-flex">
                                        <p class="font-weight-bold ' . $tipo . ' pr-2">ingredientes: </p>
                                        <p>';
                                            $sth2 = $conn->query("SELECT i.name from ingredients as i
                                                                        INNER  JOIN recipe_ingredients rein on rein.id_recipe =  '$id'
                                                                        WHERE rein.id_ingredient = i.id");
                                            while ($rows2 = $sth2->fetch(PDO::FETCH_ASSOC)) {
                                                $data .= $rows2['name'] . ' ,';
                                            }
                                            $cadenaSinComa = substr($data, 0, strlen($data) - 1);
                                            echo ' ' . $cadenaSinComa . '
                                        </p>
                                    </div>
                                    <div class="d-flex">
                                        <p class=" font-weight-bold ' . $tipo . ' pr-2">ingredientes Faltantes:</p>';
                                            // Convierte la cadena en un array, separando por comas y eliminando espacios adicionales
                                            $cadenaDosArray = array_map('trim', explode(',', $cadenaSinComa));
                                            // Encuentra la diferencia entre los dos arrays
                                            $diferencia = array_diff($cadenaDosArray, $ingredientesProporcionados);
                                            // Convierte el resultado en un array asociativo para una mejor visualización
                                            $diferencia = array_values($diferencia);
                                            foreach ($diferencia as $ingr => $ingri)
                                                $dos .= $ingri . ' ,'
                                            
                                                ;
                                            $dos = substr($dos, 0, strlen($dos) - 1);
                                            print($dos) .
                                    '</div>
                            </div>
                            <div class="col-4">
                                <img class="img-fluid  pt-3 rounded-circle border" src="data:' . $imagentype . ';base64,' . base64_encode($imagen) . '" alt="">
                            </div>
                        </div>
                    </a>
                </div>';
                $dos = '';
                $data = '';
            '</div>';
            }
        '</div>
        <div class="col-6 shadow p-2">        
                 </div>';
        } else {
            echo '
        <!--Container 1-->
            <div style="height: 350px; width: 70%;" class="container mt-5 pt-5">
                <div class="row  shadow-lg rounded">
                    <div class="col-6 text-center pt-5">
                        <h1 class="font-weight-bold"  id="textTitle"> No contamos con  recetas :(!
                        </h1>
                    </div>
                    <div class="offset-2 col-4">
                        <img id="imgTitle" class="img-fluid" src="/letmecook/src/img/FoodSad.png" alt="Food">
                    </div>
                </div>
            </div>
            <!--End Container 1-->';
        }

    } else if($todaslasrecetas != 0 ) {
        include './src/php/conn.php';

        $sth = $conn->query("SELECT * from recipe");
        if ($sth->rowCount() > 0) {
            echo '
            <!--Container 1-->
            <div style="height: 350px; width: 70%;" class="container mt-5 pt-5">
                <div class="row  shadow-lg rounded">
                    <div class="col-6 text-center pt-5">
                        <h1 class="font-weight-bold"  id="textTitle"> Tenemos "' . $sth->rowCount() . ' " <br> Recetas!!
                        </h1>
                    </div>
                    <div class="offset-2 col-4">
                        <img id="imgTitle" class="img-fluid" src="/letmecook/src/img/Food.png" alt="Food">
                    </div>
                </div>
            </div>
        <!--End Container 1-->
            <div class="row pb-4">
                <div class="d-flex col-12">
                    <h2 class="pr-2">Categorías: </h2>
                        <p class="Vegana font-weight-bold p-3">Vegana
                        <br>
                        <p class="Bebida font-weight-bold p-3">Bebidas
                        <br>
                        <p class="Desayuno font-weight-bold p-3">Desayunos
                        <p class="Ensalada font-weight-bold p-3">Ensaladas
                        <br>
                        <p class="Postre font-weight-bold p-3">Postres
                        <p class="Pan font-weight-bold p-3">Pan
                        <br>
                        <p class="PlatoFuerte font-weight-bold p-3">Plato Fuerte
                        </p>
                </div>
    
        <div class="container pt-5">
        <div class="row pb-5">';
                while ($rows = $sth->fetch(PDO::FETCH_ASSOC)) {
                    $nombre = $rows['name'];
                    $tipo = $rows['type'];
                    $imagen = $rows['img'];
                    $id = $rows['id'];
                    $imagentype = $rows['imgtype'];
    
                    #probAR  este segmento de codigo
                    echo '
                    <div class="col-6  p-2 uk-card-hover uk-card-body ">
                        <a href="/letmecook/preparation.php?idReceta='.$id.'">
                            <div class="row p-3">
                                <div class="col-8">
                                    <h2 class="font-italic ' . $tipo . '">' . $nombre . '</h2>
                                        <div class="d-flex">
                                            <p class="font-weight-bold ' . $tipo . ' pr-2">ingredientes: </p>
                                            <p>';
                                                $sth2 = $conn->query("SELECT i.name from ingredients as i
                                                                            INNER  JOIN recipe_ingredients rein on rein.id_recipe =  '$id'
                                                                            WHERE rein.id_ingredient = i.id");
                                                while ($rows2 = $sth2->fetch(PDO::FETCH_ASSOC)) {
                                                    $data .= $rows2['name'] . ' ,';
                                                }
                                                $cadenaSinComa = substr($data, 0, strlen($data) - 1);
                                                echo ' ' . $cadenaSinComa . '
                                            </p>
                                        </div>
                                </div>
                                <div class="col-4">
                                    <img class="img-fluid  pt-3 rounded-circle border" src="data:' . $imagentype . ';base64,' . base64_encode($imagen) . '" alt="">
                                </div>
                            </div>
                        </a>
                    </div>';
                    $dos = '';
                    $data = '';
                '</div>';
                }
            '</div>
            <div class="col-6 shadow p-2">        
                     </div>';


        }else{
            //sin recetas
        }
        
    }else{
        echo '
        <!--Container 1-->
            <div style="height: 350px; width: 70%;" class="container mt-5 pt-5">
                <div class="row  shadow-lg rounded">
                    <div class="col-6 text-center pt-5">
                        <h1 class="font-weight-bold"  id="textTitle"> No contamos con  recetas :(!
                        </h1>
                    </div>
                    <div class="offset-2 col-4">
                        <img id="imgTitle" class="img-fluid" src="/letmecook/src/img/FoodSad.png" alt="Food">
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

    <!-- 
     Container 3 
    <div class="container pt-5">
        <div class="row pb-4">
            <div class="d-flex col-12">
                <h2 class="pr-2">Categoría: </h2>
                <p class="text-success font-weight-bold pt-3">Vegana</p>
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
            
                <div class="col-6 shadow p-2">        
                 </div>
                
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
-->
    <!--End Container 3-->

    <!--Container 4-->

    <!--End Container 4-->

    <!--Container 5-->
    <!--End Container 5-->
    </div>

    <div class="container">
        <div class="chatbox">
            <div class="chatbox__support">
                <div class="chatbox__header">
                    <div class="chatbox__image--header">
                        <img style="height: 60px;" src="/letmecook/src/img/chef.png" alt="image">
                    </div>
                    <div class="chatbox__content--header">
                        <h4 class="chatbox__heading--header">Déjame ayudarte</h4>
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
                    <button class="chatbox__send--footer send__button">Enviar</button>
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
$("#ingredientes").click(function() {

    $.ajax({
            method: "POST",
            url: "src/php/action.php",
            data: {
                recuperalistaingredientes: 1
            }
        })
        .done(function(response) {
            console.log(response);
            datos = JSON.parse(response);
            UIkit.notification.closeAll();

            if (datos.estatus == 1) {
                //UIkit.notification(datos.msj);
                $("#listaIngredientesreceta").html(datos.listaingredientesreceta);
                $("#listaIngredientes").html(datos.listaIngredientes);



            }

        });
});
/////////////MODIFICAR
$("#AgregarIngredienteBoton").click(function() {
    var ingredientenuevo = $("#AgregarIngrediente").val();

    if (!esCadenaValida(ingredientenuevo)) {
        alert("El nombre solo debe contener letras.");
        e.preventDefault(); // Evita que se envíe el formulario
    } else {
        $.ajax({
                method: "POST",
                url: "src/php/action.php",
                data: {
                    ingredientenuevo: ingredientenuevo,
                    agregaringrediente: 1
                }
            })
            .done(function(response) {
                console.log(response);
                datos = JSON.parse(response);
                UIkit.notification.closeAll();

                $("#AgregarIngrediente").val("");
                mostrarDatosEnLista();
                if (datos.estatus == 1) {
                    UIkit.notification(datos.msj);
                } else {
                    UIkit.notification(datos.msj);
                }

            });


    }




});


function esCadenaValida(valor) {
    // Utilizamos una expresión regular para validar que solo haya letras (mayúsculas o minúsculas) y espacios
    var patron = /^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/;
    return patron.test(valor);
}

function mostrarDatosEnLista() {
    $.ajax({
            method: "POST",
            url: "src/php/action.php",
            data: {
                recuperalistaingredientes: 1
            }
        })
        .done(function(response) {
            console.log(response);
            datos = JSON.parse(response);
            UIkit.notification.closeAll();

            if (datos.estatus == 1) {
                //UIkit.notification(datos.msj);
                $("#listaIngredientesreceta").html(datos.listaingredientesreceta);
                $("#listaIngredientes").html(datos.listaIngredientes);



            }

        });

}



function generarSelects() {
    // Obtener el valor del input
    var numero = parseInt(document.getElementById("numeroSelects").value);

    // Obtener el contenedor de selects
    var contenedor = document.getElementById("contenedorSelects");


    // Limpiar cualquier select existente en el contenedor
    contenedor.innerHTML = "";

    $.ajax({
            method: "POST",
            url: "src/php/action.php",
            data: {
                seleccionarIngredientes: 1
            }
        })
        .done(function(response) {
            console.log(response);
            datos = JSON.parse(response);
            UIkit.notification.closeAll();

            if (datos.estatus == 1) {
                //UIkit.notification(datos.msj);
                // Generar los selects con IDs únicos
                for (var i = 1; i <= numero; i++) {
                    var select = document.createElement("select");
                    select.classList.add("m-2");
                    select.classList.add("col-5");

                    select.id = "select" + i;
                    select.name = "select" + i; // Asignar un ID único
                    /*select.innerHTML = `       MODIFICAAAAAAAAAAAAAAAR
                                <option  value="opcion1">Opción 1</option>
                                <option  value="opcion2">Opción 2</option>
                                <option  value="opcion3">Opción 3</option>
                            `;
                    */
                    select.innerHTML = datos.opciones;
                    contenedor.appendChild(select);
                }
            }

        });


}
</script>