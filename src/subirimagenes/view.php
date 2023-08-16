<?php
if(!empty($_GET['id'])){
    //DB details+
    include '../php/conn.php';
    
    //Get image data from database
    $sth  = $conn->query("SELECT img FROM food WHERE id = {$_GET['id']}");
    
    if($sth ->rowCount() > 0){
        $imgData = $sth->fetch(PDO::FETCH_ASSOC);
        //Render image
        header("Content-type: image/jpg"); 
        echo $imgData['img']; 
    }else{
        echo 'Image not found...';
    }
}
?>