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
<header>
    <div class="head">
        <h1>COMP 3512 Assign1<h1>
        <h2>Tim Ho & Shahmir Qaiser<h2>
    </div>
        <nav>
            <ul class="nav">
                <li> <a href="home-page.php">Home</a></li>
                <li> <a href="search-page.php">Search</a></li>
                <li> <a href="browse-results.php">Browse</a></li>
                <!-- <li> <form method="post" action="browse-results.php"><input type="submit" value="Browse" name='showAll'></form></li> -->
                <li> <a href="view-fav.php">Favourites</a></li>
            </ul>
        </nav>
    </header>

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
        <footer class="foot">
        <p>
            COMP 3512 Web 2 | 
            <a href="https://github.com/tho1341">Timothy Ho</a> | 
            <a href="https://github.com/sqais">Shahmir Qaiser</a> | 
            <a href="https://github.com/tho1341/asg1.git">GitHub Repo</a>
        </p>
    </footer>
</body>

</html>