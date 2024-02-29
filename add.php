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



$sqlCreatePageTable = "SELECT Q.question, A.answer,A.value FROM questions AS Q, answers AS A WHERE A.questionID=Q.id";


$result = $dbConn->prepare($sqlCreatePageTable);

$result->execute();
$questions = $result->fetchAll(PDO::FETCH_ASSOC);



?>



<body>


    <header>
        <div class="container">
            <h1>TriviaQuiz</h1>
        </div>
    </header>

    <main>
        <div class="container">
            <h2>Add a Question</h2>
        </div>
    </main>

</body>

<?php include_once 'components/footer.php'; ?>

</html>