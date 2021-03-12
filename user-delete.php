<?php
require("connection.php");
$id = $_GET['id'];
$request = "DELETE FROM utilisateurs WHERE admin_ID = '$id'";
$stmt = $bdd->query($request);
header('Location: user.php');
?>
