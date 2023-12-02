<?php 
session_start();
include ("../../script/connect.php");

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/f4046ea512.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style.css">
    <title>GeamaLear</title>
</head>
<body>
<div class="navbar">
    <img src="../../asset/skleton.png" alt="skleton" class="skleton">
    <h3 style="color : white;"><?php echo $_SESSION['id_user'];?></h3>
    <div class="btn-group">
    <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        
    </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Data Diri</a></li>
            <li><a class="dropdown-item" href="../../script/logout.php">Logout</a></li>
        </ul>
    </div>
</div>

    <div class="card card-selesai">
        <a href='../index2.php'><= Back</a>
    </div>
<div class="container-level">
    <div class="card-kuis kuis-3">
        <div class="content">
            <img src="../../asset/kartu.png" alt="kartu">
            <label class="judul-kartu">Kartu Lampu Kilat</label>
            <label for="succes"></label>
        </div>
    </div>

    <?php
        include("../../script/connect.php");

        $id_user = $_SESSION['id_user']; // Mendapatkan id_user dari sesi login

        // Mengecek status selesai untuk level 1
        $sql1 = "SELECT selesai FROM kartu WHERE id_user = '$id_user' AND level = 1";
        $result1 = $conn->query($sql1);
        $selesai1 = ($result1->num_rows > 0) ? $result1->fetch_assoc()['selesai'] : '';

        // Mengecek status selesai untuk level 2
        $sql2 = "SELECT selesai FROM kartu WHERE id_user = '$id_user' AND level = 2";
        $result2 = $conn->query($sql2);
        $selesai2 = ($result2->num_rows > 0) ? $result2->fetch_assoc()['selesai'] : '';

        // Mengecek status selesai untuk level 3
        $sql3 = "SELECT selesai FROM kartu WHERE id_user = '$id_user' AND level = 3";
        $result3 = $conn->query($sql3);
        $selesai3 = ($result3->num_rows > 0) ? $result3->fetch_assoc()['selesai'] : '';

        // Fungsi untuk membuat kartu level dengan mengecek status selesai
        function createCard($level, $selesai) {
            $hasCheck = ($selesai == 'true') ? '<label for="success"><i class="fa-solid fa-check"></i></label>' : '';
            return <<<HTML
                <a href="krt2lvl$level.php">
                    <div class="card-level level$level">
                        <label class="judul-kartu">Level $level</label>
                        $hasCheck
                    </div>
                </a>
            HTML;
        }

        // Membuat kartu untuk masing-masing level
        echo createCard(1, $selesai1);
        echo createCard(2, $selesai2);
        echo createCard(3, $selesai3);

        $conn->close();
        ?>

</div>

<?php 
include("../../component/footer.php");
?>