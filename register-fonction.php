<?php

function inscription($email, $pass, $nom, $perm){
    require ('connection.php');

    $pass = password_hash($pass, PASSWORD_DEFAULT);
    debug_to_console($pass);
    debug_to_console($nom);
    debug_to_console($email);
 
     $requestInscription = $bdd->prepare("INSERT INTO utilisateurs(admin_email, admin_password, admin_pseudo, admin_permission) VALUES (:email, :admin_password, :pseudo, :admin_permission);");
     $requestInscription->execute(array( ':email' => $email, ':admin_password' => $pass, ':pseudo' => $nom, ':admin_permission' => $perm));
     return $requestInscription;
 }
 
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
?>