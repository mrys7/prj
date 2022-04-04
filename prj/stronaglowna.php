<?php
session_start();
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
     <div class="whole">
<?php
include 'nawigacja.php';
?>
   <section class="content">
       <div class="text">
        <?php
        if(isset($_SESSION['blocked'])) {
                echo "<center><p style='font-size: 18px; color: red;'>Twoje konto zostało zablokowane</p></center>";
                unset($_SESSION["blocked"]);
            }
        ?>
        <p>Aplikacja do nauki języka obcego</p>
    </div>
   </section>
   </div>
 </body>
</html>