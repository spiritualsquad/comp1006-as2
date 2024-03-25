<?php
    if ($_FILES['photo']['size'] > 0) { 
        $photoName = $_FILES['photo']['name'];
        
        

        $size = $_FILES['photo']['size']; 
       

   
        $tmp_name = $_FILES['photo']['tmp_name'];
    

   
    $type = mime_content_type($tmp_name);
   

    if ($type != 'image/jpeg' && $type != 'image/png') {
        echo 'Photo must be a .jpg or .png';
            exit();
        }
        else {
            // save file to img/uploads
            move_uploaded_file($tmp_name, 'img/logo.jpg');
        }
        
    }
    header('location:adminSite.php');
?>