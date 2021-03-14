<?php

function inscription($email, $pass, $nom){
    require ('connection.php');

    $pass = password_hash($pass, PASSWORD_DEFAULT);
    debug_to_console($pass);
    debug_to_console($nom);
    debug_to_console($email);
 
     $requestInscription = $bdd->prepare("INSERT INTO utilisateurs(admin_pseudo, admin_email, admin_password, admin_permission) VALUES (:pseudo, :email, :admin_password, :admin_permission);");
     $requestInscription->execute(array( ':pseudo' => $nom, ':email' => $email, ':admin_password' => $pass, ':admin_permission' => "Abonné"));
     $result = $requestInscription->fetch(PDO::FETCH_OBJ);
     return $result;
 }
 
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
?>