<?php
include('config.php');

        if (isset($_POST['user'])) {
        $setname = $_POST['set'];
        $username = $_POST['user'];
        
        $query = "DELETE FROM tests WHERE username = '$username' AND setname = '$setname'"; 
        
        if($con->query($query)==TRUE && $con->affected_rows > 0){
            $_SESSION['deletedtest']=1;
        }
        header("Location: profil.php");
        }
           ?>