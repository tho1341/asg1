<?php

require_once 'includes/config.inc.php';



try{
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT title, duration, year, genres.genre_name, artists.artist_name, types.type_name, bpm, energy, danceability, liveness, valence, acousticness, speechiness, popularity
            FROM songs 
            LEFT JOIN genres ON genres.genre_id = songs.genre_id
            LEFT JOIN artists ON artists.artist_id = songs.artist_id
            LEFT JOIN types ON artists.artist_type_id = types.type_id
            WHERE song_id=1001";

    $result = $pdo->query($sql);

}catch (PDOException $e){
    die( $e->getMessage() ); 
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <title>COMP 3512 Assign1</title>
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

    <div class="title">
        <h2>Song Information<h2>
    </div>
    <br>
    <section class="song">
        <?php
        foreach($result as $row){
            echo $row['title'] . " | " . $row['artist_name'] . " | "  . $row['type_name'] . " | " . $row['genre_name'] . " | " . $row['year'] . " | " . $row['duration'];
            echo "<h3>Analysis Data<h3>";
            echo "BPM: " . $row['bpm'] . " | Energy: " . $row['energy'] . " | Artist Type: "  . $row['type_name'] . " | Genre: " . $row['genre_name'] . " | Released: " . $row['year'] . " | Duration: " . $row['duration'];
        }
        ?>
    </section>
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