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
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>search-page</title>
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
<div class="searchForm">
        <form action="browse-results.php" method="post">
            <label>Title:</label>
            <input class="enterText" type="text" name="title" size=20/>
            <label>Artist:</label>
            <select class="dropDown" name="artists">
            <option value='0'></option> 
                <?php
                    foreach($artists as $row){
                        echo "<option value='" . $row['artist_name'] . "'>" . $row['artist_name'] . "</option>";
                    }
                ?>
            </select>
            <br>
            <label>Genre:</label>
            <select class="dropDown" name="genre">
            <option value='0'></option>
            <?php
                    foreach($genre as $row){
                        echo "<option value='" . $row['genre_name'] . "'>" . $row['genre_name'] . "</option>";
                    }
                ?>
            </select>     
            <br>
            <label>Year</label>
            <br>
            <label><input type="radio" name="year" value="less">Less: </label>
                <input class="enterText" type="text" name="lessText" size=10/>
            <br>
            <label><input type="radio" name="year" value="great">Greater: </label>
                <input class="enterText" type="text" name="greatText" size=10/>
            <br>
            <label>Popularity</label>
            <br>
            <label><input type="radio" name="popularity" value="less">Less: </label>
                <input class="enterText" type="text" name="popLess" size=10/>
            <br>
            <label><input type="radio" name="popularity" value="great">Greater: </label>
                <input class="enterText" type="text" name="popGreat" size=10/>
            <br>
            <input type="submit" value="Search">
        </form>
</div>
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