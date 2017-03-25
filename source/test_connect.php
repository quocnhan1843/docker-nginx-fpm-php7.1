<?php
/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=books;host=10.0.2.2';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password);
    echo "Success";
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>