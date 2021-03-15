<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Back Office Nation Sounds - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">


</head>

<body class="bg-gradient-primary">



<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Connectez-vous !</h1>
                                </div>
                                <form class="user" method="POST" action="">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user"
                                               id="exampleInputEmail" aria-describedby="emailHelp"
                                               name="email" placeholder="Email" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                               name="password" id="exampleInputPassword" placeholder="Mot de passe">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Se souvenir de moi</label>
                                        </div>
                                    </div>

                                    <input type="submit" name="connexion" value="Se connecter" class="btn btn-primary btn-user btn-block"/>
                                    <!-- <button type="submit" name="connexion" class="col-lg-3 btn btn-primary btn-block mb-4 float-right">Connexion</button>-->
                                </form>

                                <?php

                                session_start();
                                $_SESSION["email"]=$_POST["email"];
                                $_SESSION["password"]=$_POST["password"];

                                require("connection.php");

                                if (isset($_POST['connexion'])) {
                                    if (($_SESSION["email"] == "") or ($_SESSION['password'] == "")) {
                                        echo "veuillez saisir un login et un mot de passe";
                                    } else {
                                        $st = $bdd->query("SELECT COUNT(*) FROM utilisateurs WHERE admin_email='" . $_SESSION["email"] . "' AND admin_password='" . $_SESSION["password"] . "'")->fetch();

                                        echo "<a href='index.php'>Si vous n'êtes pas redirigé automatiquement, cliquez ici.</a>";
                                        header("Location: index.php");
                                    }
                                }
                                ?>

                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Mot de passe oublié ?</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>