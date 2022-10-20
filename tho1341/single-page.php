<?php

require_once 'includes/config.inc.php';



try{
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT title, duration, year, genres.genre_name, artists.artist_name, types.type_name 
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
    <title>COMP 3512 Assign1</title>
    <h3>Tim Ho & Shahmir Qaiser</h3>
</head>
<body>

    <section>
        <?php

        foreach($result as $row){
            echo $row['title'] . " | " . $row['duration'] . " | "  . $row['year'] . $row['genre_name'];
    
        }

        ?>



    </section>

    <footer>
        <p>
            COMP 3512 Web 2 | 
            <a href="https://github.com/tho1341">Timothy Ho</a> | 
            <a href="https://github.com/sqais">Shahmir Qaiser</a> | 
            <a href="https://github.com/tho1341/asg1.git">GitHub Repo</a>
        </p>
    </footer>
</body>
</html>