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
            <li><a class="dropdown-item" href="../script/logout.php">Logout</a></li>
        </ul>
    </div>
</div>
<div class="container">
    <div class="card card-selesai">
        <a href='tts1lvl1proses.php'>SELESAI</a>
    </div>
    <div class="card card-selesai">
        <a href='tts1.php'>Back</a>
    </div>
        <div id="countdown" style="font-size: 40vw;"></div>
        <iframe id="crossword" width="750" height="750" style="border:3px solid black; margin:auto; display:block" frameborder="0" src="https://crosswordlabs.com/embed/tts1lvl1"></iframe>
</div>

<script>
$(document).ready(function () {
    var counter = 3;

    var timer = setInterval(function () {
        $('#countdown').text(counter == 0 ? 'Mulai' : counter);
        counter--;

        if (counter == -1) {
            clearInterval(timer);
            $('#countdown').hide();
            $('#crossword').show();
        }
    }, 1000);
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>