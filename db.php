<?php
$db_server = "localhost";
$db_username = "root";
$db_password = "root";
$db_name = "sej84_db";

// Create connection
$connection = new mysqli($db_server, $db_username, $db_password, $db_name);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

?>
