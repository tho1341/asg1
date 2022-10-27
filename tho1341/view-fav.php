<?php
require_once 'includes/config.inc.php';
require_once 'includes/db-classes.inc.php';
require_once 'browse-results-helper.php';

session_start();
//initializing empty array
// if(!isset($_SESSION["Favorites"])){
//     $_SESSION["Favorites"] =[];
// }
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

function outputFavSongs($favSongs){
            foreach($favSongs as $row){
                echo '<tr>';
                echo '<td>'.$row['art_name']. '</td>';
                echo '</tr>';
            }

        } 



            foreach ($favorites as $fav){
                $favSongs = $musicGateway -> getByIDFav($fav);
                //$outputFavSongs = $musicGateway -> outputFavSong($favSongs);
                foreach($favSongs as $row){
                    echo $row["title"];
                    //echo $_GET["song_id"];
                }

            }

        




        //}
    
try{

$conn = DBHelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));

$musicGateway = new MusicDB($conn);

//if(isset($_POST['artists']) && !empty($_POST['artists'])){


} catch (Exception $e) { die( $e->getMessage() ); }
   
        if (!($_SERVER['REQUEST_METHOD'] == 'POST')){
            $output = new listOutput();
            $music = $musicGateway->GetByIDFav();
            $output->listAllRemove($music);
        }
        
?>

    <form action="browse-results.php" method="post">
    <input type="submit" value="Show All" name='showAll'>
    </form>

        <br>
        <a href="emptyFavorites.php">Empty Favorites</a>
        <br>
</body>

</html>