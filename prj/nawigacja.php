 <?php
   echo '<nav class="navbar">
     <ul class="nav-links">
       <div class="menu">';

if(!isset($_SESSION["username"])) {
    
         echo '<li><a href="rejestracja.php">';
         echo '<span id="pl">Rejestracja</span>
         <span id="en">Register</span>';
         echo '</a></li>
         <li><a href="logowanie.php">';
         echo '<span id="pl">Logowanie</span>
         <span id="en">Log in</span>';
         echo '</a></li>
         <li><a href="instrukcja.php">';
          echo '<span id="pl">Instrukcja</span>
         <span id="en">Instruction</span>';
         echo '</a></li>';
         

}
elseif(isset($_SESSION["username"])) {
        if(isset($_SESSION["admin"])) {
            echo '<li><a href="uzytkownicy.php">';
            echo '<span id="pl">Wyszukaj użytkownika</span>
            <span id="en">Search user</span>';
            echo '</a></li>';
        }
         echo '<li><a href="wyszukaj.php">';
         echo '<span id="pl">Wyszukaj zestawu</span>
         <span id="en">Search set</span>';
         echo '</a></li>
         <li><a href="profil.php">';
         echo '<span id="pl">Profil</span>
         <span id="en">Profile</span>';
         echo '</a></li>
         <li><a href="wyloguj.php">';
         echo '<span id="pl">Wyloguj</span>
         <span id="en">Log out</span>';
         echo '</a></li>';
}
       echo '<div class="lang"><li><a href="#" id="pl_click">PL';
       echo '</a><a href="#" id="en_click">EN</a></li></div></div>';
     echo '</ul>
   </nav>';
?>
