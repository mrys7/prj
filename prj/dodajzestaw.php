<?php
session_start();
if(!isset($_SESSION["username"])) header("Location: stronaglowna.php");
?>
<!DOCTYPE html>
<html lang="en">
 <head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
   <link rel="stylesheet" href="style.css" />
   <title>io2</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 </head>
 <body>
<?php
include 'nawigacja.php';
//else $_SESSION['ifadded'] = 0;
?>
   <section class="content">
       <?php
if(isset($_SESSION['ifadded']) && $_SESSION['ifadded'] == 1){
   echo '<div class="register_success">
        <p style="color: green;">Dodano zestaw</p>
        </div>';
        unset($_SESSION["ifadded"]);
}
elseif(isset($_SESSION['ifadded']) && $_SESSION['ifadded'] == 0){
    echo '<div class="register_success">
        <p style="color: red;">Błąd</p>
        </div>';
        unset($_SESSION["ifadded"]);
}

?>
       <div class="add-set">
           <form action="addset.php" method="post" class="set">
                <div class="word-box">
                <p class="word-par">Nazwa zestawu</p>
                <input type="text" class="input-text" name="set-name">
				<button class="add-set-btn">Dodaj pole</button>
                <input type="submit" value="Wyślij" class="add-set-btn2">
                </div>
                <div class="word-box">
                </div>
                <div class="word-box">
                    <p class="word-par">Słowo</p>
                    <p class="word-par">Tłumaczenie</p>
                </div>
			</form>
       </div>
   </section>
 </body>
</html>

<script>
    $(document).ready(function() {
    var max_fields = 30;
    var wrapper = $(".set");
    var add_button = $(".add-set-btn");
    var x = 1;
    $(add_button).click(function(e) {
        e.preventDefault();
        if (x < max_fields) {
            x++;
            $(wrapper).append('<div class="word-box"><input type="text" class="input-text" name="word[]"><input type="text" class="input-text" name="translation[]"><button class="delete">Usun pole</button></div>'); //add input box
        } else {
            alert('You Reached the limits')
        }
    });
    $(wrapper).on("click", ".delete", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
});
</script>