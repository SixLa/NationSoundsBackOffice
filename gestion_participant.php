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

    <?php include ('programme-fonction.php');
     $id = $_GET['id'];
    ?>

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
                    <h1 class="h3 mb-2 text-white">Artistes de l'événement</h1>
                    <p class="mb-4 text-white">Gérez ici les artistes participant à cet événement.</p>

                    <!-- DataTales Example -->

                    <?php
                    if(isset($_POST['ajout_participant'])){
                        ajoutParticipant($_POST['participant2'],$id);
                        $message ="<p class='text-success'>L'artiste a bien été ajouté.</p>";
                        }   

                    if(isset($_POST['delete_participant'])){
                        deleteParticipe($_POST['participant']);
                        $message ="<p class='text-success'>L'artiste a bien été supprimé.</p>";
                    }   
    ?>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="" method="post">
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row mb-4">
                                    <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1">Liste des artistes participant à cet événement</label>
                                        <br>
                                        <select name="participant" id="participant">
                                        <?php
                                        
                                        $participants = showParticipants($id);
                                        foreach($participants as $s): ?>
                                        <option value="<?php echo $s[0] ?>"> <?php echo $s[1] ;?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                    </div>
                                    </div>
                                    
                                </div>
 
                                <!-- Submit button -->
                                <button type="submit" name="delete_participant" class="col-lg-3 btn btn-primary btn-block mb-4 ">Supprimer l'artiste de cet événement</button>
                            </form>

                            <br>

                            <form action="" method="post">
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row mb-4">
                                    <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1">Artistes à ajouter</label>
                                        <br>
                                        <select name="participant2" id="participant2">
                                        <?php
                                        
                                        $participants2 = showParticipantsNotIncluded($id);
                                        foreach($participants2 as $s): ?>
                                        <option value="<?php echo $s[0] ?>"> <?php echo $s[1] ;?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                    </div>
                                    </div>
                                    
                                </div>
 
                                <!-- Submit button -->
                                <button type="submit" name="ajout_participant" class="col-lg-3 btn btn-primary btn-block mb-4 ">Ajouter l'artiste</button>
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