<!DOCTYPE html>
<html>
   <head>
   <?php 
   
      include ("register-fonction.php");
   
   ?>
      <meta charset="utf-8" />
      <style>
         *{
            font-family:arial;
         }
         body{
            margin:20px;
         }
         input{
            border:solid 1px #2222AA;
            margin-bottom:10px;
            padding:16px;
            outline:none;
            border-radius:6px;
         }
         .erreur{
            color:#CC0000;
            margin-bottom:10px;
         }
      </style>
   </head>
   <body>
      <h1>Inscription</h1>

      <form name="" method="post" action="">
         <input type="text" name="email" placeholder="Email" /><br />
         <input type="text" name="nom" placeholder="Pseudo" /><br />
         <input type="password" name="password" placeholder="Mot de passe" /><br />
         <input type="password" name="repass" placeholder="Confirmer Mot de passe" /><br />
         <input type="submit" name="inscription" value="S'authentifier" />
      </form>


      <?php
         if(isset($_POST['inscription'])){
            if(!empty($_POST['password']) && !empty($_POST['email'])){
                $inscrit = inscription($_POST['email'], $_POST['password'], $_POST['nom']);
                if($inscrit)
                {
                    header('Location: login.php');
                }
               else{
                          $error = "Informations incorrectes";
                  }
          }
          else
                  $error = "Veuillez remplir tous les champs.";
  }

    ?>
   </body>
</html>