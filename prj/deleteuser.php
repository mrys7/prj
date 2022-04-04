<?php
include('config.php');
        if (isset($_POST['username'])) {
        $id = $_POST['userid'];
        $username = $_POST['username'];
        
        $query = "DELETE FROM users WHERE username = '$username' AND id = '$id'"; 
        
        if($con->query($query)==TRUE && $con->affected_rows > 0){
            $_SESSION['deleteduser']=1;
        }
        header("Location: uzytkownicy.php");
        }
           ?>
