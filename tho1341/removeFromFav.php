<?php
require_once 'includes/config.inc.php';
//sesssion start
session_start();
//check if exists 
if(!isset($_SESSION["Favorites"])){
    //init empty array 
    $_SESSION["Favorites"] = [];
}
//get fav array for the current session
$favorites = $_SESSION["Favorites"];
if($key = array_search($_GET["song_id"], $favorites)){
    unset($favorites[$key]);
}else {
  unset($favorites[0]);
}
//resave array for user session
$_SESSION["Favorites"] = $favorites;
//redirect to view-fav page
header("Location: view-fav.php");
?>
