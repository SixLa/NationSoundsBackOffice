<?php
// Connexion à la base de données
include('connection.php');
$actusID = $_GET['ID'];
$actusNom = $_GET['nom'];
$actusDate = $_GET['date'];
$actusContenu = $_GET['contenu'];

$postedID = $_POST['actusID'];
$postedNom = addslashes($_POST['actusNom']);
$postedDate = $_POST['actusDate'];
$postedContenu = addslashes($_POST['actusContenu']);
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
                <h1 class="h3 mb-2 text-white">Modifier une actualité</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="" method="POST">

                            <!-- Text input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form6Example3">ID</label>
                                <input type="text" name="actusID" value="<?php echo $actusID; ?>" id="form6Example3" class="form-control" />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="form6Example3">Titre de l'actualité</label>
                                <input type="text" name="actusNom" value="<?php echo $actusNom; ?>" id="form6Example3" class="form-control" />
                            </div>
                            <!-- Text input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form6Example3">Date de l'actualité</label>
                                <input type="date" name="actusDate" value="<?php echo $actusDate; ?>" id="form6Example3" class="form-control" />
                            </div>

                            <!-- Message input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form6Example7">Description de l'actualité</label>
                                <input class="form-control" name="actusContenu" value="<?php echo $actusContenu; ?>" id="form6Example7" rows="4"></input>
                            </div>

                            <!-- Submit button -->
                            <input type="submit" name="submit" class="col-lg-3 btn btn-primary btn-block mb-4 float-right" value="Enregistrer" />
                        </form>

                        <?php
                        if ($_POST['submit']) {
                            $requete = "UPDATE news SET news_date= :newDate, news_nom= :newNom, news_contenu= :newContenu WHERE news_ID= :newID ";

                            $sth = $bdd->prepare($requete);
                            if ($sth->execute(array(
                                    'newID' => $postedID,
                                    'newDate' => $postedDate,
                                    'newNom' => $postedNom,
                                    'newContenu' => $postedContenu
                                    ))) {
                        echo "La nouvelle actualité a bien été enregistrée.";
                            }
                            $bdd = null;
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

