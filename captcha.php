<?php

function generateRandomCaptcha(){

    // decide which type of captcha to generate
    $captcha_type = rand(1, 2);

    // generate the captcha
    switch ($captcha_type) {
        case 1:
            $answerType = generateCaptchaString();
            return $answerType;
            break;
        case 2:
            $answerType = generateCaptchaMath();
            return $answerType;
            break;
    }

}

function generateCaptchaString(){
    // generate a random string of 5 characters
    $captcha = '';
    $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
    $max = count($characters) - 1;
    for ($i = 0; $i < 5; $i++) {
        $rand = rand(0, $max);
        $captcha .= $characters[$rand];
    }

    // store the captcha in the session
    $_SESSION['captcha'] = $captcha;

    // store the answer in the session
    $_SESSION['answer'] = $captcha;

    // return the answer type
    return "input";
}

function generateCaptchaMath(){
    // generate a random number
    $firstNum = rand(10, 99);
    $secondNum = rand(10, 99);

    // decide which operator to use
    $operators = array('+', '-');
    $operator = $operators[rand(0, count($operators)-1)];

    // generate the answer
    $answer = 0;
    switch ($operator) {
        case '+':
            $answer = $firstNum + $secondNum;
            break;
        case '-':
            $answer = $firstNum - $secondNum;
            break;
        case '*':
            $answer = $firstNum * $secondNum;
            break;
    }

    // store the answer in the session
    $_SESSION['answer'] = $answer;

    // store the captcha in the session
    $_SESSION['captcha'] = $firstNum . ' ' . $operator . ' ' . $secondNum;

    // return the answer type
    return "number";
}