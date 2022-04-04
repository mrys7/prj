<?php
include('config.php');
        if (isset($_POST['user'])) {
        $setname = $_POST['set'];
        $username = $_POST['user'];
        $session_user = $_SESSION["username"];
        
        $query = "DELETE FROM savedSets WHERE user_saved_set = '$session_user' AND username = '$username' AND setname = '$setname'";
        
        if($con->query($query)==TRUE && $con->affected_rows > 0){
            $_SESSION['saveSet']=2;
        }
        header("Location: profil.php");
        }
           ?>
