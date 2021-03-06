<?php
session_start();
if(isset($_SESSION["username"])) header("Location: profil.php");
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
       <div class="login">
           <form action="authenticate.php" method="post" id="pl">
				<input type="text" class="input-text" name="username" placeholder="Nazwa użytkownika" id="username" required>
				<input type="password" name="password" placeholder="Hasło" id="password" required>
				<input type="submit" class="logowanie-btn" value="Wyślij">
			</form>
			<form action="authenticate.php" method="post" id="en">
				<input type="text" class="input-text" name="username" placeholder="Username" id="username" required>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" class="logowanie-btn" value="Submit">
			</form>
       </div>
   </section>
 </body>
</html>
<script>
        var polish = document.getElementById('pl_click'),
    english = document.getElementById('en_click'),
    pl_txt = document.querySelectorAll('#pl'),
    en_txt = document.querySelectorAll('#en'),
    nb_pl = pl_txt.length,
    nb_en = en_txt.length;

polish.addEventListener('click', function() {
    langue(polish,english);
}, false);

english.addEventListener('click', function() {
    langue(english,polish);
}, false);

function langue(langueOn,langueOff){
    if (!langueOn.classList.contains('current_lang')) {
        langueOn.classList.toggle('current_lang');
        langueOff.classList.toggle('current_lang');
    }
    if(langueOn.innerHTML == 'PL'){
        afficher(pl_txt, nb_pl);
        cacher(en_txt, nb_en);
        polish.style.display = 'none';
        english.style.display = 'flex';
         localStorage.setItem('langON', 'en');
         localStorage.setItem('langOFF', 'pl');
    }
    else if(langueOn.innerHTML == 'EN'){
        afficher(en_txt, nb_en);
        cacher(pl_txt, nb_pl);
        english.style.display = 'none';
        polish.style.display = 'flex';
        localStorage.setItem('langON', 'pl');
        localStorage.setItem('langOFF', 'en');
    }
}

function afficher(txt,nb){
    for(var i=0; i < nb; i++){
        txt[i].style.display = 'flex';
    }
}
function cacher(txt,nb){
    for(var i=0; i < nb; i++){
        txt[i].style.display = 'none';
    }
}
function init(){
   if(!localStorage.getItem('langON')){
        langue(polish, english);
    }
    else{
        if(localStorage.getItem('langON') == 'en')
        langue(polish, english);
        else
        langue(english,polish);
    }
}
init();

</script>