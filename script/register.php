<?php 
include("connect.php");

$username = $_POST['username'];
$password = $_POST['password'];
$konfirmasi = $_POST['konfirmasi'];

if ($password !== $konfirmasi) {
    header("refresh:2;url=../register.php");
    echo "Konfirmasi password tidak sama dengan password.";
    exit();
} else {
    $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("refresh:3;url=../login.php");
        echo "Pendaftaran berhasil";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
