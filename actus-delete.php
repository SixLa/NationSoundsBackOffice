<?php
require("connection.php");
$id = $_GET['id'];
$request = "DELETE FROM news WHERE news_ID = '$id'";
$stmt = $bdd->query($request);
header('Location: actus.php');
?>
