<?php
include('config.php');
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
     <section class="content">
<?php
include 'nawigacja.php';
    if (isset($_POST['user'])) {
        $set = $_POST['set'];
        $user = $_POST['user'];
        $username = $_SESSION["username"];
        $id_query = "SELECT id FROM users WHERE username = '$username'";
        $result = mysqli_query($con, $id_query);
        if(mysqli_num_rows($result) > 0 ) $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        $query = "SELECT set_name, word, translation FROM sets WHERE user_id='$id' AND set_name='$set'";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) > 0 ){
        echo '
        <div class="add-set">
           <form action="editset.php" method="post" class="set">
                <div class="word-box">
                <p class="word-par">Nazwa zestawu</p>
                <input type="hidden" name="old-set-name" value="'.$set.'">
                <input type="text" class="input-text" name="set-name" value="'.$set.'">
				<button class="add-set-btn">Dodaj pole</button>
                <input type="submit" value="Wyślij" class="add-set-btn2">
                </div>
                <div class="word-box">
                </div>
                <div class="word-box">
                    <p class="word-par">Słowo</p>
                    <p class="word-par">Tłumaczenie</p>
                </div>';
            while($row = $result->fetch_assoc()) {
                echo '<div class="word-box"><input type="text" class="input-text" name="word[]" value="'.$row['word'].'"><input type="text" class="input-text" name="translation[]" value="'.$row['translation'].'"><button class="delete">Usun pole</button></div>';
            }
        }
    }
?>
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
            $(wrapper).append('<div class="word-box"><input class="input-text" type="text" name="word[]"><input type="text" class="input-text" name="translation[]"><button class="delete">Usun pole</button></div>'); //add input box
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