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

echo "<pre>";

var_dump($questions);



echo "</pre>";

// change form action to results when quiz has finished or user stops
function GoToResults()
{
    echo htmlspecialchars($_SERVER["PHP_SELF"]);
}

?>



<body>


    <?php foreach ($questions as $key => $value) :  ?>

        <h2><?= $key; ?></h2>
        <h3><?= $value['question']; ?></h3>




    <?php endforeach; ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">

    </form>


    <!-- 
    <p>
        `sum_(i=1)^n i^3=((n(n+1))/2)^2`
    </p>
    <h1>`[[sin(alpha),cos(beta),0],[-cos(alpha),sin(beta),0],[0,0,1]]`</h1> -->

</body>

<?php include_once 'components/footer.php'; ?>

</html>