<?php
if (session_status() === PHP_SESSION_NONE) {
    // Starte die Session
    session_start();
}
// $path = "/database/pdoConnection.php";
// include $_SERVER['DOCUMENT_ROOT'] . $path;

// include_once '../database/pdoConnection.php';

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>MathQuiz</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://kit.fontawesome.com/8e475b60fe.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>