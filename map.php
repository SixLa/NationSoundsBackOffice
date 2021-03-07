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
                    <h1 class="h3 mb-2 text-white">Tables</h1>
                    <p class="mb-4 text-white">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a class="text-white" target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

            <!--Récupérer les infos dans la BDD et les afficher  -->

            <?php
            require("connection.php");
            $reponse = $bdd->query('SELECT map_ID , map_nomlieu, map_filtre, map_longitude, map_latitude FROM info_map');
            while ($donnees = $reponse->fetch())
            {
            ?>
                                        
                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Nom</th>
                                                        <th>Filtre</th>
                                                        <th>Longitude</th>
                                                        <th>Latitude</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Nom</th>
                                                        <th>Filtre</th>
                                                        <th>Longitude</th>
                                                        <th>Latitude</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    
                                                    <tr> 
                                                        
                                                        <td><?php echo $donnees['map_ID']; ?></td>
                                                        <td><?php echo $donnees['map_nomlieu']; ?></td>
                                                        <td><?php echo $donnees['map_filtre']; ?></td>
                                                        <td><?php echo $donnees['map_longitude']; ?></td>
                                                        <td><?php echo $donnees['map_latitude']; ?></td>
                                                        <td class="d-flex justify-content-around">
                                                            <a href=""><i class="fas fa-eye btn-info btn.circle btn-sm" title="Voir"></i></a>
                                                            <a href=""><i class="fas fa-pencil-alt btn-primary btn.circle btn-sm" title="Modifier"></i></a>
                                                            <a href=""><i class="fas fa-trash btn-danger btn.circle btn-sm" title="Supprimer"></i></a>
                                                        </td>
                                                    </tr>  
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
            <?php
            }

            $reponse->closeCursor(); // Termine le traitement de la requête

            ?>

            <!-- Fin de la récupération -->
                   
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






