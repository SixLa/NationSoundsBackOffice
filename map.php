<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Back-office Nation Sounds</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

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

                <!-- Topbar /  -->
                <?php
                    include("navbar.php");
                ?>
                <!-- End of Topbar -->

<!-- -------------------------------- Begin Page Content Dashboard -------------------------------- -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-white">Carte interactive</h1>
                    </div>

                    <!-- 1st Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Artistes -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 bg-dark-blue">
                                    <h6 class="m-0 font-weight-bold text-white">Liste des points d'intérêts</h6>
                                </div>
                                <div class="card-body">
                                    <a rel="nofollow" href="tables.php">
                                        <div class="text-center">
                                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                                src="img/undraw-music.svg" alt="">
                                        </div>
                                        <p class="text-center">> Consulter et mettre à jour la liste des artistes </p>
                                    </a>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Actualités -->
                            

                        </div>
                        <?php $requete = "SELECT map_ID , map_filtre, map_longitude, map_latitude FROM info_map";

    require("connection.php");
    echo($requete)
?>

                    <!-- 2nd Row -->
                    <div class="row">

                        
                                        
                        
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
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>