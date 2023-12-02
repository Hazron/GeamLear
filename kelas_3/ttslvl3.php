<?php 
include("../component/head.php");
include("../component/navbar.php");
?>
<div class="container">
    <div class="card card-selesai">
        <a href='script/ttslvl3proses.php'>SELESAI</a>
    </div>
    <div class="card card-selesai">
        <a href='tts3.php'>Back</a>
    </div>
        <div id="countdown" style="font-size: 40vw;"></div>
        <iframe id="crossword" width="750" height="750" style="border:3px solid black; margin:auto; display:block" frameborder="0" src="https://crosswordlabs.com/embed/tts3lvl2-2"></iframe>
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
<?php 
include("../component/footer.php");
?>