<?php

class listOutput{
    function listAll($music){
        foreach($music as $row){
            echo $row['title'] . " | " . $row['artist_name'] . " | "  . $row['year'] . " | " . $row['genre_name'] . " | " . $row['popularity'];
            echo "<form><input type='submit' value='addFav' name='addFav'>";
            echo "<input type='submit' value='view' name='view'></form>";
            echo "<br>";
        }
    }
}
?>