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
$counter=1;
$tpoTexto ='text-right';
$imgTransform = 'rotateY(180deg)';


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
    <!--Fonotawesom-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.24/dist/css/uikit.min.css" />


    <title>Preparacion</title>
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
                <h1 class="font-weight-light font-italic-bold" id="textTitle"> '.$nombre.'</h1>
                <img style="height: 65%;" class="img-fluid pt-0 uk-border-rounded" src="data:' . $imgtype . ';base64,' . base64_encode($img) . '" alt="'.$nombre.'">
                <h3>Dificultad: </h3>
                ';
                for( $i = 0; $i < $dificultad; $i++ ){
                    echo'<span class="fa fa-star checked"></span>';
                };
                for( $i = 0; $i + $dificultad < 5; $i++ ){
                    echo'<span class="fa fa-star "></span>';
                }
            

            ;echo'
        </div>
            <div class="col-6">
                <div class="row shadow">
                    <div class="col-6">
                        <h1 class="pt-5 pb-0 font-weight-bold">Manos a la obra !</h1>
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
        <?php
            $indicacionesSeparada =  explode("\n", $indicaciones)// Dividir la cadena en líneas separadas por comas
            ;foreach ($indicacionesSeparada as $linea) {
                if($counter % 2 != 0){
                    echo '<h1 class="">Paso ' . $counter . ':</h1>
                         <div class="row">
                            <div class="col-8">';
                    echo '<p class="p-5"> ' . $linea . ' </p>
                        </div>
                        <div class="col-4">
                            <img style="height: 84%;" class="img-fluid" src="/letmecook/src/img/glass.svg" alt="">
                         </div>
                    </div>';
                    

                }else{
                    echo '<h1 class="text-right">Paso ' . $counter . ':</h1>
                         <div class="row">
                            <div class="col-4">
                                <img style="height: 84%;transform: rotateY(180deg);" class="img-fluid" src="/letmecook/src/img/glass.svg" alt="">
                            </div>
                            <div class="col-8">';
                    echo '<p class="p-5"> ' . $linea . ' </p>
                        </div>
                    </div>';
                }
                $counter++;
            }
        ?>
        <!-- <h1>Paso 1:</h1>
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
    </div> -->
        <!--End Container 2-->


        <!--Container 3-->
        <!--End Container 3-->

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
        <<script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
                integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
                crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
                integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
                crossorigin="anonymous">
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