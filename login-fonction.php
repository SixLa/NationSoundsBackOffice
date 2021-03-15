<?php 

function connexion($email, $pass)
{

    require('connection.php');
    $passCrypt = "";
    $requestConnexion = $bdd->prepare('SELECT admin_password FROM utilisateurs WHERE admin_email = :admin_email');
    $requestConnexion->execute(array(':admin_email' => $email));
    $resultats = $requestConnexion;

    foreach ($resultats as $resultat) {
        $passCrypt = $resultat[0];
        debug_to_console($passCrypt);
    }

    if (password_verify($pass, $passCrypt)) {
        return true;
    } else {
        return false;
    }
}

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
?>