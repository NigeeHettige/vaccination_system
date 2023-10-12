<?php

    if(isset($_POST['submit'])){

        $file = $_FILES['file'];
        //print_r($file);

        $fileName = $_FILES['file']['name'];
        $fileTempName = $_FILES['file']['tmp_name'];
        $fileType = $_FILES['file']['type'];
        $fileError = $_FILES['file']['error'];
        $fileSize = $_FILES['file']['size'];

        $fileExtention = explode(".",$fileName);
        $fileCorrectExtenstion = strtolower(end($fileExtention));

        $allow = array('jpg','jpeg','png','pdf');
        
        if(in_array($fileCorrectExtenstion,$allow)){
            if($fileError === 0){
                if($fileSize<100000){
                    $fileNameNew = uniqid('',true).".".$fileCorrectExtenstion;
                    $path = 'uploads/'.$fileNameNew;
                    move_uploaded_file($fileTempName,$path);
                }
            }
        }
    }

?>