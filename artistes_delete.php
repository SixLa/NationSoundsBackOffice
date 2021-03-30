<?php

include ('artistes_function.php');

$id = $_GET['id'];

deleteArtiste($id);
header('Location: artistes.php');
?>