<?php

 //koneksi ke database
    $server = "localhost";
    $usernames = "root";
    $passwords = "";
    $database = "todo"; //nama database

    $mysqli = mysqli_connect($server,$usernames, $passwords, $database);

    //check error
    if(mysqli_connect_errno()){
        echo "koneksi gagal, ada masalah pada: ".mysqli_connect_error();
        exit();
        mysqli_close($mysqli);
    }

mysqli_select_db($mysqli,$database) or die ("Database Tidak Bisa Dibuka");
?>