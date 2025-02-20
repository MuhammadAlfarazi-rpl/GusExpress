<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "gusexpress";

$conn = mysqli_connect($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Database Gagal terkoneksi: " .  $conn->connect_error);
}

?>