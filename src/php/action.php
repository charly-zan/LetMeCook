<?php

//methods
if(isset($_POST['buscaringredientes'])){
    include 'conn.php';
    $ingredientes = $_POST['ingredientes'];

    $msjClase = 'success';
	$msjIcon  = 'check';
	$msjTxt   = '<br>Listo';

    $estatus = 1;
    $xtras =0;
    $tabl = 0;
    $titu = 0;
    $lotpr = 0;
    $totpro = 0;


    echo '{ "msj":"<div class=\'uk-text-center uk-alert  uk-alert-'.$msjClase.' p-0 m-0 text-lg\'><i uk-icon=\'icon:'.$msjIcon.';ratio:2;\'></i> &nbsp;'.$msjTxt.'<a class=\'uk-alert-close uk-close></a>&nbsp;</div>", "estatus":"'.$estatus.'", "xtras":"'.$xtras.'", "tabl":"'.$tabl.'","tit":"'.$titu.'", "lot":"'.$lotpr.'", "tot":"'.$totpro.'"}';

}



?>