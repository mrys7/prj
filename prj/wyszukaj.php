<?php
include('config.php');
if(!isset($_SESSION["username"])) header("Location: stronaglowna.php");
?>
<!DOCTYPE html>
<html lang="en">
 <head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
   <link rel="stylesheet" href="style.css" />
   <title>prj</title>
 </head>
 <body>
<?php
include 'nawigacja.php';
?>
   <section class="content">
       <div class="add-set">
           <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
               <div class="word-box">
                   <p class="word-par">Wyszukaj zestaw</p>
               </div>
               <div class="word-box">
                    <input type="text" class="input-text" name="set-name">
                    <input type="submit" value="Wyślij" class="search-btn">
                </div>
			</form>
		</div>
           <?php

        if (isset($_POST['set-name'])) {
        $setname = $_POST['set-name'];
        $setname = strtolower($setname);
        
        $query = "SELECT sets.id, users.username, sets.set_name FROM users, sets WHERE
        users.id = sets.user_id AND (LOWER(sets.set_name) LIKE '%$setname%'
        OR LOWER(users.username) LIKE '%$setname%') GROUP BY users.username, sets.set_name";
        
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) > 0 ){
        echo "<div class='word-box'><table class='search-tbl'>";
        echo "<tr><td><b>Nazwa użytkownika</b></td><td><b>Nazwa zestawu</b></td></tr>";
            while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['username'] . "</td><td>" . $row['set_name'] . "</td><td>
            <form action='wyswietlzestaw.php' method='post'>
            <input type='hidden' name='user' value='".$row['username']."'>
            <input type='hidden' name='set' value='".$row['set_name']."'>
            <input type='submit' value='Wyświetl' class='search-btn'>
            </form></td>";
            if(isset($_SESSION["admin"])){
                echo "<td><form action='deleteset.php' method='post'>
            <input type='hidden' name='user' value='".$row['username']."'>
            <input type='hidden' name='set' value='".$row['set_name']."'>
            <input type='submit' value='Skasuj zestaw' class='search-btn'>
            </form></td>";
            }
            echo "</tr>";
        }
        echo "</div></table>";
        }
        else echo "0 results";
        }
        
           ?>
       </div>
   </section>
 </body>
</html>