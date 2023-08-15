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



?>