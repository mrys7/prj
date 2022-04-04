<?php
include('config.php');
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);   
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $password2 = stripslashes($_REQUEST['password2']);
        $password2 = mysqli_real_escape_string($con, $password2);
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($con, $email);
        
        if($password == $password2){
            $query    = "INSERT INTO `users` (username, password, email, admin) 
            VALUES ('$username', '$password', '$email', 0)";
            $result = mysqli_query($con, $query);
        if ($result) {
            $_SESSION['register'] = 1;
        } else {
           $_SESSION['register'] = 0;
        }
        }
        else {
           $_SESSION['register'] = 0;
        }
        header("Location: rejestracja.php");
    }
?>
