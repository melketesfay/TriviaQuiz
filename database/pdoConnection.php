<?php




$dbName = getenv('MYSQL_DATABASE');

$dbUser = getenv('MYSQL_USER');
$dbPassword = getenv('MYSQL_PASSWORD');
$dbHost = getenv('DB_HOST');

try {
    // Create a connection to the database
    $dbConn = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPassword, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $dbConn->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
    // echo "connection succesful";
} catch (PDOException $e) {
    die("Connection Error: " . $e->getMessage()); // display error message
}


$query = "CREATE TABLE IF NOT EXISTS users (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR (255),password VARCHAR (255),email VARCHAR (255) )";


$queryR = $dbConn->prepare($query);
$queryR->execute();



// // create questions
// $query = "CREATE TABLE IF NOT EXISTS questions (id INT AUTO_INCREMENT PRIMARY KEY, question TEXT,field varchar(255),status tinyint)";

// $queryR = $dbConn->prepare($query);
// $queryR->execute();


// //create answers
// $query = "CREATE TABLE IF NOT EXISTS answers (id INT AUTO_INCREMENT PRIMARY KEY, answer TEXT,questionID int,value tinyint)";
// $queryR = $dbConn->prepare($query);
// $queryR->execute();