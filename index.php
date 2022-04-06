<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captcha</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
session_start();

include 'captcha.php';

$answerType = generateRandomCaptcha();

?>

<form method="post" action="result.php">
    <div style='margin:15px'>
        <img src="imagecreation.php">
    </div>
    <input type=<?= $answerType ?> name="answer">
    <input type="submit" value="Submit">
</form>

<?php
if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
}
?>

<br>
<div class="tooltip">Hover here for captcha completion stats
    <span class="tooltiptext">
        <?php 
            if (file_get_contents('answers.txt')){
                $answers = file_get_contents('answers.txt');
                $answers = explode("|", $answers);
                $correctAnswer =  $answers[0];
                $incorrectAnswer = $answers[1];
            } else {
                $correctAnswer = 0;
                $incorrectAnswer = 0;
            }

            echo "Correct answers: ".$correctAnswer."<br>";
            echo "Incorrect answers: ".$incorrectAnswer."<br>";
        ?>
    </span>
</div>

</body>
</html>