<?php
require_once 'includes/config.inc.php';
require_once 'includes/db-classes.inc.php';


try{

$conn = DBHelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));

$musicGateway = new MusicDB($conn);
$music = $musicGateway->getAll();

//conditional to see if came from search page
if(isset($_POST['artists']) && $_POST['artists']!=0){
    $music = $musicGateway->getSongArtist($_POST['artists']);

} else if(isset($_POST['genre']) && $_POST['genre']!=0){
    $music = $musicGateway->getSongGenre($_POST['genre']);
} else if(isset($_POST['title']) && $_POST['title']!=""){
    
    $music = $musicGateway->getSongTitle($_POST['title']);

//     $sql = "SELECT title, duration, year, genres.genre_name, artists.artist_name, types.type_name, bpm, energy, danceability, liveness, valence, acousticness, speechiness, popularity
//     FROM songs 
//     LEFT JOIN genres ON genres.genre_id = songs.genre_id
//     LEFT JOIN artists ON artists.artist_id = songs.artist_id
//     LEFT JOIN types ON artists.artist_type_id = types.type_id 
//     WHERE title LIKE :search";
// $statement = $conn->prepare($sql);
// $statement->bindValue(":search", '%' . $_POST['title'] . '%');
// $statement->execute();

}






} catch (Exception $e) { die( $e->getMessage() ); }






?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        foreach($music as $row){
            echo $row['title'] . " | " . $row['artist_name'] . " | "  . $row['year'] . " | " . $row['genre_name'] . " | " . $row['popularity'] .  "<br>";



        }

    ?>
</body>
</html>