<?php

    $hostName = "localhost";
    $userName = "root";
    $password = "";
    $databaseName = "vaccination_system";

    $connection = mysqli_connect($hostName,$userName,$password,$databaseName);

    if(!$connection){
        die("Connection Error! ".mysqli_connect_error());
    }
    
?>