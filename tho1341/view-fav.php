<?php
require_once 'includes/config.inc.php';

session_start();
//initializing empty array
if(!isset($_SESSION["Favorites"])){
    $_SESSION["Favorites"] =[];
}
//retrieve array for this session
$favorites = $_SESSION["Favorites"];
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
        foreach ($favorites as $fav){
            //retrieve the song with songid
            //$song = $songs[$fav];
            if($key = array_search($_GET["song_id"], $favorites)){
                array_push($favorites[$key]);
            }
    ?>
            <li>
            <p <?= $song[0] ?>></p>
            <br>
            <?= $song[1] ?>
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