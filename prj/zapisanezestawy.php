<?php
include('config.php');
            $username = $_SESSION['username'];
            
        $query = "SELECT username, setname FROM savedSets WHERE
        user_saved_set = '$username'";
        
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) > 0 ){
        echo "<div class='word-box'><table class='search-tbl'>";
        echo "<tr><td><b>Nazwa użytkownika</b></td><td><b>Nazwa zestawu</b></td></tr>";
            while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['username'] . "</td><td>" . $row['setname'] . "</td><td>
            <form action='wyswietlzestaw.php' method='post'>
            <input type='hidden' name='user' value='".$row['username']."'>
            <input type='hidden' name='set' value='".$row['setname']."'>
            <input type='submit' value='Wyświetl' class='search-btn'></form></td>
            <td><form action='wykreslzestaw.php' method='post'>
            <input type='hidden' name='user' value='".$row['username']."'>
            <input type='hidden' name='set' value='".$row['setname']."'>
            <input type='submit' value='Wykreśl zestaw' class='search-btn'>
            </form></td></tr>";
        }
        echo "</div></table>";
        }
        else echo "<p>Brak zapisanych zestawów<p>";
        
?>