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








// set question Number and get the question
$number = (int) $_GET['n'];
$question = "SELECT * from questions where id =$number";
$result = $dbConn->prepare($question);
$result->execute();
$question = $result->fetch(PDO::FETCH_ASSOC);



//get the corresponding answers
$answer = "SELECT * from answers where questionID =:questionid";

$result = $dbConn->prepare($answer);

$result->bindParam(':questionid', $number);
$result->execute();
$answer = $result->fetchAll(PDO::FETCH_ASSOC);

var_dump($answer);


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
            <div>
                <h2>Question <?php echo $number . " of " . $NumberOfQuestions; ?></h2>
            </div>
            <p><?php echo $question['question']; ?></p>

            <form action="process.php" method="get">

                <ul>

                    <?php foreach ($answer as $key => $value) : ?>

                        <li>
                            <input type="radio" name="choice" value="<?php echo $value['id'] ?>"> <?php echo $value['answer'] ?>
                        </li>
                    <?php endforeach; ?>

                </ul>

                <input type="submit" value="submit" name="submit">

                <input type="hidden" name="number" value="<?php echo $number; ?>">
            </form>
        </div>
    </main>

</body>

<?php include_once 'components/footer.php'; ?>

</html>