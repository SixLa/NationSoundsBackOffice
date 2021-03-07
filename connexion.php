<?php
try {
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'root';
    $mydbname = 'nationsounds';
    $mycharset = "utf8";
    $bdd = new PDO("mysql:host=$dbhost;dbname=$mydbname;charset=$mycharset", $dbuser, $dbpass);
}
catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
}

// le Bloc try tente une connexion à la base de données, en cas d'échec c'est le bloc catch qui est exécuté, en affichant l'erreur et en stoppant l'éxecution des scripts qui suivent
?>