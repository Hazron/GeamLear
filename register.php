<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Register | GeamaLear</title>
</head>
<body>
<div class="container">
    <div class="card card-login" style="width: 388px; height: 530px;">
        <div class="card-body">
            <img src="asset/logoGeame.png" alt="logoLogin" class="logo-login">
            <div class="input">
                <form action="script/register.php" method="post">
                    <input type="text" placeholder="Username" name="username">
                    <input type="password" placeholder="Password" name="password">
                    <input type="password" placeholder="Konfirmasi Password" name="konfirmasi">
            </div>
            <div class="submit">
                <button type="submit">Daftar</button>
                <a href="login.php">Sudah Punya Akun?</a>
            </div>
            </form>
        </div>
      </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>