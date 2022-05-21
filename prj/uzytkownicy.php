<?php
include('config.php');
if(!isset($_SESSION["username"])) header("Location: logowanie.php");
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
//=1;
?>
   <section class="content">
       <?php
        if(isset($_SESSION['deleteduser'])) {
                echo "<p>Usunięto użytkownika</p>";
                unset($_SESSION["deleteduser"]);
            }
       ?>
       <div class="add-set">
           <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
               <div class="word-box">
                   <p class="word-par"><span id="pl">Wyszukaj użytkownika</span>
                   <span id="en">Search user</span></p>
               </div>
               <div class="word-box">
                    <input type="text" class="input-text" name="set-name">
                    <input type="submit" value="Wyślij" class="search-btn" id="pl">
                    <input type="submit" value="Send" class="search-btn" id="en">
                </div>
			</form>
		</div>
           <?php

        if (isset($_POST['set-name'])) {
        $setname = $_POST['set-name'];
        $setname = strtolower($setname);
        
        $query = "SELECT * FROM users WHERE
        LOWER(username) LIKE '%$setname%'";
        
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) > 0 ){
        echo "<div class='word-box'><table class='search-tbl'>";
        echo "<tr><td></td><td><b><span id='pl'>Nazwa użytkownika</span>
        <span id='en'>Username</span></b></td><td><b>Email</b></td><td><b><span id='pl'>Możliwość logowania</span>
        <span id='en'>Ability to log in</span></b></td></tr>";
            while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['id'] . "</td><td>" . $row['username'] . "</td><td>" . $row['email'] . "</td>";
            if($row['login'] == 1) echo "<td>NIE</td>";
            else echo "<td>TAK</td>";
            if(isset($_SESSION["admin"])){
                echo "<td><form action='deleteuser.php' method='post'>
            <input type='hidden' name='userid' value='".$row['id']."'>
            <input type='hidden' name='username' value='".$row['username']."'>
            <input type='submit' value='Usuń użytkownika' class='search-btn' id='pl'>
            <input type='submit' value='Delete user' class='search-btn' id='en'>
            </form></td>";
            echo "<td><form action='blockuser.php' method='post'>
            <input type='hidden' name='userid' value='".$row['id']."'>
            <input type='hidden' name='username' value='".$row['username']."'>
            <input type='submit' value='Zablokuj/Odblokuj' class='search-btn' id='pl'>
            <input type='submit' value='Block/Unblock' class='search-btn' id='en'>
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
<script src="lang.js"></script>