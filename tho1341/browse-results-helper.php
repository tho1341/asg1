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
            echo '<td>'. '<a href="view-fav.php?id='. $row['song_id'] . '">Add to Favourites' . '</a></td>'; 
            echo '<td>'. '<a href="single-page.php?song_id='. $row['song_id'] . '">View' . '</a></td>'; 
            echo "<br>";
            echo "<br>";
        }
    }
}
?>