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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login | GeamaLear</title>
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
            <li><a class="dropdown-item" href="datadiri.php">Data Diri</a></li>
            <li><a class="dropdown-item" href="script/logout.php">Logout</a></li>
        </ul>
    </div>
</div>
<div class="container-kuis">
    <div class="title">
        <h1>Pilih Jenis Kuis Kelas <?php echo $kelas; ?></h1>
    </div>
    <a href="kartu/kelas<?php echo $kelas; ?>/kartu<?php echo $kelas; ?>.php">
        <div class="card-kuis kuis-1">
            <div class="content">
                <img src="asset/kartu.png" alt="kartu">
                <label class="judul-kartu">Kartu Lampu Kilat</label>
            </div>
        </div>
    </a>

    <a href="tts<?php echo $kelas; ?>/tts<?php echo $kelas; ?>.php">
        <div class="card-kuis kuis-3">
            <div class="content">
                <img src="asset/tts.png" alt="kartu">
                <label class="judul-kartu">Teka Teki Silang</label>
            </div>
        </div>
    </a>
</div>

<?php 
include("component/footer.php");
?>