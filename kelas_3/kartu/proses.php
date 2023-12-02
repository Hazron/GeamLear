<?php
session_start();
include("../../script/connect.php");

if(isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    $score = $_GET['score'];
    $level = $_GET['level'];
    
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $sql = "INSERT INTO kartu (level, id_user, selesai, score) VALUES (?, ?, 'true', ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error dalam persiapan query: " . $conn->error);
    }

    $stmt->bind_param("iii", $level, $id_user, $score);
    
    if ($stmt->execute() === TRUE) {
        header("refresh:3;url=kartu3.php");
        echo "Entri baru berhasil ditambahkan ke dalam tabel 'kartu'";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Pengguna belum login.";
}
?>
