<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $proceed = false;

        if(!empty($_POST['no_induk']) && !empty($_POST['nama_pemilik']) && !empty($_POST['tahun'])){
            if(!empty($_POST['judul']) && !empty($_POST['tempat_pkl']) && !empty($_POST['nama_pembimbing'])){
                if($_POST['tahun'] > 2004 && strlen($_POST['tahun']) == 4 && $_POST['tahun'] <= date("Y")){
                    $proceed = true;
                }
                else{
                    echo "Error, Tahun Invalid";
                }
            }
            else{
                echo "Error, Form Data Tugas Akhir Masih Kosong";
            }
        }
        else{
            echo "Error, Form Data Siswa Masih Kosong";
        }

        if($proceed == true){    
            $noInduk = $_POST['no_induk'];
            $judul = $_POST['judul'];
            $namaPemilik = $_POST['nama_pemilik'];
            $namaPembimbing = $_POST['nama_pembimbing'];
            $tempatPkl = $_POST['tempat_pkl'];
            $tahun = $_POST['tahun'];

            $query = "INSERT INTO tugas_akhir (no_induk, judul, nama_pemilik, nama_pembimbing, tempat_pkl, tahun) VALUES ($noInduk, '$judul', '$namaPemilik', '$namaPembimbing', '$tempatPkl', $tahun)";
            
            require_once('../Connect.php');
            
            if(mysqli_query($connect, $query)){
                echo "Berhasil Menambahkan Data";
            }
            else{
                echo "Error, Gagal Menambahkan Data";
            }
            mysqli_close($connect);            
        }
    }
?>