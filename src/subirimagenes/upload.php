<?php
if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        $id = $_POST["id"];
        $image_mime = getimagesize($image);
        #var_dump($image_mime);
        
        $image_mime = $image_mime['mime'];
        /*
         * IREVISAR ESTA PARTE
         *
         */

        //DB details+
        include '../php/conn.php';
        
        //Insert image content into database
        $insert = $conn->query("Update recipe  set img ='$imgContent', imgtype = '$image_mime' WHERE id = '$id' ");
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