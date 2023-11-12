<?php


//methods
if(isset($_POST['buscaringredientes'])){
    include 'conn.php';
    $ingredientes = $_POST['ingredientes'];

    //labels
    $msjClase = 'success';
	$msjIcon  = 'check';
	$msjTxt   = '<br>Listo';

    //variables
    $estatus = 1;
    $xtras =0;
    $titu = 0;
    $lotpr = 0;
    $totpro = 0;


    echo '{ "msj":"<div class=\'uk-text-center uk-alert  uk-alert-'.$msjClase.' p-0 m-0 text-lg\'><i uk-icon=\'icon:'.$msjIcon.';ratio:2;\'></i> &nbsp;'.$msjTxt.'<a class=\'uk-alert-close uk-close></a>&nbsp;</div>", "estatus":"'.$estatus.'", "xtras":"'.$xtras.'", "ingredientes":"'.$ingredientes.'","tit":"'.$titu.'", "lot":"'.$lotpr.'", "tot":"'.$totpro.'"}';

}

//FORM ingresar receta
if(isset($_POST["enviarDatosForm"])){
   $TipoutorFrom = $_POST['TipoAutorForm'];
   $numeroSelects = $_POST['numeroSelects'];
   $TipoRecetaForm = $_POST['TipoRecetaForm'];
   $nombreRecetaForm = $_POST['nombreRecetaForm'];
   $caloriasRecetaForm = $_POST['caloriasRecetaForm'];
   $TipoDificultadForm = $_POST['TipoDificultadForm'];
   $PasosRecetaForm = $_POST['PasosRecetaForm'];

   //labels
   $msjClase = 'success';
   $msjIcon  = 'check';
   $msjTxt   = '<br>Receta<br>Agregada';
   
 //imagen
   $check = getimagesize($_FILES["image"]["tmp_name"]);
    //sacar imagen
   $image = $_FILES['image']['tmp_name'];
   $imgContent = addslashes(file_get_contents($image));
   //sacar el tipo de imagen
   $image_mime = getimagesize($image);
   $image_mime = $image_mime['mime'];

   include '../php/conn.php';

//Comprobar que la receta no sea repetida


$sth = $conn->query("SELECT name FROM recipe Where name like '$nombreRecetaForm' ");

if ($sth->rowCount() > 0) {
        $msjClase = 'danger';
        $msjIcon  = 'warning';
        $msjTxt   = '<br>Receta<br>repetida';
    } else {
        $sth = $conn->query("INSERT into recipe  (name, numbstep, indication, calories, type, difficulty, author, img, imgtype)
         VALUES 
         ('$nombreRecetaForm ','$numeroSelects', '$PasosRecetaForm ', '$caloriasRecetaForm ', '$TipoRecetaForm ', '$TipoDificultadForm ', '$TipoutorFrom ', '$imgContent', '$image_mime' ) ");

        //Saca el ultimo ID insertado de la receta
        $sth =  $conn->query("SELECT @@identity AS id from recipe");
        while ($rows = $sth->fetch(PDO::FETCH_ASSOC)) {
            $idReceta = $rows['id'];
        }

        //insertar ingredientes
        //sacar numeros de select que van a ser los ingredientes
        for ($i=1; $i <= $numeroSelects ; $i++) {
            //saca el valor de los ingredientes
            $valorIngrediente = $_POST['select'.$i];
            $sth =  $conn->query("INSERT INTO  recipe_ingredients  (id_recipe, id_ingredient) VALUES ('$idReceta','$valorIngrediente')");
                                  
        }
        

     
    }





//update image $insert = $conn->query("Update recipe  set img ='$imgContent', imgtype = '$image_mime' WHERE id = '$id' ");
   
   //header("location: ../../index.php"); 
    
}

//Agrega un ingrediente a la base de datos 
if(isset($_POST['agregaringrediente'])){
    include 'conn.php';
    $nuevoingrediente = strtolower($_POST['ingredientenuevo']);

    //labels
    $msjClase = 'success';
	$msjIcon  = 'check';
	$msjTxt   = '<br>Ingrediente<br>Agregado';

    //variables
    $estatus = 1;
    $xtras =0;
    $titu = 0;
    $lotpr = 0;
    $totpro = 0;
    
    $sth = $conn->query("SELECT name FROM ingredients Where name like '$nuevoingrediente' ");


    if ($sth->rowCount() > 0) {
        $msjClase = 'danger';
        $msjIcon  = 'warning';
        $msjTxt   = '<br>Ingrediente<br>Repetido';
    } else {
     $sth2 = $conn->query("INSERT into ingredients (name) values ('$nuevoingrediente')");
    }
    echo '{ "msj":"<div class=\'uk-text-center uk-alert  uk-alert-'.$msjClase.' p-0 m-0 text-lg\'><i uk-icon=\'icon:'.$msjIcon.';ratio:2;\'></i> &nbsp;'.$msjTxt.'<a class=\'uk-alert-close uk-close></a>&nbsp;</div>", "estatus":"'.$estatus.'", "xtras":"'.$xtras.'", "nuevoingrediente":"'.$nuevoingrediente.'","tit":"'.$titu.'", "lot":"'.$lotpr.'", "tot":"'.$totpro.'"}';

}


//Selecciona ingredientes para el campo select
if(isset($_POST['seleccionarIngredientes'])){
    include 'conn.php';
    $opciones='';
    $sth = $conn->query("SELECT name,id from ingredients");

    if ($sth->rowCount() > 0) {
        while ($rows = $sth->fetch(PDO::FETCH_ASSOC)) {
            $opciones.= '<option  value="'.$rows['id'].'">'.$rows['name'].'</option>';
        }
    } else {
        
    }
    $opciones    = str_replace('"', "'", $opciones);
    //labels
    $msjClase = 'success';
	$msjIcon  = 'check';
	$msjTxt   = '<br>Listo';

    //variables
    $estatus = 1;
    $xtras =0;
    $titu = 0;
    $lotpr = 0;
    $totpro = 0;


    echo '{ "msj":"<div class=\'uk-text-center uk-alert  uk-alert-'.$msjClase.' p-0 m-0 text-lg\'><i uk-icon=\'icon:'.$msjIcon.';ratio:2;\'></i> &nbsp;'.$msjTxt.'<a class=\'uk-alert-close uk-close></a>&nbsp;</div>", "estatus":"'.$estatus.'", "xtras":"'.$xtras.'", "opciones":"'.$opciones.'","tit":"'.$titu.'", "lot":"'.$lotpr.'", "tot":"'.$totpro.'"}';

}

//Recupera la lista de ingredientes de la base de datos

if(isset($_POST['recuperalistaingredientes'])){
    include 'conn.php';
    $listaIngredientes = '<ul>';
    $listaIngredientesConRecetas = '<ul>';


    //labels
    $msjClase = 'success';
	$msjIcon  = 'check';
	$msjTxt   = '<br>Listo';
    //query
    $sth = $conn->query("SELECT DISTINCT  i.name from ingredients as i
                        INNER  JOIN recipe_ingredients rein on rein.id_ingredient =  i.id
                        WHERE rein.id_ingredient = i.id");
    $sth2 = $conn->query("SELECT name from ingredients");

        if ($sth->rowCount() > 0) {
            while ($rows = $sth->fetch(PDO::FETCH_ASSOC)) {
                $listaIngredientesConRecetas.= '<li>'.$rows['name'].'</li>';
            }
            $listaIngredientesConRecetas .= '</ul>';
        } else {
            
        }
        if ($sth2->rowCount() > 0) {
            while ($rows = $sth2->fetch(PDO::FETCH_ASSOC)) {
                $listaIngredientes.= '<li>'.$rows['name'].'</li>';
            }
            $listaIngredientes .= '</ul>';
        } else {
            
        }

    //variables
    $estatus = 1;
    $xtras =0;
    $titu = 0;
    $lotpr = 0;
    $totpro = 0;


    echo '{ "msj":"<div class=\'uk-text-center uk-alert  uk-alert-'.$msjClase.' p-0 m-0 text-lg\'><i uk-icon=\'icon:'.$msjIcon.';ratio:2;\'></i> &nbsp;'.$msjTxt.'<a class=\'uk-alert-close uk-close></a>&nbsp;</div>", "estatus":"'.$estatus.'", "listaIngredientes":"'.$listaIngredientes.'", "listaingredientesreceta":"'.$listaIngredientesConRecetas.'","tit":"'.$titu.'", "lot":"'.$lotpr.'", "tot":"'.$totpro.'"}';

}


?>