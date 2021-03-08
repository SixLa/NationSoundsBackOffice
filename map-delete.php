<?php
require("connection.php");
$id = $_GET['id'];
$request = "DELETE FROM info_map WHERE map_ID = '$id'";
$stmt = $bdd->query($request);
header('Location: map.php');
?>