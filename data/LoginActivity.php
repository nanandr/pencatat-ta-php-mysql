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

            $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            
            require_once('../Connect.php');
            $check = mysqli_query($connect, $query);
            
            if(mysqli_num_rows($check) > 0){
                echo "Proceed";
            }
            else{
                echo "Error, Salah Username/Password";
            }
            mysqli_close($connect);            
        }
    }
?>