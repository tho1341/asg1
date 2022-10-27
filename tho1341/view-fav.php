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
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/grid.css">
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
                <li> <a href="view-fav.php">Favourites</a></li>
            </ul>
        </nav>
    </header>
        <a href="browse-results.php"><button>Show All</button></a>
        <a href="emptyFavorites.php"><button>Empty Favorites</button></a>
<?php
        foreach ($favorites as $fav){
            echo'<table>';
            $favSongs = $musicGateway -> getByIDFav($fav);
            $outputFavSongs = $output -> listAllRemove($favSongs);
            echo'</table>';
        }
?>
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