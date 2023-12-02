<?php
session_start();
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id_user, kelas FROM user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['username'] = $username;
        if ($row['kelas'] == null ) {
            header("Location: ../class.php");
        } elseif ($row["kelas"] == 1) {
            header("Location: ../kelas_1/index1.php");
        } elseif ($row["kelas"] == 2) {
            header("location: ../kelas_2/index2.php");
        } elseif ($row["kelas"] == 3) {
            header("location: ../kelas_3/index3.php");
        }
        exit();
    } else {
        header("refresh:2;url=../login.php");
        echo "Username atau password salah.";
    }
}

$conn->close();
?>
