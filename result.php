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


session_start();
$answer = $_SESSION['answer'];
$userAnswer = $_POST['answer'];

if ($userAnswer == $answer) {
    echo 'Correct answer!';
    $correctAnswer++;
    file_put_contents('answers.txt', $correctAnswer . "|" . $incorrectAnswer);
    $_SESSION['message'] = null;
} else {
    echo 'Captcha wrong!';
    $incorrectAnswer++;
    file_put_contents('answers.txt', $correctAnswer . "|" . $incorrectAnswer);
    $_SESSION['message'] = 'Incorrect captcha answer. Please try again. <br>';

    //write some information to the log file from the incorrect answer
    $log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL.
    "Incorrect captcha answer".PHP_EOL.
    "User answer: ".$userAnswer . " - Correct answer: ".$answer.PHP_EOL.
    "-------------------------".PHP_EOL;
    //Save string to log, use FILE_APPEND to append.
    file_put_contents('./logs/log_'.date("j.n.Y").'.log', $log, FILE_APPEND);

    //redirect to the home page
        header("Location:".$_SERVER['HTTP_REFERER']);
        die;
}