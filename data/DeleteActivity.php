<?php
    $id = $_GET['id'];

    //Import File Koneksi Database
    require_once('../Connect.php');

    //Membuat SQL Query
    $query = "DELETE FROM tugas_akhir WHERE id = $id";


    //Menghapus Nilai pada Database
    if(mysqli_query($connect,$query)){
    echo 'Berhasil Menghapus Data';
    }else{
    echo 'Error, Gagal Menghapus Data';
    }

    mysqli_close($connect);
 ?>
