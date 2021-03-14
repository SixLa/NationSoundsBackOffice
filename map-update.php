<?php
/*// Connexion à la base de données
include('connection.php');
$mapID = $_GET['id'];
$mapNom = $_GET['nom'];
$mapFiltre = $_GET['filtre'];
$mapLongitude = $_GET['longitude'];
$mapLatitude = $_GET['latitude'];

// $postedID = $_POST['mapID'];
$postedID = isset($_POST['mapID']) ? $_POST['mapID'] : NULL;
// $postedNom = addslashes($_POST['mapNom']);
$postedNom = isset($_POST['mapNom']) ? $_POST['mapNom'] : NULL;
// $postedFiltre = $_POST['mapFiltre'];
$postedFiltre = isset($_POST['mapFiltre']) ? $_POST['mapFiltre'] : NULL;
// $postedLongitude = $_POST['mapLongitude'];
$postedLongitude = isset($_POST['mapLongitude']) ? $_POST['mapLongitude'] : NULL;
// $postedLatitude = $_POST['mapLatitude'];
$postedLatitude = isset($_POST['mapLatitude']) ? $_POST['mapLatitude'] : NULL;
*/?>
<?php
$mapID = $_GET['id'];
$mapNom = $_GET['nom'];
$mapFiltre = $_GET['filtre'];
$mapLongitude = $_GET['longitude'];
$mapLatitude = $_GET['latitude'];
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
                <h1 class="h3 mb-2 text-white">Modifier un point d'intérêt sur la carte</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">

                        <?php
                        function updateMap($mapID, $mapNom, $mapFiltre, $mapLongitude, $mapLatitude){
                            require("connection.php");
                            $requete = "UPDATE info_map SET map_nomlieu= :newNom, map_filtre= :newFiltre, map_longitude= :newLongitude, map_latitude= :newLatitude WHERE map_ID= :newID ";
                            $sth = $bdd->prepare($requete);
                            $sth->execute(array(
                                'newID' => $mapID,
                                'newNom' => $mapNom,
                                'newFiltre' => $mapFiltre,
                                'newLongitude' => $mapLongitude,
                                'newLatitude' => $mapLatitude,
                            ));
                            $bdd = null;
                        }
                        // Lorsque l'utilisateur clique sur le bouton submit et si les champs ne sont pas vides
                        if (isset($_POST['submit'])) {
                            if (empty($_POST['mapNom']) || empty($_POST['mapFiltre']) || empty($_POST['mapLongitude']) || empty($_POST['mapLatitude'])) {
                                $message = "<p class='text-danger'>Veuillez remplir tous les champs du formulaire.</p>";
                            } else {
                                updateMap($mapID, $_POST['mapNom'], $_POST['mapFiltre'], $_POST['mapLongitude'], $_POST['mapLatitude']);
                                $message = "<p class='text-success'>Le point d'intérêt a bien été modifié.</p>";
                                $mapNom = $_POST['mapNom'];
                                $mapFiltre = $_POST['mapFiltre'];
                                $mapLongitude = $_POST['mapLongitude'];
                                $mapLatitude = $_POST['mapLatitude'];
                            }
                        }
                        ?>

                        <form action="" method="POST">

                            <!-- Text input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form6Example3">Nom du point d'intérêt</label>
                                <input type="text" name="mapNom" value="<?php echo $mapNom; ?>" id="form6Example3" class="form-control" />
                            </div>
                            <!-- Text input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form6Example3">Filtre correspondant</label>
                                <input type="text" name="mapFiltre" value="<?php echo $mapFiltre; ?>" id="form6Example3" class="form-control" />
                            </div>

                            <!-- Message input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form6Example7">Longitude</label>
                                <input class="form-control" name="mapLongitude" value="<?php echo $mapLongitude; ?>" id="form6Example7" rows="4"></input>
                            </div>

                                <!-- Message input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form6Example7">Latitude</label>
                                <input class="form-control" name="mapLatitude" value="<?php echo $mapLatitude; ?>" id="form6Example7" rows="4"></input>
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