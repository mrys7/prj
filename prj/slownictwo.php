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
   <title>io2</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 </head>
 <body>
<?php
include 'nawigacja.php';
?>
   <section class="content">
           <?php

        if (isset($_POST['wordmodule'])) {
        $setname = $_POST['set'];
        $username = $_POST['user'];
        
        $query = "SELECT users.username, sets.word, sets.translation, sets.set_name FROM users, sets WHERE
        users.id = sets.user_id AND users.username = '$username' AND sets.set_name = '$setname'";
        
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) > 0 ){
        echo '<center><div class="word-box">
                    <table class="display-table">
                    <tr><p class="word-par"><td><b>Nazwa zestawu:</b></td><td>'.$setname.'</td></p></tr>
                    </table>
                    <table>
                    <tr><td><button class="add-set-btn" id="previous">Poprzednie</button></td>
                    <td><button class="add-set-btn" id="next">Następne</button></td></tr>
                    </table>
                </div></center><br>';
        $words = [];
        $translations= [];
        echo "<div class='word-box'><table class='search-tbl'>";
        echo "<tr><td><span class='word-target'></span></td></tr>";
        echo "<tr><td><span class='array-target'></span></td></tr>";
        echo "<tr><td><span class='meter-target'></span></td></tr>";
        echo "</div></table>";
            while($row = $result->fetch_assoc()) {
            array_push($words, $row['word']);
            array_push($translations, $row['translation']);
        }
        }
        else echo "0 results";
        }
           ?>
        <script>
        var count = 0;
        var words = <?php echo json_encode($words); ?>;
        var translations = <?php echo json_encode($translations); ?>;
        var words_and_translations = [];
        count = words.length;
        for(var i = 0; i < words.length; i++){
            words_and_translations.push(words[i]);
            words_and_translations.push(translations[i]);
        }
        </script>
       </div>
   </section>
 </body>
</html>
<script>
$(document).ready(function() {
    var s = "SŁOWO";
    var t = "TŁUMACZENIE";
    var meter = 1;
    var j = 0;
    $('.word-target').html(s);
    $('.array-target').html(words_and_translations[j]);
    $('.meter-target').html(meter+"/"+count);
    var previous_btn = $("#previous");
    var next_btn = $("#next");
    $(next_btn).click(function(e) {
        e.preventDefault();
        if(j>=0 && j< words_and_translations.length-1) j++;
        if(j%2==0){
            meter++;
            $('.word-target').html(s);
            $('.array-target').html(words_and_translations[j]);
            $('.meter-target').html(meter+"/"+count);
        }
        else {
            $('.word-target').html(t);
            $('.array-target').html(words_and_translations[j]);
            $('.meter-target').html(meter+"/"+count);
        }
        
    });
    $(previous_btn).click(function(e) {
        e.preventDefault();
        if(j>0 && j<= words_and_translations.length) j--;
        if(j%2==0){
            $('.word-target').html(s);
            $('.array-target').html(words_and_translations[j]);
            $('.meter-target').html(meter+"/"+count);
        }
        else {
            meter--;
            $('.word-target').html(t);
            $('.array-target').html(words_and_translations[j]);
            $('.meter-target').html(meter+"/"+count);
        }
        
    });
});
</script>

