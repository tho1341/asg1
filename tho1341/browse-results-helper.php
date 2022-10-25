<?php

class listOutput{
    function listAll($music){
        foreach($music as $row){
            echo $row['title'] . " | " . $row['artist_name'] . " | "  . $row['year'] . " | " . $row['genre_name'] . " | " . $row['popularity'] .  "<br>";
        }
    }
}
?>