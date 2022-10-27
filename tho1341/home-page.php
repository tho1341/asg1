<?php

require_once 'includes/config.inc.php';
require_once 'includes/db-classes.inc.php';
//require_once 'browse-results-helper.php';

$conn = DBHelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));

$musicGateway = new MusicDB($conn);



$music = $musicGateway->getTopGenres();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

foreach($music as $row){
 echo '<tr>';
 //echo '<td>'. '<a href="single-page.php?song_id='. $row['song_id'] . '">' . $row['title'] . '</a></td>'; 
     echo '<td>'. $row['genre_name'] .'</td>'; 
     //echo '<td>'. $row['year'] .'</td>'; 
     //echo '<td>'. $row['genre_name'] .'</td>'; 
     //echo '<td>'. $row['popularity'] .'</td>'; 
 //echo '<td>'. '<a href="view-fav.php?song_id='. $row['song_id'] . '">Add to Favourites' . '</a></td>'; 
 //echo '<td>'. '<a href="single-page.php?song_id='. $row['song_id'] . '">View' . '</a></td>'; 
 //echo "<br>";
 echo "<br>";
}




?>







</body>
</html>