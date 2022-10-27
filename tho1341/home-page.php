<?php
require_once 'includes/config.inc.php';
require_once 'includes/db-classes.inc.php';
require_once 'page-helper.php';
try{
$conn = DBHelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));
$musicGateway = new MusicDB($conn);
$out = new listOutput();
} catch (Exception $e) { die( $e->getMessage() ); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/grid.css">
    <title>Home-page</title>
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
<?php
echo "<div class='grid-container'>";
    echo "<div class='grid-item'>";
    echo "<h3>Top Genres</h3>";
    //genres
    $music = $musicGateway->getTopGenres();
    $out->outputGenre($music);
    echo "</div>";

    echo "<div class='grid-item'>";
    echo "<h3>Top Artists</h3>";
    $music = $musicGateway->getTopArtists();
    $out->outputArtist($music);
    echo "</div>";

    echo "<div class='grid-item'>";
    echo "<h3>Most Popular Songs</h3>";
    $music = $musicGateway->getPopular();
    $out->outputSongs($music);
    echo "</div>";

    echo "<div class='grid-item'>";
    echo "<h3>One Hit Wonders</h3>";
    $music = $musicGateway->getOneHit();
    $out->outputSongs($music);
    echo "</div>";

    echo "<div class='grid-item'>";
    echo "<h3>Longest Acoustic Songs</h3>";
    $music = $musicGateway->getAcoustic();
    $out->outputSongs($music);
    echo "</div>";

    echo "<div class='grid-item'>";
    echo "<h3>At the Club</h3>";
    $music = $musicGateway->getClub();
    $out->outputSongs($music);
    echo "</div>";

    echo "<div class='grid-item'>";
    echo "<h3>Running Songs</h3>";
    $music = $musicGateway->getRunningSongs();
    $out->outputSongs($music);
    echo "</div>";

    echo "<div class='grid-item'>";
    echo "<h3>Studying</h3>";
    $music = $musicGateway->getStudy();
    $out->outputSongs($music);
    echo "</div>";
echo "</div>";
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