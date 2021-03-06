<?php
// Connexion à la base de données
include('connection.php');
$infosID = $_GET['ID'];
$infosNom = $_GET['nom'];
$infosContenu = $_GET['contenu'];
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
                    <h1 class="h3 mb-2 text-white">Modifications</h1>
                    <p class="mb-4 text-white"></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">

                            <?php

                            // Fonction update
                            function updateInfos($infosID, $infosNom,  $infosContenu){
                                require("connection.php");
                                $requete = "UPDATE infos SET infos_nom= :infosNom, infos_contenu= :infosContenu WHERE infos_ID= :infosID ";
                                $sth = $bdd->prepare($requete);
                                $sth->execute(array(
                                    'infosID' => $infosID,
                                    'infosNom' => $infosNom,
                                    'infosContenu' => $infosContenu
                                ));
                                $bdd = null;
                            }
                            // Lorsque l'utilisateur clique sur le bouton submit et si les champs ne sont pas vides
                            if (isset($_POST['submit'])) {
                                if (empty($_POST['infosNom']) || empty($_POST['infosContenu'])) {
                                    $message = "<p class='text-danger'>Veuillez remplir tous les champs du formulaire.</p>";
                                } else {
                                    updateInfos($infosID, $_POST['infosNom'], $_POST['infosContenu']);
                                    $message = "<p class='text-success'>Les informations ont bien été modifiées.</p>";
                                    $infosNom = $_POST['infosNom'];
                                    $infosContenu = $_POST['infosContenu'];
                                }
                            }
                            ?>

                            <form action="" method="POST">
                                
                                <!-- Text input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form6Example3">ID :</label>
                                <input type="text" name="infosID" value="<?php echo $infosID; ?>" id="form6Example3" class="form-control" />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="form6Example3">Titre :</label>
                                <input type="text" name="infosNom" value="<?php echo $infosNom; ?>" id="form6Example3" class="form-control" />
                            </div>

                            <!-- Message input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form6Example7">Contenu :</label>
                                <textarea class="form-control" name="infosContenu" id="form6Example7" rows="4" ><?php echo $infosContenu; ?></textarea>
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