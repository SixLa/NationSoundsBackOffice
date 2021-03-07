  
<?php
try {
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $mydbname = 'nationsounds';
    $mycharset = "utf8";
    $bdd = new PDO("mysql:host=$dbhost;dbname=$mydbname;charset=$mycharset", $dbuser, $dbpass);
}
catch (PDOException $e) {
 echo "Error!: " . $e->getMessage() . "<br/>";
 die();
 }
?>