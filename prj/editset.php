<?php
include('config.php');
    if (isset($_POST['set-name'])) {
        $setname = $_POST['set-name'];
        $username = $_SESSION["username"];
        $old_set_name = $_POST["old-set-name"];
        
        $id_query = "SELECT id FROM users WHERE username = '$username'";
        $result = mysqli_query($con, $id_query);
        if(mysqli_num_rows($result) > 0 ) $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        
         $query = "DELETE FROM sets WHERE user_id = '$id' AND set_name = '$old_set_name'";
         $result = mysqli_query($con, $query);
        
         foreach(array_combine($_POST['word'], $_POST['translation']) as $w => $t) { 
            $word = stripslashes($w);   
            $word = mysqli_real_escape_string($con, $word);
            $translation = stripslashes($t);   
            $translation = mysqli_real_escape_string($con, $translation);
            
            $query = "INSERT INTO sets (user_id, set_name, word, translation) 
            VALUES ($id, '$setname', '$word', '$translation')";
            
            
            $result = mysqli_query($con, $query);
            if($result) {
                $_SESSION['edited'] = 1;
            }
            else {
                $_SESSION['edited'] = 0;
            }
         } 
        header("Location: profil.php");
    }
?>
