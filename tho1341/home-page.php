<?php

require_once 'includes/config.inc.php';
require_once 'includes/db-classes.inc.php';
require_once 'browse-results-helper.php';

try{

$conn = DBHelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));
$musicGateway = new MusicDB($conn);

$out = new listOutput();

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

echo "<div>";
//genres
$music = $musicGateway->getTopGenres();
$out->outputGenre($music);
echo "</div>";

echo "<div>";
//top artists
$music = $musicGateway->getTopArtists();
$out->outputArtist($music);
echo "</div>";

echo "<div>";
//most popular songs
$music = $musicGateway->getPopular();
$out->outputSongs($music);
echo "</div>";









?>







</body>
</html>