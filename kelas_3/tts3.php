<?php 
include("../component/head.php");
include("../component/navbar.php");
?>
    <div class="card card-selesai">
        <a href='index3.php'><= Back</a>
    </div>
<div class="container-level">
    <div class="card-kuis kuis-3">
        <div class="content">
            <img src="../asset/tts.png" alt="kartu">
            <label class="judul-kartu">Teka Teki Silang</label>
            <label for="succes"></label>
        </div>
    </div>

    <?php
        include("../script/connect.php");

        $id_user = $_SESSION['id_user']; // Mendapatkan id_user dari sesi login

        // Mengecek status selesai untuk level 1
        $sql1 = "SELECT selesai FROM tts WHERE id_user = '$id_user' AND level = 1";
        $result1 = $conn->query($sql1);
        $selesai1 = ($result1->num_rows > 0) ? $result1->fetch_assoc()['selesai'] : '';

        // Mengecek status selesai untuk level 2
        $sql2 = "SELECT selesai FROM tts WHERE id_user = '$id_user' AND level = 2";
        $result2 = $conn->query($sql2);
        $selesai2 = ($result2->num_rows > 0) ? $result2->fetch_assoc()['selesai'] : '';

        // Mengecek status selesai untuk level 3
        $sql3 = "SELECT selesai FROM tts WHERE id_user = '$id_user' AND level = 3";
        $result3 = $conn->query($sql3);
        $selesai3 = ($result3->num_rows > 0) ? $result3->fetch_assoc()['selesai'] : '';

        // Fungsi untuk membuat kartu level dengan mengecek status selesai
        function createCard($level, $selesai) {
            $hasCheck = ($selesai == 'true') ? '<label for="success"><i class="fa-solid fa-check"></i></label>' : '';
            return <<<HTML
                <a href="ttslvl$level.php">
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
include("../component/footer.php");
?>