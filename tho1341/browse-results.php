<?php
require_once 'includes/config.inc.php';
require_once 'includes/db-classes.inc.php';
require_once 'page-helper.php';
session_start();
//check if session already running 
if ( !isset($_SESSION["Favorites"]) ) { 
    // initialize an empty array that will contain the favorites
    $_SESSION["Favorites"] = []; 
   } 
//retrieve fav array
$favorites = $_SESSION["Favorites"];
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
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>browse-result</title>
</head>
<body>
<header>
    <div class="head">
        <h1>COMP 3512 Assign1<h1>
        <h2>Tim Ho & Shahmir Qaiser<h2>
    </div>
        <nav>
            <ul class="nav">
                <li> <a href="home-page.php">Home</a></li>
                <li> <a href="search-page.php">Search</a></li>
                <li> <a href="browse-results.php">Browse</a></li>
                <li> <a href="view-fav.php">Favourites</a></li>
            </ul>
        </nav>
    </header>
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
    <footer class="foot">
        <p>
            COMP 3512 Web 2 | 
            <a href="https://github.com/tho1341">Timothy Ho</a> | 
            <a href="https://github.com/sqais">Shahmir Qaiser</a> | 
            <a href="https://github.com/tho1341/asg1.git">GitHub Repo</a>
        </p>
    </footer>
    </body>
</html>