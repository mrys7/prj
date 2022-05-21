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
?>
   <section class="content">
           <?php

        if (isset($_POST['user'])) {
        $setname = $_POST['set'];
        $username = $_POST['user'];
        
        $query = "SELECT users.username, sets.word, sets.translation, sets.set_name FROM users, sets WHERE
        users.id = sets.user_id AND users.username = '$username' AND sets.set_name = '$setname'";
        
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) > 0 ){
        echo '<center><div class="word-box">
                    <table class="display-table">
                    <tr><p class="word-par"><td><b><span id ="pl">Nazwa zestawu:</span>
                    <span id ="en">Set name:</span></b></td><td>'.$setname.'</td></p></tr>
                    </table>
                    <table>
                    <tr><td><form action="saveset.php" method="post">
                    <input type="hidden" name="user" value="'.$username.'">
                    <input type="hidden" name="set" value="'.$setname.'">
                    <input type="submit" name="saveSet" value="Zapisz zestaw" class="add-set-btn" id="pl">
                    <input type="submit" name="saveSet" value="Save set" class="add-set-btn" id="en">
                    </form></td>
                    <td><form action="slownictwo.php" method="post">
                    <input type="hidden" name="user" value="'.$username.'">
                    <input type="hidden" name="set" value="'.$setname.'">
                    <input type="submit" name="wordmodule" value="Moduł słówek" class="add-set-btn" id="pl">
                    <input type="submit" name="wordmodule" value="Vocabulary" class="add-set-btn" id="en">
                    </form></td>
                    <td><form action="testownik.php" method="post">
                    <input type="hidden" name="user" value="'.$username.'">
                    <input type="hidden" name="set" value="'.$setname.'">
                    <input type="submit" name="testmodule" value="Moduł testu" class="add-set-btn" id="pl">
                    <input type="submit" name="testmodule" value="Test module" class="add-set-btn" id="en">
                    </form></td>
                    </tr></table>
                </div></center><br>';
        echo "<div class='word-box'><table class='search-tbl'>";
        echo "<tr><td><b><span id='pl'>Słowo</span><span id='en'>Word</span></b></td><td><b>
        <span id='pl'>Tłumaczenie</span><span id='en'>Translation</span></b></td></tr>";
            while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['word'] . "</td><td>" . $row['translation'] . "</td></tr>";
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