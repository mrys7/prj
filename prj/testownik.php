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
        $query = "SELECT * FROM tests WHERE username='$user' AND setname='$set'";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) > 0 ){
        echo '
        <div class="add-set">
           <form action="testresult.php" method="post" class="set">
           <input type="hidden" name="user" value="'.$user.'">
           <input type="hidden" name="set" value="'.$set.'">
           <table class="test-tbl">';
           $x=0;
            while($row = $result->fetch_assoc()) {
                $x++;
                $ans1 = $row['answer1'];
                $ans2 = $row['answer2'];
                $ans3 = $row['answer3'];
                $ans4 = $row['answer4'];
                echo '<tr><td colspan="2" class="question">'.$row['question'].'</td></tr>';
                echo '<tr><td class="answer"><input type="radio" name="test'."$x".'" value="'.$ans1.'">'.$ans1.'</td>
                <td class="answer"><input type="radio" name="test'."$x".'" value="'.$ans2.'">'.$ans2.'</td></tr>';
                echo '<tr><td class="answer"><input type="radio" name="test'."$x".'" value="'.$ans3.'">'.$ans3.'</td>
                <td class="answer"><input type="radio" name="test'."$x".'" value="'.$ans4.'">'.$ans4.'</td></tr>';
            }
            echo '<tr><td colspan="2"><center><input type="submit" value="Wyślij" class="add-set-btn2"></center></td></tr>';
            echo '</table></form>';
        }
        else
            echo "<center><p>Ten zestaw nie ma stworzonego testu.</p></center>";
    }
?>
       </div>
   </section>
 </body>
</html>