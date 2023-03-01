<?php
    $server = "localhost:3306";
    $user = "root";
    $password = "";
    $DB = "android_catat_buku_ta";

    $connect = mysqli_connect($server, $user, $password, $DB);
    if(mysqli_connect_errno()){
        echo "Gagal terhubung MySQL: " . mysqli_connect_error();
    } 
?>