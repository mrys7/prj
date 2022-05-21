<?php
session_start();
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
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
    $("#saved-sets").click(function(){
        $(".right-panel").load("zapisanezestawy.php");
    });
    $("#your-sets").click(function(){
        $(".right-panel").load("twojezestawy.php");
    });
    });
</script>
 </head>
 <body>
<?php
include 'nawigacja.php';
?>
   <section class="content">
        <div class="left-panel">
            <a href="dodajzestaw.php"><button class="menu-button">
                <span id="pl">Stwórz własny zestaw</span>
                <span id="en">Create your own set</span></button></a>
            <a href="#"><button class="menu-button" id="saved-sets">
                <span id="pl">Zapisane zestawy</span>
                <span id="en">Saved sets</span></button></a>
            <a href="#"><button class="menu-button" id="your-sets">
                <span id="pl">Twoje zestawy</span>
                <span id="en">Your sets</span></button></a>
        </div>
    
        <div class="right-panel">
            <?php
            if(isset($_SESSION['saveSet'])) {
                if($_SESSION['saveSet']==1){
                    echo "<p>Udało się dodać zestaw</p>";
                }
                if($_SESSION['saveSet']==0){
                    echo "<p>Wybrany zestaw już został zapisany</p>";
                }
                if($_SESSION['saveSet']==2){
                    echo "<p>Wykreślono wybrany set</p>";
                }
                unset($_SESSION["saveSet"]);
            }
            
            if(isset($_SESSION['testadd'])) {
                if($_SESSION['testadd']==1){
                    echo "<p>Udało się stworzyć test</p>";
                }
                if($_SESSION['testadd']==0){
                    echo "<p>Nie udało się stworzyć testu</p>";
                }
                unset($_SESSION["testadd"]);
            }
            
            if(isset($_SESSION['edited'])) {
                echo "<p>Zaktualizowano zestaw</p>";
                unset($_SESSION["edited"]);
            }
            
            if(isset($_SESSION['deleted'])) {
                echo "<p>Usunięto zestaw</p>";
                unset($_SESSION["deleted"]);
            }
            
            if(isset($_SESSION['deletedtest'])) {
                echo "<p>Usunięto test</p>";
                unset($_SESSION["deletedtest"]);
            }
            
            if(isset($_SESSION['testresults'])) {
                echo "<p>Zdobyte punkty z testu: ".$_SESSION['testresults']."</p>";
                unset($_SESSION['testresults']);
            }
            ?>
        </div>
   </section>
 </body>
</html>
<script src="lang.js"></script>