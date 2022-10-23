<?php
require_once 'includes/config.inc.php';
require_once 'includes/db-classes.inc.php';


try{

$conn = DBHelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));

$musicGateway = new MusicDB($conn);
$music = $musicGateway->getAll();

//conditional to see if came from search page
if(isset($_POST['file'])){
echo "yay";


}






} catch (Exception $e) { die( $e->getMessage() ); }






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
            echo $row['title'] . " | " . $row['artist_name'] . " | "  . $row['year'] . " | " . $row['genre_name'] . " | " . $row['popularity'] .  "<br>";



        }

    ?>
</body>
</html>