<?php
session_start();
require_once("../config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM pelanggan WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row["password"])) {
            $_SESSION["username"] = $username;
            $_SESSION["nama"] = $name;
            $_SESSION["pelanggan_id"] = $row["pelanggan_id"];

            $_SESSION['notification'] = [
               'type' => 'primary',
               'message' => 'Selamat Datang Kembali'
           ];
           header("Location: ../dashboard-user.php");
           exit();

        } else {
            $_SESSION["notification"] = [
                'type' => 'danger',
                'message' => 'Password salah!'
            ];
        }
} else {
        $_SESSION["notification"] = [
            'type' => 'danger',
            'message' => 'Username salah!'
        ];
    }
    header("Location: login.php");
    exit();
}
$conn->close();
?>