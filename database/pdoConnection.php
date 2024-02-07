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
$query = "INSERT INTO users (name,password) VALUES ('user2','user2-pass')";


// $dbConn->exec($query);





try {
    // Hier definieren wir das SQL statement.
    $sqlCreatePageTable = "SELECT * FROM users";
    $result = $dbConn->prepare($sqlCreatePageTable);

    // exec führt das SQL statment oben aus.
    $result->execute();


    $resultfinl = $result->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {

    echo $e->getMessage();
}



// echo "<pre>";
// var_dump($resultfinl);




// echo "</pre>";
