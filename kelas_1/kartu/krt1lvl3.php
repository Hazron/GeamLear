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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style.css">
    <title>GeamaLear</title>
</head>
<body>
<div class="navbar">
    <img src="../../asset/skleton.png" alt="skleton" class="skleton">
    <h3 style="color : white;"><?php echo $_SESSION['username'];?></h3>
    <div class="btn-group">
    <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    <div style="width: 10px; height: 40px; position: relative">
        <div style="width: 10px; height: 8px; left: 0px; top: 0px; position: absolute; background: white; border-radius: 9999px"></div>
        <div style="width: 10px; height: 8px; left: -0px; top: 32px; position: absolute; background: white; border-radius: 9999px"></div>
        <div style="width: 10px; height: 8px; left: -0px; top: 16px; position: absolute; background: white; border-radius: 9999px"></div>
    </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Data Diri</a></li>
            <li><a class="dropdown-item" href="../../script/logout.php">Logout</a></li>
        </ul>
    </div>
</div>

    <div class="card card-selesai">
        <a href='kartu3.php'><= Back</a>
    </div>

    <div class="card-soal">
    <label for="soal"> 
        3.163 = .... 3000 + 160 + 3
    </label>
  </div>
  <div class="tombol-container">
      <button class="btn-benar">Benar</button>
      <button class="btn-salah">Salah</button>
  </div>

  <script>
const questions = [
  {
    img: ``,
    question: `Refal pergi ke mall pukul 2 siang. Pulangnya pukul 7 malam. Berapa lama Refal di mall??. Jawabannya = 3 Jam (Benar atau Salah)`,
    correctAnswer: "Salah",
    explanation: "",
  },
  {
    img: ``,
    question: "Urutkan bilangan berikut.<br> 45,78, 39, 56, 41, 94. <br>Jawabannya = 39, 41, 45, 56, 78, 94 (Benar atau Salah) ",
    correctAnswer: "Benar",
    explanation: "",
  },
  {
    img: `<img src="../../asset/roda.png" alt="soal2" class="img-questions">`,
    question: "Benda tersebut adalah … memiliki … sisi. Jawabannya = Lingkaran, tak terhitung (Benar atau Salah) ",
    correctAnswer: "Salah",
    explanation: "",
  },
  {
    img: `<img src="../../asset/cuci tangan.png" alt="soal2" class="img-questions">`,
    question: `Mencuci tangan dilakukan sebentar atau lama…??. Jawabannya = Sebentar (Benar atau Salah)`,
    correctAnswer: "Benar",
    explanation: "",
  },
  {
    img: `<img src="../../asset/bngdatar.png" alt="soal2" class="img-questions">`,
    question: `Yang termasuk segiempat adalah… Jawabannya = a dan d (Benar atau Salah) `,
    correctAnswer: "Benar",
    explanation: "",
  },
  {
    img: ``,
    question: `37 - 23 + 14 + 7 = 35 (Benar atau Salah) `,
    correctAnswer: "Benar",
    explanation: "",
  },
  
  // Jika ada pertanyaan tambahan, tambahkan objek pertanyaan di sini dan pastikan untuk menambahkan koma di akhir objek sebelumnya jika perlu
];

let currentQuestion = 0;
    let score = 0;
    let level = 3;
    const labelSoal = document.querySelector('.card-soal label');
    const btnBenar = document.querySelector('.btn-benar');
    const btnSalah = document.querySelector('.btn-salah');

    function displayQuestion() {
      labelSoal.innerHTML = questions[currentQuestion].img + questions[currentQuestion].question;
    }

    function checkAnswer(answer) {
      if (answer === questions[currentQuestion].correctAnswer) {
        score++;
        Swal.fire({
          title: 'Benar!',
          icon: 'success',
          timer: 1000,
          showConfirmButton: false
        });
      } else {
        Swal.fire({
          title: 'Salah!',
          icon: 'error',
          timer: 1000,
          showConfirmButton: false
        });
      }

      currentQuestion++;
      const maxScore = 5; // Skor maksimal dari pertanyaan
      const maxPossibleScore = 100; // Skor maksimal yang ingin Anda capai

      // Mengonversi skor ke rentang 0-100
      const convertedScore = (score / maxScore) * maxPossibleScore; 
      if (currentQuestion < questions.length) {
        displayQuestion();
      } else {
        Swal.fire({
          title: 'Quiz Selesai!',
          text: `Skormu: ${score}/${questions.length}`,
          icon: 'info'
        }).then(() => {
          window.location.href = `proses.php?score=${score}&level=${level}`;
        });
      }
    }

    btnBenar.addEventListener('click', function() {
      checkAnswer('Benar');
    });

    btnSalah.addEventListener('click', function() {
      checkAnswer('Salah');
    });

    displayQuestion();
  </script>
<?php 
include("../../component/footer.php");
?>