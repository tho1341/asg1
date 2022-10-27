<?php

class listOutput{

    //browse page outputs
    function listAll($music){
        foreach($music as $row){
            echo '<tr>';
            echo '<td>'. '<a href="single-page.php?song_id='. $row['song_id'] . '">' . $row['title'] . '</a></td>'; 
                echo '<td>'. $row['artist_name'] .'</td>'; 
                echo '<td>'. $row['year'] .'</td>'; 
                echo '<td>'. $row['genre_name'] .'</td>'; 
                echo '<td>'. $row['popularity'] .'</td>'; 
            echo '<td>'. '<a href="addToFav.php?song_id='. $row['song_id'] . '">Add to Favourites' . '</a></td>'; 
            echo '<td>'. '<a href="single-page.php?song_id='. $row['song_id'] . '">View' . '</a></td>'; 
            echo "<tr>";
            echo "<br>";
        }
    }

    function listAllRemove($music){
        foreach($music as $row){
            echo '<tr>';
            echo '<td>'. '<a href="single-page.php?song_id='. $row['song_id'] . '">' . $row['title'] . '</a></td>'; 
                echo '<td>'. $row['artist_name'] .'</td>'; 
                echo '<td>'. $row['year'] .'</td>'; 
                echo '<td>'. $row['genre_name'] .'</td>'; 
                echo '<td>'. $row['popularity'] .'</td>'; 
            echo '<td>'. '<a href="removeFromFav.php?song_id='. $row['song_id'] . '">Remove' . '</a></td>'; 
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

    //single page 
    function secToMin($sec){
        $min = ($sec / 60) % 60;
        $newSec = $sec % 60;

        $time = $min . ":" . $newSec;
        return $time;
    }
        
}
?>