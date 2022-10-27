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
    <?php
        //function genFavRows()
        
        //foreach ($favorites as $fav){
            //retrieve the song with songid
            //$song = $songs[$fav];
        //}
    ?>

        <br>
        <a href="emptyFavorites.php">Empty Favorites</a>
        <br>
</body>

</html>