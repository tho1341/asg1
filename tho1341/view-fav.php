<?php
require_once 'includes/config.inc.php';
require_once 'includes/db-classes.inc.php';
require_once 'page-helper.php';

session_start();

$favorites = $_SESSION["Favorites"];


try{
$conn = DBHelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));

$musicGateway = new MusicDB($conn);
$output = new listOutput();


} catch (Exception $e) { die( $e->getMessage() ); }


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
        foreach ($favorites as $fav){
            $favSongs = $musicGateway -> getByIDFav($fav);
            $outputFavSongs = $output -> listAllRemove($favSongs);
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