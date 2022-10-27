<?php
require_once 'includes/config.inc.php';
require_once 'includes/db-classes.inc.php';

session_start();
//initializing empty array
if(!isset($_SESSION["Favorites"])){
    $_SESSION["Favorites"] =[];
}
//retrieve array for this session
$favorites = $_SESSION["Favorites"];

//$music = $musicGateway->getTopGenres();
$conn = DBHelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));

$musicGateway = new MusicDB($conn);



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
        //function genFavRows($favArray, $artistDB, $genreDB){

            foreach ($favorites as $fav){
                $favSongs = $musicGateway -> getByIDFav($fav);
                //$outputFavSongs = $musicGateway -> outputFavSong($favSongs);
                foreach($favSongs as $row){
                    echo $row["title"];
                    echo $_GET["song_id"];
                }
                
                //print_r($favSongs);
            }
        //}
    ?>
<!--
                <tr>
                    <td><?=$songs["title"]?></td>
                    <td><?=$artist["artist"]?></td>


                </tr>
        
 -->
        <br>
        <a href="emptyFavorites.php">Empty Favorites</a>
        <br>
</body>

</html>