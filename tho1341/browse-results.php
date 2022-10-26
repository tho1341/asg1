<?php
require_once 'includes/config.inc.php';
require_once 'includes/db-classes.inc.php';
require_once 'browse-results-helper.php';


try{

$conn = DBHelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));

$musicGateway = new MusicDB($conn);

//if(isset($_POST['artists']) && !empty($_POST['artists'])){
if(isset($_POST['artists']) && $_POST['artists']!=0){
    $music = $musicGateway->getSongArtist($_POST['artists']);

} else if(isset($_POST['genre']) && $_POST['genre']!=0){
    $music = $musicGateway->getSongGenre($_POST['genre']);

} else if(isset($_POST['title']) && $_POST['title']!=""){
    $music = $musicGateway->getSongTitle($_POST['title']);

} else if(isset($_POST['year']) && $_POST['year']=='less'){
    $music = $musicGateway->getSongYear($_POST['lessText'], null);

} else if(isset($_POST['year']) && $_POST['year']=='great'){
    $music = $musicGateway->getSongYear(null, $_POST['greatText']);
    
}else if(isset($_POST['popularity']) && $_POST['popularity']=='less'){
    $music = $musicGateway->getSongPop($_POST['popLess'], null);

}else if(isset($_POST['popularity']) && $_POST['popularity']=='great'){
    $music = $musicGateway->getSongPop(null, $_POST['popGreat']);
}
else if(isset($_POST['showAll'])){
    $music = $musicGateway->getAll();
} 
else {
    $music = 0;
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
    
        if (!($_SERVER['REQUEST_METHOD'] == 'POST')){
            $output = new listOutput();
            $music = $musicGateway->getAll();
            $output->listAll($music);
        }
        else if($music == 0){
            echo "No input. Please Enter Search Field";
        }
        else{
            $output = new listOutput();
            $output->listAll($music);
        }
    ?>

    <form action="browse-results.php" method="post">
    <input type="submit" value="Show All" name='showAll'>
    </form>

    </body>
</html>