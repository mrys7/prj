<?php
include('config.php');

    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);   
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='$password'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $row = mysqli_fetch_assoc($result);
            if($row['login'] != 1) $_SESSION['username'] = $username;
            else $_SESSION['blocked'] = 1;
            if($row['admin']==1) $_SESSION['admin'] = 1;

            header("Location: stronaglowna.php");
        } else {
            echo "<div class='form'>
                  <h3>Zła nazwa użytkownika lub hasło.</h3><br/>
                  <p class='link'>Click here to <a href='logowanie.php'>Zaloguj</a> ponownie.</p>
                  </div>";
        }
    }
?>