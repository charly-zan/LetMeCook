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