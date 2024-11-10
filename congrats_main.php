<?php
    session_start();    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Treasure Trivia</title>
        <link rel="stylesheet" href="congrats_main_style.css">
        <link rel="icon" type="image/x-icon" href="images/logo.png">
    </head>
    <body>
        <audio controls loop autoplay src="final_congrats.mp3" style="display:none"></audio>
        <img src="images/logo.png">
        <h1>$1 MILLION</h1>
        <h2><?php echo $_SESSION['userdata']['name'] ?></h2>
        <a href = "logout.php">Logout</a>
    </body>
</html>