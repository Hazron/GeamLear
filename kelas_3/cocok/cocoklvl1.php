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
    <style>
    .question-box,
    .answer-box {
      width: 45%; /* Lebar setengah dari parent */
      height: 100px;
      border: 2px solid transparent;
      cursor: pointer;
      margin: 5px; /* Margin agar terpisah */
      padding: 10px;
    }
    .question-box {
      background-color: #3498db;
    }
    .answer-box {
      background-color: #2ecc71;
    }
    .selected {
      border-color: red;
    }
    .correct {
      border-color: green !important;
    }

    .incorrect {
      border-color: red !important;
    }

    .question-box:hover {
  border-color: yellow; /* Contoh warna saat hover */
}

/* Menambahkan efek hover pada kotak jawaban */
.answer-box:hover {
  border-color: orange; /* Contoh warna saat hover */
}
  </style>
    <title>GeamaLear</title>
</head>
<body>
<div class="navbar">
    <img src="../../asset/skleton.png" alt="skleton" class="skleton">
    <h3 style="color : white;"><?php echo $_SESSION['username'];?></h3>
    <div class="btn-group">
    <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        
    </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Data Diri</a></li>
            <li><a class="dropdown-item" href="../../script/logout.php">Logout</a></li>
        </ul>
    </div>
</div>

<div class="container">
    <div id="questions" class="questions-container"></div>
      
    </div>
</div>

<script>
const questions = [
  { question: 'Hasil Bilangan dari 12 x 12 adalah', answer: '144' },
  { question: 'Ibu membeli 2 bungkus roti. Setiap bungkus berisi 6 buah roti. Berapa banyak', answer: '12' },
  { question: '3 jam = ….  Menit', answer: '180' },
  { question: 'Udin memiliki 100 koin. Ia membelanjakan 30 koin. Berapa sisa koin Udin?', answer: '70' },
  { question: 'Hasil bilangan dari 54 : 6', answer: '9' },
];

function shuffleArray(array) {
  for (let i = array.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [array[i], array[j]] = [array[j], array[i]];
  }
  return array;
}

const questionsContainer = document.getElementById('questions');

const shuffledQuestions = shuffleArray(questions);

shuffledQuestions.forEach(item => {
  const questionBox = document.createElement('div');
  questionBox.classList.add('question-box');
  questionBox.textContent = item.question;

  const answerBox = document.createElement('div');
  answerBox.classList.add('answer-box');
  answerBox.textContent = item.answer;

  const container = document.createElement('div');
  container.classList.add('row'); // Menggunakan class 'row' untuk Bootstrap Grid
  container.appendChild(questionBox);
  container.appendChild(answerBox);

  questionsContainer.appendChild(container);
});

function shuffleBoxes() {
  const boxes = Array.from(questionsContainer.children);
  boxes.forEach(box => {
    questionsContainer.removeChild(box);
  });
  shuffleArray(boxes).forEach(box => {
    questionsContainer.appendChild(box);
  });
}

shuffleBoxes();
</script>

<?php 
include("../../component/footer.php");
?>