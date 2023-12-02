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
    question: `Bentuk pembagian dari 18 - 3 - 3 - 3 - 3 - 3 - 3 = 0 adalah… Jawabannya 18 : 6 = 3 (benar atau salah??)`,
    correctAnswer: "Benar",
    explanation: "",
  },
  {
    img: ``,
    question: "6 x 18 = 108 Maka, 108 : 18 = … Jawabannya  6 (benar atau salah???) ",
    correctAnswer: "Benar",
    explanation: "",
  },
  {
    img: `<img src="../../asset/tiang bendera.png" alt="soal2" class="img-questions">`,
    question: "Tinggi sebuah tiang bendera adalah 1.500 meter. Tinggi tiang itu sama dengan … hm . Jawabannya = 1,5 (benar atau salah??)",
    correctAnswer: "Salah",
    explanation: "",
  },
  {
    img: ``,
    question: `Panjang persegi panjang 9 m dan lebarnya 7 m, maka luasnya ... m2. Jawabannya = 72 (Benar atau Salah??)`,
    correctAnswer: "Salah",
    explanation: "",
  },
  {
    img: ``,
    question: `Sudut yang lebih besar dari 90o dan kurang dari 180o dinamakan .… Jawabannya = lancip `,
    correctAnswer: "Salah",
    explanation: "",
  },
  // Jika ada pertanyaan tambahan, tambahkan objek pertanyaan di sini dan pastikan untuk menambahkan koma di akhir objek sebelumnya jika perlu
];

let currentQuestion = 0;
    let score = 0;
    let level = 2;
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
      if (currentQuestion < questions.length) {
        displayQuestion();
      } else {
        Swal.fire({
          title: 'Quiz Selesai!',
          text: `Skormu: ${score}/${questions.length}`,
          icon: 'info'
        }).then(() => {
          window.location.href = `proseslvl2.php?score=${score}&level=${level}`;
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