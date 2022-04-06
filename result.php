<?php

session_start();
$answer = $_SESSION['answer'];
$user_answer = $_POST['answer'];

if ($user_answer == $answer) {
    echo 'Correct!';
} else {
    echo 'Captcha wrong!';
}