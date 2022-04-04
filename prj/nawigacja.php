 <?php 
   echo '<nav class="navbar">
     <ul class="nav-links">
       <div class="menu">';

if(!isset($_SESSION["username"])) {
    
         echo '<li><a href="rejestracja.php">Rejestracja</a></li>
         <li><a href="logowanie.php">Logowanie</a></li>';

}
elseif(isset($_SESSION["username"])) {
        if(isset($_SESSION["admin"])) {
            echo '<li><a href="uzytkownicy.php">Wyszukaj użytkownika</a></li>';
        }
         echo '<li><a href="wyszukaj.php">Wyszukaj zestawu</a></li>
         <li><a href="profil.php">Profil</a></li>
         <li><a href="wyloguj.php">Wyloguj</a></li>';

}

       echo '</div>
     </ul>
   </nav>';
?>