<?php
session_start();

// Cek apakah pengguna sudah login atau belum
if(!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit();
}

// Sertakan file koneksi ke database
include("script/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $nama_lengkap = $_POST['nama_lengkap'];
    $nisn = $_POST['nisn'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $kelas = $_POST['kelas'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $asal_provinsi = $_POST['asal_provinsi'];

    // Ambil id pengguna yang sedang login
    $id_user = $_SESSION['id_user'];

    // Query untuk melakukan update data ke dalam database
    $sql = "UPDATE user SET 
            nama_lengkap = '$nama_lengkap', 
            nisn = '$nisn', 
            tanggal_lahir = '$tanggal_lahir', 
            kelas = '$kelas', 
            asal_sekolah = '$asal_sekolah', 
            asal_provinsi = '$asal_provinsi' 
            WHERE id_user = $id_user";

    if ($conn->query($sql) === TRUE) {
        header("refresh:3;url=datadiri.php");
        echo "Update Data Diri berhasil";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
