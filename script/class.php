<?php
session_start(); // Mulai session
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_user = $_SESSION['id_user']; // Ambil id_user dari session
    $kelas = $_POST['kelas']; // Ambil kelas dari form

    // Update kelas pada tabel user
    $sql = "UPDATE user SET kelas = '$kelas' WHERE id_user = '$id_user'";

    if ($conn->query($sql) === TRUE) {
        header("refresh:2;url=../login.php");
        echo "Kelas berhasil diperbarui"; // Redirect ke halaman lain setelah 2 detik
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
