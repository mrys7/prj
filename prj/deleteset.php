<?php
include('config.php');

        if (isset($_POST['user'])) {
        $setname = $_POST['set'];
        $username = $_POST['user'];
        
        $id_query = "SELECT id FROM users WHERE username = '$username'";
        $result = mysqli_query($con, $id_query);
        if(mysqli_num_rows($result) > 0 ) $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        
        $query = "DELETE FROM sets WHERE user_id = '$id' AND set_name = '$setname'"; 
        
        if($con->query($query)==TRUE && $con->affected_rows > 0){
            $_SESSION['deleted']=1;
        }
        header("Location: profil.php");
        }
           ?>