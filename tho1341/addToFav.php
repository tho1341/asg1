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

if(array_search($_GET["song_id"], $favorites) == false){
    $favorites[] = $_GET["song_id"];
}

$_SESSION["Favorites"] = $favorites;

header("Location: view-fav.php");