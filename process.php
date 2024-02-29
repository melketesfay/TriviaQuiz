<?php

if (session_status() === PHP_SESSION_NONE) {
    // Starte die Session
    session_start();
}
if (!isset($_SESSION['username'])) {
    header('location: index.php');
    return false;
}
include_once "database/pdoConnection.php";


// check if result is set

if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

if (isset($_GET['submit']) && isset($_GET['choice'])) {
    $number = (int)$_GET['number'];
    $selected_Answer = $_GET['choice'];

    $next = 1 + $number;

    // Get the total number of questions
    $NumberOfQuestions = "SELECT * from questions";
    $result = $dbConn->prepare($NumberOfQuestions);
    $result->execute();

    $NumberOfQuestions = $result->rowCount();


    // Get the right answer
    $correctAnswer = "SELECT * from answers where questionID =$number and value = 1";

    $result = $dbConn->prepare($correctAnswer);
    $result->execute();
    $correctAnswer = $result->fetch(PDO::FETCH_ASSOC);

    // set correct choice

    $correctAnswer = $correctAnswer['id'];

    // Compare user choice and the correct answer

    if ($selected_Answer == $correctAnswer) {
        $_SESSION['score']++;
    }



    // check if it is the last question to redirect to the results page
    if ($number == $NumberOfQuestions) {
        header("Location: results.php");
    } else {
        header("Location: questions.php?n=" . $next);
    }
    var_dump($correctAnswer, $selected_Answer);
} elseif (!isset($_GET['choice'])) {
    // if (isset($_GET['n']) &&  (int)$_GET['n'] == 1) {
    //     header("Location: questions.php?n=1");
    //     return;
    // } else {

    //     header("Location: questions.php?n=1");
    // }
    $uri = $_SERVER['REQUEST_URI'];

    $arr = (explode("=", $uri));
    $pageNum = $arr[2];


    header("Location: questions.php?n=" . $pageNum);
}
