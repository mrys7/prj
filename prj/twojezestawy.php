<?php
include('config.php');
            $username = $_SESSION['username'];
            
        $query = "SELECT username, setname FROM savedSets WHERE
        username = '$username'";
        
        $query = "SELECT users.username, sets.set_name FROM users, sets WHERE
        users.id = sets.user_id AND users.username ='$username' GROUP BY users.username, sets.set_name";
        
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) > 0 ){
        echo "<div class='word-box'><table class='search-tbl'>";
        echo "<tr><td><b>Nazwa użytkownika</b></td><td><b>Nazwa zestawu</b></td></tr>";
            while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['username'] . "</td><td>" . $row['set_name'] . "</td><td>
            <form action='wyswietlzestaw.php' method='post'>
            <input type='hidden' name='user' value='".$row['username']."'>
            <input type='hidden' name='set' value='".$row['set_name']."'>
            <input type='submit' value='Wyświetl' class='search-btn'></form></td>
            <td><form action='edytujzestaw.php' method='post'>
            <input type='hidden' name='user' value='".$row['username']."'>
            <input type='hidden' name='set' value='".$row['set_name']."'>
            <input type='submit' value='Edytuj zestaw' class='search-btn'></form></td>
            <td><form action='dodajtest.php' method='post'>
            <input type='hidden' name='user' value='".$row['username']."'>
            <input type='hidden' name='set' value='".$row['set_name']."'>
            <input type='submit' value='Stwórz test' class='search-btn'></form></td>
            <td><form action='deletetest.php' method='post'>
            <input type='hidden' name='user' value='".$row['username']."'>
            <input type='hidden' name='set' value='".$row['set_name']."'>
            <input type='submit' value='Skasuj test' class='search-btn'>
            </form></td>
            <td><form action='deleteset.php' method='post'>
            <input type='hidden' name='user' value='".$row['username']."'>
            <input type='hidden' name='set' value='".$row['set_name']."'>
            <input type='submit' value='Skasuj zestaw' class='search-btn'>
            </form></td></tr>";
        }
        echo "</div></table>";
        }
        else echo "<p>Nie stworzyłeś żadnego zestawu<p>";
        
?>