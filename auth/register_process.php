<?php
require_once("../config.php");

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $role = $_POST["role"];
    $password = $_POST["password"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO auth (username, role, password) VALUES ('$username', '$role', '$hashedPassword')";

    if($conn->query($sql) === TRUE) {
        $_SESSION["notification"] = [
            'type' => 'primary',
    'message' => 'Registrasi berhasil!'
        ];
    } else {
        $_SESSION["notification"] = [
        'type' => 'danger',
    'message' => 'Registrasi gagal!' . mysqli_error($conn)
        ];
    } header("Location: login.php");
    exit();
}

$conn->close();
?>