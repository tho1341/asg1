<?php
require_once 'includes/config.inc.php';

session_start();
//initializing empty array
if(!isset($_SESSION["Favorites"])){
    $_SESSION["Favorites"] =[];
}
//retrieve array for this session
$Favorites = $_SESSION["Favorites"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view-fav</title>
</head>
<body>
    <ul>
    <?php
        foreach ($Favorites as $fav){
            //retrieve the song with songid
            $song = $data[$fav];
    ?>
            <li>
            <p <?= $song[0] ?>></p>
            <br>
            <?= $painting[1] ?>
            <br>
            </li>
        <?php
        }
        ?>
        </ul>

        <br>
        <a href="emptyFavorites.php">Empty Favorites</a>
        <br>
</body>

</html>