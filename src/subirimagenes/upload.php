<?php
if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        $id = $_POST["id"];
        /*
         * Insert image data into database
         */

        //DB details+
        include '../php/conn.php';
        
        //Insert image content into database
        $insert = $conn->query("Update food  set img ='$imgContent' where id = '$id'");
        if($insert){
            echo "File uploaded successfully.";
        }else{
            echo "File upload failed, please try again.";
        } 
    }else{
        echo "Please select an image file to upload.";
    }
    
}
?>