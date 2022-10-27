<?php
require_once 'includes/config.inc.php';
require_once 'includes/db-classes.inc.php';
require_once 'page-helper.php';
try{
    $conn = DBHelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));
    $musicGateway = new MusicDB($conn);
    if(isset($_GET['song_id'])){
        $result = $musicGateway->getAllForSingle($_GET['song_id']);
    }
}catch (PDOException $e){
    die( $e->getMessage() ); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>single-page</title>
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
        $output = new listOutput();
        echo'<table>';
        echo '<tr>';
            echo'<th>Title</th>';
            echo'<th>Artist</th>';
            echo'<th>Year</th>';
            echo'<th>Genre</th>';
            echo'<th>Genre Type</th>';
            echo'<th>Duration</th>';
        echo'</tr>';
        foreach($result as $row){
            
            echo '<tr>';
           // echo '<td>'. '<a href="single-page.php?song_id='. $row['song_id'] . '">' . $row['title'] . '</a></td>'; 
                echo '<td>'. $row['title'] .'</td>'; 
                echo '<td>'. $row['artist_name'] .'</td>'; 
                echo '<td>'. $row['year'] .'</td>'; 
                echo '<td>'. $row['genre_name'] .'</td>'; 
                echo '<td>'. $row['type_name'] .'</td>'; 
                echo '<td>'. $row['duration'] .'</td>'; 
                
            //echo '<td>'. '<a href="removeFromFav.php?song_id='. $row['song_id'] . '">Remove' . '</a></td>'; 
            //echo '<td>'. '<a href="single-page.php?song_id='. $row['song_id'] . '">View' . '</a></td>'; 
            echo "</tr>";

            echo "BPM: " . $row['bpm'] . " | Energy: " . $row['energy'] . " | Danceability: "  . $row['danceability'] . " | Liveness: " . $row['liveness'] . " | Valence: " . $row['valence'] . " | Acousticness: ". $row['acousticness'] ." | Speechiness: ". $row['speechiness'] ." | Popularity: ". $row['popularity'];

        }
        echo'</table>';
        // foreach($result as $row){
        //     echo $row['bpm'] . " | " . $row['energy'] . " | "  . $row['type_name'] . " | " . $row['genre_name'] . " | " . $row['year'] . " | " . $output->secToMin($row['duration']);
        //     echo "<h3>Analysis Data<h3>";
        //     echo "BPM: " . $row['bpm'] . " | Energy: " . $row['energy'] . " | Artist Type: "  . $row['type_name'] . " | Genre: " . $row['genre_name'] . " | Released: " . $row['year'] . " | Popularity: ";
        // }
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