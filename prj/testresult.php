<?php
include('config.php');

    if (isset($_POST['user'])) {
        $counter = 0;
        $points = 0;
        $setname = $_POST['set'];
        $username = $_POST['user'];
        
        $query = "SELECT * FROM tests WHERE username='$username' AND setname='$setname'";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) > 0 ){
            while($row = $result->fetch_assoc()) {
                $counter++;
                $index = "test"."$counter";
                if(isset($_POST[$index])) $sentanswer = $_POST[$index];
                else $sentanswer = "";
                if($sentanswer == $row['goodanswer']) $points++;
            }
            $_SESSION['testresults'] = $points."/".$counter;
        }
            header("Location: profil.php");
    }
?>