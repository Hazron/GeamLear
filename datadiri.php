<?php 
session_start();

if(isset($_SESSION['id_user'])) {
    include("script/connect.php");
    $kelas = '';
    // Mendapatkan kelas dari database untuk pengguna yang login
    $id_user = $_SESSION['id_user'];
    $sql = "SELECT kelas FROM user";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $kelas = $row['kelas'];
    } else {
        $kelas = 3;
    }
} else {
    $kelas = 3;
}

include ("script/connect.php");

if(!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit();
}
// Inisialisasi variabel dengan nilai default
$nama_lengkap = '';
$nisn = '';
$tanggal_lahir = '';
$kelas = '';
$asal_sekolah = '';
$asal_provinsi = '';

// Jika pengguna sudah login, ambil data dari database
if(isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];

    // Query untuk mendapatkan data pengguna dari database
    $sql = "SELECT * FROM user WHERE id_user = $id_user";
    $result = $conn->query($sql);

    // Jika data ditemukan, isi nilai-nilai default
    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();

        $nama_lengkap = $userData['nama_lengkap'] ?? '';
        $nisn = $userData['nisn'] ?? '';
        $tanggal_lahir = $userData['tanggal_lahir'] ?? '';
        $kelas = $userData['kelas'] ?? '';
        $asal_sekolah = $userData['asal_sekolah'] ?? '';
        $asal_provinsi = $userData['asal_provinsi'] ?? '';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>


    </style>
    <title>Data Diri | GeamaLear</title>
</head>
<body>
<div class="navbar">
    <img src="asset/skleton.png" alt="skleton" class="skleton">
    <h3 style="color : white;">Halo <?php echo $_SESSION['username']; ?></h3>
    <div class="btn-group">
    <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    <div style="width: 10px; height: 40px; position: relative">
        <div style="width: 10px; height: 8px; left: 0px; top: 0px; position: absolute; background: white; border-radius: 9999px"></div>
        <div style="width: 10px; height: 8px; left: -0px; top: 32px; position: absolute; background: white; border-radius: 9999px"></div>
        <div style="width: 10px; height: 8px; left: -0px; top: 16px; position: absolute; background: white; border-radius: 9999px"></div>
    </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="kelas_<?php echo $kelas?>/index<?php echo $kelas?>.php">Kuis Anda</a></li>
            <li><a class="dropdown-item" href="script/logout.php">Logout</a></li>
        </ul>
    </div>
</div>
<div class="container-kuis">
    <div class="judul-datadiri">
        <h1>Lengkapi Data Diri Anda</h1>
    </div>
    <form action="edit.php" method="post">
        <div class="formdiri">
            <div class="form1">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="input_diri" value="<?php echo $nama_lengkap; ?>">
    
                <label for="NISN">NISN</label>
                <input type="text" name="nisn" class="input_diri" value="<?php echo $nisn; ?>">
    
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="input_diri" value="<?php echo $tanggal_lahir; ?>">
            </div>
            <div class="form2">
                <label for="kelas">Kelas</label>
                <input type="text" name="kelas" class="input_diri" value="<?php echo $kelas; ?>">
    
                <label for="asal_sekolah">Asal Sekolah</label>
                <input type="text" name="asal_sekolah" class="input_diri" value="<?php echo $asal_sekolah; ?>">
    
                <label for="asal_provinsi">Asal Provinsi</label>
                <input type="text" name="asal_provinsi" class="input_diri" value="<?php echo $asal_provinsi; ?>">
            </div>
            <div class="form3">
                <button class="done" type="submit">SELESAI</button>
            </div>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>