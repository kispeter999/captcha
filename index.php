<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captcha</title>
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

</body>
</html>