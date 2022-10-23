<?php
require_once 'includes/config.inc.php';
require_once 'includes/db-classes.inc.php';


try{

$conn = DBHelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));

$musicGateway = new MusicDB($conn);
$music = $musicGateway->getAll();

$artists = $musicGateway->getAllArtist();

$genre = $musicGateway->getAllGenre();

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
    
    <form action="browse-results.php" method="post">
            
            <label>Title:</label>
            <input type="text" name="title" size=50/>
            
            <label>Artist:</label>
            <select name="artists">
            <option></option> 
                <?php
                    foreach($artists as $row){
                        echo "<option value='" . $row['song_id'] . "'>" . $row['artist_name'] . "</option>";
                    }

                ?>
            </select>
            
            <label>Genre:</label>
            <select name="genre">
            <option></option> 
            <?php
                    foreach($genre as $row){
                        echo "<option value='" . $row['song_id'] . "'>" . $row['genre_name'] . "</option>";
                    }

                ?>
            </select>

            
            
            <input type="submit" value="Search" >
        </form>


</body>
</html>