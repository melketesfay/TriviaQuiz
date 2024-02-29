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


// GEt total questions

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
            <h2>Test your PHP Knowledge</h2>
            <ul>
                <li>
                    <strong> Number of Questions: </strong><?php echo $NumberOfQuestions; ?>
                </li>
                <li>
                    <strong> Type: </strong>Multiple choice
                </li>
            </ul>

            <a href="questions.php?n=1">Start Quiz</a>
        </div>
    </main>

</body>

<?php include_once 'components/footer.php'; ?>

</html>