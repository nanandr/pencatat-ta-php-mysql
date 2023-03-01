<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $proceed = false;

        if(!empty($_POST['username']) && !empty($_POST['password'])){
            $proceed = true;
        }
        else{
            echo "Error, Username/Password Kosong";
        }

        if($proceed == true){    
            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = "SELECT * FROM users WHERE username='$username'";
            
            require_once('../Connect.php');
            $check = mysqli_query($connect, $query);
            
            if(mysqli_num_rows($check) == 0){
                mysqli_query($connect, "INSERT INTO users (username, password) VALUES ('$username', " . "'" . $_POST['password'] ."')");
                echo "Proceed";
            }
            else{
                echo "Error, Username Sudah Digunakan";
            }
            mysqli_close($connect);            
        }
    }
?>