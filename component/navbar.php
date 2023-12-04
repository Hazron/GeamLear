<div class="navbar">
    <img src="../asset/skleton.png" alt="skleton" class="skleton">
    <h3 style="color : white;">Hallo <?php echo $_SESSION['username'];?></h3>
    <div class="btn-group">
    <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <div style="width: 10px; height: 40px; position: relative">
        <div style="width: 10px; height: 8px; left: 0px; top: 0px; position: absolute; background: white; border-radius: 9999px"></div>
        <div style="width: 10px; height: 8px; left: -0px; top: 32px; position: absolute; background: white; border-radius: 9999px"></div>
        <div style="width: 10px; height: 8px; left: -0px; top: 16px; position: absolute; background: white; border-radius: 9999px"></div>
    </div> 
    </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../datadiri.php">Data Diri</a></li>
            <li><a class="dropdown-item" href="../script/logout.php">Logout</a></li>
        </ul>
    </div>
</div>