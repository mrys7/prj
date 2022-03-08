<?php
session_start();
include('config.php');

        if (isset($_POST['username'])) {
        $id = $_POST['userid'];
        $username = $_POST['username'];
        
        $login_query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($con, $login_query);
        if(mysqli_num_rows($result) > 0 ) {
            $row = mysqli_fetch_assoc($result);
            $login = $row['login'];
            $admin = $row['admin'];
        }
        if($admin != 1){
            if($login == 1)
                $query = "UPDATE users SET login = 0 WHERE username = '$username' AND id = '$id'";
            else
                $query = "UPDATE users SET login = 1 WHERE username = '$username' AND id = '$id'";
            $result = mysqli_query($con, $query);
        }
        header("Location: uzytkownicy.php");
        }
           ?>