<?php

session_start();
include("../../script/connect.php");
if(isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $sql = "INSERT INTO tts (level, id_user, selesai) VALUES (3, $id_user, 'true')";

    if ($conn->query($sql) === TRUE) {
        header("refresh:3;url=tts2.php");
        echo "Entri baru berhasil ditambahkan ke dalam tabel 'tts'";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Menutup koneksi database
    $conn->close();
} else {
    echo "Pengguna belum login.";
}
?>
