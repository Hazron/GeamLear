<?php 
include("../component/head.php");
include("../component/navbar.php");
?>
<div class="container-kuis">
    <div class="title">
        <h1>Pilih Jenis Kuis Kelas 3</h1>
    </div>
    <a href="kartu/kartu3.php">
        <div class="card-kuis kuis-1">
            <div class="content">
                <img src="../asset/kartu.png" alt="kartu">
                <label class="judul-kartu">Kartu Lampu Kilat</label>
            </div>
        </div>
    </a>

    <a href="tts3.php">
        <div class="card-kuis kuis-3">
        <div class="content">
                <img src="../asset/tts.png" alt="kartu">
                <label class="judul-kartu">Teka Teki Silang</label>
            </div>
        </div>
    </a>
</div>

<?php 
include("../component/footer.php");
?>