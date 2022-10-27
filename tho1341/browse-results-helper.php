<?php

class listOutput{
    function listAll($music){
        foreach($music as $row){
            echo $row['title'] . " | " . $row['artist_name'] . " | "  . $row['year'] . " | " . $row['genre_name'] . " | " . $row['popularity'] . " ";
            echo "<a href='view-fav.php?id=". $row['song_id'] ."'><button name='view'>Add to Favourites</button></a>";
            echo "<a href='single-page.php' name='view' value='" . $row['song_id'] .  "'><button name='view' value='" . $row['song_id'] . "'>View</button></a>";
            echo "<br>";
        }
    }
}
?>