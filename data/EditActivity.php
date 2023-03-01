<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $proceed = false;
        if(isset($_POST['id'])){
            if(isset($_POST['judul'])){
                if(isset($_POST['no_induk']) && isset($_POST['nama_pemilik']) && isset($_POST['nama_pembimbing'])){
                    if(isset($_POST['tempat_pkl'])){
                        if(isset($_POST['tahun'])){
                            if($_POST['tahun'] > 2004 && strlen($_POST['tahun']) == 4 && $_POST['tahun'] <= date("Y")){
                                $proceed = true;
                            }
                            else{
                                echo "Error, Tahun Invalid";
                            }
                        }
                        else{
                            echo "Error, data tahun tidak ada";
                        }
                    }
                    else{
                        echo "Error, data tempat pkl tidak ada";
                    }
                }
                else{
                    echo "Error, data siswa & guru tidak ada";
                }
            }
            else{
                echo "Error, data judul tidak ada";
            }
        }
        else{
            echo "Error, id tidak ada";
        }

        if($proceed == true){    
            $id = $_POST['id'];
            $noInduk = $_POST['no_induk'];
            $judul = $_POST['judul'];
            $namaPemilik = $_POST['nama_pemilik'];
            $namaPembimbing = $_POST['nama_pembimbing'];
            $tempatPkl = $_POST['tempat_pkl'];
            $tahun = $_POST['tahun'];

            $query = "UPDATE tugas_akhir SET no_induk = $noInduk, judul = '$judul', nama_pemilik = '$namaPemilik', nama_pembimbing = '$namaPembimbing', tempat_pkl = '$tempatPkl', tahun = '$tahun' WHERE id = $id";
            
            require_once('../Connect.php');
            
            if(mysqli_query($connect, $query)){
                echo "Berhasil Mengedit Data";
            }
            else{
                echo "Error, Gagal Mengedit Data";
            }
            mysqli_close($connect);            
        }
    }
?>