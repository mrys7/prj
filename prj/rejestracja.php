<?php
session_start();
if(isset($_SESSION["username"])) header("Location: stronaglowna.php");
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
if(isset($_SESSION["register"]) && $_SESSION["register"] == 1){
   echo '<div class="register_success">
        <p style="color: green;">Rejestracja pomyślna</p>
        </div>';
        //session_unset();
        unset($_SESSION["register"]);
}
elseif(isset($_SESSION["register"]) && $_SESSION["register"] == 0){
    echo '<div class="register_success">
        <p style="color: red;">Błąd</p>
        </div>';
        //session_unset();
        unset($_SESSION["register"]);
}

?>
       <div class="login">
           <form action="rAuthenticate.php" method="post">
				<input type="text" class="input-text" name="username" placeholder="Nazwa użytkownika" id="username" required>
				<input type="password" name="password" placeholder="Hasło" id="password" required>
				<input type="password" name="password2" placeholder="Powtórz hasło" id="password2" required>
				<input type="email" name="email" placeholder="email" id="email" required>
				<input type="submit" class="rejestracja-btn" value="Wyślij">
			</form>
       </div>
   </section>
 </body>
</html>