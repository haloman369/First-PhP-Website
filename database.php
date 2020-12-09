<?php


$username = 'ddd9';
$password = 'Southpark2!';
$hostname = 'sql1.njit.edu';

$dsn = "mysql:host=$hostname;dbname=$username";

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    //include('../errors/database_error.php');
    exit();
}
?>