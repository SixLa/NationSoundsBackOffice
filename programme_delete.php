<?php

include ('programme-fonction.php');

$id = $_GET['id'];

deleteEvent($id);
header('Location: programme.php');
?>