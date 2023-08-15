<?php
require_once 'pdoconfig.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
   // echo "Connected to $database at $servername successfully.";
} catch (PDOException $pe) {
    die("Could not connect to the database $database :" . $pe->getMessage());
}

?>