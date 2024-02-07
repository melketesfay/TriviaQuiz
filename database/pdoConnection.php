<?php




$dbName = getenv('MYSQL_DATABASE');

$dbUser = getenv('MYSQL_USER');
$dbPassword = getenv('MYSQL_PASSWORD');
$dbHost = getenv('DB_HOST');

try {
    // Create a connection to the database
    $dbConn = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPassword);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $dbConn->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
    // echo "connection succesful";
} catch (PDOException $e) {
    die("Connection Error: " . $e->getMessage()); // display error message
}


$query = "CREATE TABLE IF NOT EXISTS users (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR (255),password VARCHAR (255))";
$query = "INSERT INTO users (name,password) VALUES ('user6','user6-pass')";

// &query = "SELECT Q.question, A.answer, c.CustomerName
// FROM Customers AS c, Orders AS o
// WHERE c.CustomerName='Around the Horn' AND c.CustomerID=o.CustomerID";

$query = "SELECT Q.question, A.answer
FROM questions AS Q, answers AS A
WHERE Q.id=14 AND (A.question_id=14 AND A.is_correct =1)";

// $dbConn->exec($query);





try {
    // Select question 14 and the correct answer
    $sqlCreatePageTable = "SELECT Q.question, A.answer
    FROM questions AS Q, answers AS A
    WHERE Q.id=14 AND (A.question_id=14 AND A.is_correct =1)";

    //Slecet multiple questions and their corresponding answers
    $sqlCreatePageTable = "SELECT Q.question, A.answer
    FROM questions AS Q, answers AS A
    WHERE Q.id IN(2,4,6,8,10) AND A.question_id=Q.id  AND A.is_correct=1";


    // Select multiple questions and their corresponding answers with INNER JOIN
    $sqlCreatePageTable = "SELECT * FROM questions INNER JOIN answers ON questions.id = answers.question_id WHERE answers.is_correct=1";

    // Select multiple questions and their corresponding answers with RIGHT JOIN

    $sqlCreatePageTable = "SELECT question ,answers.answer FROM questions INNER JOIN answers ON questions.id = answers.question_id";




    $result = $dbConn->prepare($sqlCreatePageTable);

    // exec führt das SQL statment oben aus.
    $result->execute();


    $resultfinl = $result->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {

    echo $e->getMessage();
}
