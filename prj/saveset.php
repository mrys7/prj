<?php
include('config.php');

    if (isset($_POST['saveSet'])) {
        $username = $_REQUEST['user'];   
        $setname = $_REQUEST['set'];
        $user_saved_set = $_SESSION["username"];
        $query = "SELECT * FROM savedSets WHERE user_saved_set = '$user_saved_set' AND username = '$username' AND setname = '$setname'";
         $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) > 0 ){
            if ($result) $_SESSION['saveSet'] = 0;
        }
         else{
        $query    = "INSERT INTO `savedSets` (user_saved_set, username, setname) 
            VALUES ('$user_saved_set', '$username', '$setname')";
        $result = mysqli_query($con, $query);
        if ($result) $_SESSION['saveSet'] = 1;
         }
         header("Location: profil.php");
    }
?>