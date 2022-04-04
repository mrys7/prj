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
   <title>prj</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 </head>
 <body>
<?php
$username = $_POST['user'];
$setname = $_POST['set'];
include 'nawigacja.php';
?>
   <section class="content">
       <div class="add-test">
           <form action="addtest.php" method="post" class="test" id="test">
                <div class="test-box">
                <p class="test-par">Tworzenie testu dla zestawu <b><?php echo $setname ?></b></p>
				<button class="add-test-btn">Dodaj pole</button>
                <input type="hidden" name="user" value="<?php echo $username ?>">
                <input type="hidden" name="set" value="<?php echo $setname ?>">
                <input type="submit" value="Wyślij" class="add-test-btn2">
                </div>
                <div class="test-box">
                    <p class="test-par">Pytanie</p>
                    <p class="test-par">Odpowiedzi</p>
                </div>
			</form>
       </div>
   </section>
 </body>
</html>
<script>
    $(document).ready(function() {
    var max_fields = 30;
    var wrapper = $(".test");
    var add_button = $(".add-test-btn");
    var x = 0;
    $(add_button).click(function(e) {
        e.preventDefault();
        if (x < max_fields) {
            x++;
            
            $(wrapper).append('<div class="test-box"><input type="text" class="question" name="question[]"><input type="radio" name="test'+x+'" value="1"><input type="text" class="input-text" name="answer1[]"><input type="radio" name="test'+x+'" value="2"><input type="text" class="input-text" name="answer2[]"><input type="radio" name="test'+x+'" value="3"><input type="text" class="input-text" name="answer3[]"><input type="radio" name="test'+x+'" value="4"><input type="text" class="input-text" name="answer4[]"><button class="delete">Usun pole</button></div>');
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