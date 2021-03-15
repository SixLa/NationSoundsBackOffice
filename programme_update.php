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
     $date = "";
     $desc = "";
     $lieu = "";
     $event = getEvent($id);
     foreach($event as $a){
         $date = $a[1];
         $lieu = $a[2];
         $desc = $a[3];
     }

    $date = strtotime($date);
    $newDate = date('Y-m-d\TH:i', $date);
    
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
                    <h1 class="h3 mb-2 text-white">édition d'un evenement</h1>
                    <p class="mb-4 text-white">Entrez ici les informations liées a l'evenement que vous voulez éditer.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="" method="post">
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row mb-4">
                                    <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1">Lieu</label>
                                        <br>
                                        <select name="scene" id="scene">
                                        <option value="<?php echo $id ?>"> <?php echo $lieu ;?> </option>
                                        <?php
                                        
                                        $scenes = getScene();
                                        foreach($scenes as $s): ?>
                                        <option value="<?php echo $s[0] ?>"> <?php echo $s[1] ;?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                    </div>
                                    </div>
                                    
                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1">Description evenement</label>
                                        <input type="text" id="desc" name="desc" value ="<?php echo $desc ?>" class="form-control" />
                                    </div>
                                    </div>
                                    
                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1">horaire</label>
                                        <input type="datetime-local" id="time" name="time" value ="<?php echo $newDate ?>" class="form-control" />
                                    </div>
                                    </div>
                                    
                                </div>

                                <div class="d-flex justify-content-between">
                                    <h1 class="h3 mb-2 text-white">Evénements</h1>
                                    <p class="text-right"><a href="gestion_participant.php?id=<?php echo $id; ?>" class="btn btn-primary btn-lg mb-3" role="button" aria-pressed="true">gérer participants</a></p>
                                </div>
 


                                <!-- Submit button -->
                                <button type="submit" name="create" class="col-lg-3 btn btn-primary btn-block mb-4 float-right">Enregistrer</button>
                            </form>
                        <?php
                        
                        if(isset($_POST['create'])){
                            if(empty($_POST['time']) || empty($_POST['desc']) || empty($_POST['scene'])){
                                $message = "<p class='text-danger'>Veuillez remplir tous les champs du formulaire.</p>";;
                            }else{
                                createEvent($_POST['time'], $_POST['scene'], $_POST['desc']);
                             $message ="<p class='text-success'>Le nouvel evenement a bien été créé.</p>";;
                            }
                            echo $message;
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