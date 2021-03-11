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
                <h1 class="h3 mb-2 text-white">Ajouter un point d'intérêt</h1>
                <p class="mb-4 text-white">Vous pouvez ici ajouter un point d'intérêt sur la carte à destination des
                    festivaliers.</p>

                <!-- Ajout des points -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row mb-4">
                                <!-- Nom -->
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1">Nom du lieu</label>
                                        <input type="text" name="mapNom" id="mapNom" value="" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <!-- Filtre -->
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example2">Filtre</label>
                                        <input type="text" name="mapFiltre" id="mapFiltre" value=""
                                               class="form-control"/>
                                    </div>
                                </div>
                            </div>

                            <!-- Longitude input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form6Example3">Longitude</label>
                                <input type="text" name="mapLong" id="mapLong" value="" class="form-control"/>
                            </div>

                            <!-- Latitude input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form6Example5">Latitude</label>
                                <input type="text" name="mapLat" id="mapLat" value="" class="form-control"/>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" id="creerPoint" name="envoyer" value="Créer une agence"
                                    class="col-lg-3 btn btn-primary btn-block mb-4 float-right">Ajouter
                            </button>
                        </form>

                        <?php

                        if (isset($_POST['envoyer'])) {
                            $erreurform = false;
                            foreach ($_POST as $value) {
                                if (trim($value)) {

                                } else $erreurform = true;
                            }

                            if ($erreurform == false) {
                                $req = "INSERT INTO info_map VALUES (NULL,:map_nomlieu,:map_filtre,:map_longitude,:map_latitude) ";
                                require("connection.php");
                                $sth = $bdd->prepare($req);
                                $sth->bindValue(":map_nomlieu", $_POST['mapNom'], PDO::PARAM_STR);
                                $sth->bindValue(":map_filtre", $_POST['mapFiltre'], PDO::PARAM_STR);
                                $sth->bindValue(":map_longitude", $_POST['mapLong'], PDO::PARAM_STR);
                                $sth->bindValue(":map_latitude", $_POST['mapLat'], PDO::PARAM_STR);
                                if ($sth->execute()) {
                                    echo "<p class='text-success'>Le nouveau point d'intérêt a bien été enregistré</p>";
                                }
                                $bdd = null;
                            } else echo "<p class='text-danger'>Veuillez remplir tous les champs du formulaire.</p>";
                        } ?>
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