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
include_once 'components/header.php';


// get total number of questions
$NumberOfQuestions = "SELECT * from questions";
$result = $dbConn->prepare($NumberOfQuestions);
$result->execute();

$NumberOfQuestions = $result->rowCount();



?>



<body>


    <header>
        <div class="container">
            <h1>TriviaQuiz</h1>
        </div>
    </header>

    <main>
        <div class="container">
            <h2>You have Finished Quiz</h2>
            <p>Final Score:</p> <?php echo $_SESSION['score'] . " out of " . $NumberOfQuestions; ?>

            <a href="questions.php?n=1">Repeat Quiz</a>
            <form action="auth/logout.php" method="get">
                <button type="submit">log out</button>
            </form>
        </div>
    </main>

</body>

<?php include_once 'components/footer.php';
unset($_SESSION['score']);
?>

</html>