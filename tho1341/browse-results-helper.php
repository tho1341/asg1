<?php

class listOutput{
    function listAll($music){
        foreach($music as $row){
            echo '<tr>';
            echo '<td>'. '<a href="single-page.php?song_id='. $row['song_id'] . '">' . $row['title'] . '</a></td>'; 
                echo '<td>'. $row['artist_name'] .'</td>'; 
                echo '<td>'. $row['year'] .'</td>'; 
                echo '<td>'. $row['genre_name'] .'</td>'; 
                echo '<td>'. $row['popularity'] .'</td>'; 
            echo '<td>'. '<a href="view-fav.php?song_id='. $row['song_id'] . '">Add to Favourites' . '</a></td>'; 
            echo '<td>'. '<a href="single-page.php?song_id='. $row['song_id'] . '">View' . '</a></td>'; 
            echo "<tr>";
            echo "<br>";
        }
    }

    function outputGenre($music){
    foreach($music as $row){
        echo '<ul>';
            echo '<li>'. $row['genre_name'] .'</li>'; 
        echo '</ul>';
       }
    }

    function outputArtist($music){
    foreach($music as $row){
        echo '<ul>';
            echo '<li>'. $row['artist_name'] .'</li>'; 
        echo "</ul>";
       }
    }

    function outputSongs($music){
        foreach($music as $row){
            echo '<ul>';
            echo '<li>'. '<a href="single-page.php?song_id='. $row['song_id'] . '">' . $row['title'] . '</a>' . ' by ' . $row['artist_name'] . '</li>';  
            echo "</ul>";
           }
        }
}
?>