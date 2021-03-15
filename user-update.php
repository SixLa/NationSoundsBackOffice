<?php
// Connexion à la base de données
include('connection.php');
$adminID = $_GET['ID'];
$adminEmail = $_GET['email'];
$adminPassword = $_GET['password'];
$adminPseudo = $_GET['pseudo'];
$adminPermission = $_GET['permission'];
?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nation Sounds</title>

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
                <h1 class="h3 mb-2 text-white">Modifier un rôle</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">

                        <?php

                        // Fonction update des utilisateurs
                        function updateUser($adminID, $adminEmail, $adminPassword, $adminPseudo, $adminPermission){
                            require("connection.php");
                            $requete = "UPDATE utilisateurs SET admin_email= :adminEmail, admin_password= :adminPassword, admin_pseudo= :adminPseudo, admin_permission= :adminPermission WHERE admin_ID= :adminID ";
                            $sth = $bdd->prepare($requete);
                            $sth->execute(array(
                                'adminID' => $adminID,
                                'adminEmail' => $adminEmail,
                                'adminPassword' => $adminPassword,
                                'adminPseudo' => $adminPseudo,
                                'adminPermission' => $adminPermission
                            ));
                            $bdd = null;
                        }
                        // Lorsque l'utilisateur clique sur le bouton submit et si les champs ne sont pas vides
                        if (isset($_POST['submit'])) {
                            if (empty($_POST['adminEmail']) || empty($_POST['adminPassword']) || empty($_POST['adminPseudo']) || empty($_POST['adminPermission'])) {
                                $message = "<p class='text-danger'>Veuillez remplir tous les champs du formulaire.</p>";
                            } else {
                                updateUser($adminID, $_POST['adminEmail'], $_POST['adminPassword'], $_POST['adminPseudo'], $_POST['adminPermission']);
                                $message = "<p class='text-success'>Le rôle a bien été modifié.</p>";
                                $adminEmail = $_POST['adminEmail'];
                                $adminPassword = $_POST['adminPassword'];
                                $adminPseudo = $_POST['adminPseudo'];
                                $adminPermission = $_POST['adminPermission'];
                            }
                        }
                        ?>

                        <form action="" method="POST">

                            <!-- Text input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form6Example3">Email</label>
                                <input type="email" name="adminEmail" value="<?php echo $adminEmail; ?>" id="form6Example3" class="form-control" />
                            </div>
                            <!-- Text input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form6Example3">Mot de passe (doit comporter au munimum : 8 caractères, 1 majuscule, 1 minuscule, 1 chiffre)</label>
                                <input type="password" name="adminPassword" value="<?php echo $adminPassword; ?>" id="form6Example3" class="form-control" />
                            </div>
                            <!-- Text input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form6Example3">Pseudo</label>
                                <input type="text" name="adminPseudo" value="<?php echo $adminPseudo; ?>" id="form6Example3" class="form-control" />
                            </div>
                            <!-- Liste déroulante -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form6Example3">Permission actuelle : <?php echo $adminPermission; ?> </label> <br>
                                <label class="form-label" for="form6Example3">Nouvelle permission :</label> 
                                    <SELECT id="form6Example3" class="form-control" name="adminPermission" size="1" value="">
                                        <OPTION value="">--sélectionnez un rôle--
                                        <OPTION value="Administrateur">Administrateur
                                        <OPTION value="Éditeur">Éditeur
                                        <OPTION value="Auteur">Auteur
                                        <OPTION value="Abonné">Abonné
                                    </SELECT>
                            </div>
                           

                            <!-- Submit button -->
                            <input type="submit" name="submit" class="col-lg-3 btn btn-primary btn-block mb-4 float-right" value="Enregistrer" />
                        </form>

                        <?php
                        if(isset($message))
                            echo $message;  ?>

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

