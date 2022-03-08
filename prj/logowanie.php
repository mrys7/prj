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
   <title>io2</title>
 </head>
 <body>
<?php
include 'nawigacja.php';
?>
   <section class="content">
       <div class="login">
           <form action="authenticate.php" method="post">
				<input type="text" class="input-text" name="username" placeholder="Nazwa użytkownika" id="username" required>
				<input type="password" name="password" placeholder="Hasło" id="password" required>
				<input type="submit" class="logowanie-btn" value="Wyślij">
			</form>
       </div>
   </section>
 </body>
</html>