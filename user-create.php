<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nation Sounds - Nouvelle actualité</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php
    include("header.php");
    ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php
            include("navbar.php");
            ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-white">Créer un nouvel utilisateur</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="" method="post" id="actuCreate">
                            <!-- Text input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form6Example3">Email</label>
                                <input type="email" name="adminEmail" value="" id="form6Example3" class="form-control" />
                            </div>
                            <!-- Text input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form6Example3">Mot de passe (doit comporter au munimum : 8 caractères, 1 majuscule, 1 minuscule, 1 chiffre) </label>
                                <input type="password" name="adminPassword" value="" id="form6Example3" class="form-control" />
                            </div>

                            <!-- Text input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form6Example3">Pseudo</label>
                                <input type="text" name="adminPseudo" value="" id="form6Example3" class="form-control" />
                            </div>

                            <!-- Text input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form6Example3">Permission</label>
                                <SELECT id="form6Example3" class="form-control" name="adminPermission" size="1" value="">
                                    <OPTION value="">--sélectionnez un rôle--
                                    <OPTION value="Administrateur">Administrateur
                                    <OPTION value="Éditeur">Éditeur
                                    <OPTION value="Auteur">Auteur
                                    <OPTION value="Abonné">Abonné
                                    </SELECT>   
                            </div>

                            <!-- Submit button -->
                            <input type="submit" name="save" class="col-lg-3 btn btn-primary btn-block mb-4 float-right" value="Enregistrer"></input>
                        </form>

                        <?php
                        // Vérifier que l'utilisateur a bien cliqué sur le bouton envoyer
                        if (isset($_POST['save'])) {

                            $erreurform = false;
                            $erreurPass = false;

                            foreach ($_POST as $value) {
                                // Trim = supprimer espaces avant et après dans le form
                                if(trim($value)) {
                                }
                                else $erreurform = true;
                            }
                            // Validation du mot de passe
                            $secuPassword = $_POST['adminPassword'];
                            if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $secuPassword )){
                                $erreurPass = true;
                                echo "Votre mot depasse est trop faible !";
                            }

                            // si erreur form reste à faux = pas d'erreur au niveau du formulaire
                            if ( $erreurform == false && $erreurPass == false) {

                                $requete_insertion = "INSERT INTO utilisateurs VALUES (null,:admin_email,:admin_password,:admin_pseudo,:admin_permission)";
                                require("connection.php");
                                // Exécuter la requête
                                $sth = $bdd->prepare($requete_insertion);
                                $sth->bindValue(":admin_email",$_POST['adminEmail'],PDO::PARAM_STR);
                                $sth->bindValue(":admin_password",$_POST['adminPassword'],PDO::PARAM_STR);
                                $sth->bindValue(":admin_pseudo",$_POST['adminPseudo'],PDO::PARAM_STR);
                                $sth->bindValue(":admin_permission",$_POST['adminPermission'],PDO::PARAM_STR);
                                if ($sth->execute()) {
                                    echo "Le nouveau rôle a bien été enregistré.";
                                }
                                $bdd = null;
                            }
                            if ($erreurform == true)
                                echo "Veuillez remplir tous les champs du formulaire.";
                        }

                        
                        ?>

                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php
        include("footer.php");
        ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

</body>

</html>