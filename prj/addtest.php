<?php
include('config.php');

    if (isset($_POST['user'])) {
        $counter = 0;
        $setname = $_POST['set'];
        $username = $_POST['user'];
        $questions = $_POST['question'];
        $answers1 = $_POST['answer1'];
        $answers2 = $_POST['answer2'];
        $answers3 = $_POST['answer3'];
        $answers4 = $_POST['answer4'];
        foreach($questions as $q){
            $counter++;
            }
            for ($i = 0; $i < $counter; $i++) {
                $temp = $i+1;
                $index = "test"."$temp";
                if(isset($_POST[$index])) $goodanswer = $_POST[$index];
                else $goodanswer = "";
                switch ($goodanswer) {
                    case 1:
                        $goodanswer = $answers1[$i];
                        break;
                    case 2:
                        $goodanswer = $answers2[$i];
                        break;
                    case 3:
                        $goodanswer = $answers3[$i];
                        break;
                    case 4:
                        $goodanswer = $answers4[$i];
                        break;
                    }
                
                $query = "INSERT INTO tests (username, setname, question, answer1, answer2, answer3, answer4, goodanswer) 
                VALUES ('$username', '$setname', '$questions[$i]', '$answers1[$i]', '$answers2[$i]', '$answers3[$i]', '$answers4[$i]', '$goodanswer')";
                
                $result = mysqli_query($con, $query);
                if($result) {
                    $_SESSION['testadd'] = 1;
                }
                else {
                    $_SESSION['testadd'] = 0;
                }
                
            }
            header("Location: profil.php");
    }
?>