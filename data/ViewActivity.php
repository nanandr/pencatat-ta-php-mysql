<?php
    require_once('../Connect.php');
    $result = array();
    $q = "SELECT * FROM tugas_akhir ";

    if(isset($_GET['nama_pemilik'])){
        $q .= "WHERE nama_pemilik LIKE '%".$_GET['nama_pemilik']."%' ";
        if(mysqli_num_rows(mysqli_query($connect, $q)) == 0){
            $q .= " OR tahun = ".$_GET['nama_pemilik']." ";
        }
    }

    $q .= "ORDER BY tahun DESC, nama_pemilik"; 
    $query = mysqli_query($connect, $q);

    while($row = mysqli_fetch_assoc($query)){
        $result[] = $row;
    }

    echo json_encode(array('result'=>$result));
?>