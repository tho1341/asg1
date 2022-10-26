<?php
session_start();
$_SESSION["Favorites"] = [];
//send user back to favorits page
header("Location: browse-results.php");
?>