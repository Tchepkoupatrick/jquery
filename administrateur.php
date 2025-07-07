<?php
 session_start();
// error_reporting(E_ALL);
// ini_set('display_errors', 1);


if(!isset($_SESSION["user_id"])){
    header('location: connet.php');
    exit;
}

require_once 'functions.php';
require_once 'connected.php';
$unansweredCount = countUnansweredMessages();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="vendor/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="vendor/fontawesome/css/all.min.css">
    <script src="jquery-ui-1.14.0-beta.2/jquery-ui.js"></script>
    <script src="jquery-ui-1.14.0-beta.2/external/jquery/jquery.js"></script>
    <script src="jquery-ui-1.14.0-beta.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="2.css">
    <title>Administrateur</title>
</head>

<body>
    <div class="container-fliud text-white">
        <div class="sidebar">
            <div class="d-flex justify-content-center align-items-center ">
                <a href="" class="nav-link text-light">
                    <span class=" hiding admin" style="font-size: 20px;">ADMINISTRATEUR</span></a>
            </div>
            <div>
                <center>
                    <img src="logo.jpg" alt="" class="image">
                </center>
                <a href="administrateur.html">
                    <h5><i class="fa fa-universal-access mx-3"></i><span class=" hiding">accueil</span></h5>
                </a>
                <div id="accordion">
                    <a href="">
                        <h5><i class="fa fa-user mx-3"></i><span class=" hiding">personnel</span></h5>
                    </a>
                    <div class=" hiding" style="font-size: 17px;">
                        <a href="Ajout_personnel.php"><i class="fa fa-plus mx-3"> </i>ajoute du personnel</a>
                        <a href="Liste_personnel.php"><i class="fa fa-plus mx-3"> </i>Liste du personnel</a>

                    </div>
                    <a href="">
                        <h5><i class="fa fa-angle-double-up mx-3"></i><span class=" hiding">vente</span></h5>
                    </a>
                    <div class=" hiding" style="font-size: 17px;">
                        <a href="Enregistrement.vente.php" class="" , style="font-size: 14px;"><i class="fa fa-plus mx-3"> </i>Enregistrement d'une vente</a><br>
                        <a href="liste_vente.php" class="" , style="font-size: 15px;"><i class="fa fa-plus mx-3"> </i>Liste des voitures vendu</a>

                    </div>
                    <a href="">
                        <h5><i class="fa fa-angle-double-down mx-3"></i><span class=" hiding">Achat</span></h5>
                    </a>
                    <div class=" hiding" style="font-size: 15px;">
                        <a href="Enregistrement.achat.php"><i class="fa fa-plus mx-3"> </i>Enregistrement</a><br>
                        <a href="Liste_achat.php" class="" , style="font-size: 15px;"><i class="fa fa-plus mx-3"> </i>Liste des voitures acheter</a>
                    </div>

                    <a href="">
                        <h5><i class="fa fa-bolt mx-3"></i><span class=" hiding">Location</span></h5>
                    </a>
                    <div class=" hiding" style="font-size: 17px;">
                        <a href="Enregistrement.location.hphp"><i class="fa fa-plus mx-3"> </i>Enregistrement</a><br>
                        <a href="Liste_location.php"><i class="fa fa-plus mx-3"> </i>Liste des voitures loué</a>
                    </div>
                    <a href="">
                        <h5><i class="fa fa-hourglass mx-3"></i><span class=" hiding">Financement</span></h5>
                    </a>
                    <div class=" hiding" style="font-size: 17px;">
                        <a href="Enregistrement.financement.php"><i class="fa fa-plus mx-3"> </i>Enregistrement</a><br>
                        <a href="liste_financement.php" class="" , style="font-size: 15px;"><i class="fa fa-plus mx-3"> </i>Liste des voitures financé</a>

                    </div>
                    <a href="">
                        <h5><i class="fa fa-exchange mx-3"></i><span class=" hiding">Reprise</span></h5>
                    </a>
                    <div class=" hiding" style="font-size: 17px;">
                        <a href="Enregistrement.reprise.php"><i class="fa fa-plus mx-3"> </i>Enregistrement</a><br>
                        <a href="liste_reprise.php" class="" , style="font-size: 14px;"><i class="fa fa-plus mx-3"> </i>Liste des voitures échange</a>

                    </div>
                    <a href="">
                        <h5><i class="fa fa-ils mx-3"></i><span class=" hiding" style="font-size: 18px;">Rendez-vous</span></h5>
                    </a>
                    <div class=" hiding" style="font-size: 17px;">
                        <a href="Enregistrement.rendezv.php"><i class="fa fa-plus mx-3"> </i>Enregistrement</a> <br>
                        <a href="Liste_rendez-vous.php"><i class="fa fa-plus mx-3"> </i>Liste des rendez-vous</a> <br>

                    </div>
                </div>
                <a href="Ajout_vehicule.php">
                    <h5><i class="fa fa-plus-circle mx-3"></i><span class=" hiding">Ajoute vehicule</span></h5>
                </a>
                <a href="connet.php">
                    <h5><i class="fa fa-exchange mx-3"></i><span class=" hiding">Déconnetion</span></h5>
                </a>
            </div>


        </div>
        <div class="container-P">
            <div class="col-lg-12 entete d-flex justify-content-between align-items-center py-4">
                <button class="b">
                    <i class="fa fa-list togle" style="color: white;"></i>
                </button>
                
                <center>
                    <i><h1>Tableau de bord</h1></i>
                </center>

                <div class=" d-flex justify-content-center ms-5 pe-5 py-3 m-0">
                    <a href="view_messages.php" class="btn btn-primary position-relative">
                        <i class="fa fa-bell fa-lg text-white ">
                        <?php if ($unansweredCount > 0): ?>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?= $unansweredCount ?>
                                <span class="visually-hidden">messages non lus</span>
                            </span>
                        <?php endif; ?> 
                        </i>
                        </a>
                </div>
                <!-- <a href="#"><i class="fa fa-bell text-white pp" style="position: absolute; right: 3%;"></i></a> -->

            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card" style="width: 90%; margin: 10px;">
                            <div class="card-body" style="background-color:antiquewhite">
                                <i class="fa fa-car" style="font-size: 90px;padding-left: 30%;  color: rgb(136, 136, 238);"></i>
                            </div>
                            <a href="index.php">
                                <div class="card-body" style="background-color: white; color: black;">
                                    Accueil <span class="badge" style="position: absolute; right: 5%; background-color: rgb(83, 81, 81);"></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card" style="width: 90%; margin: 10px;">
                            <div class="card-body" style="background-color: lightblue;">
                                <i class="fa fa-angle-double-down" id="icon" style="font-size: 90px;padding-left: 30%;  color: rgb(136, 136, 238);"></i>
                            </div>
                            <a href="Acheter.php">
                                <div class="card-body" style="background-color: white; color: black;">
                                    Achat d'une voiture<span class="badge" style="position: absolute; right: 5%; background-color: rgb(83, 81, 81);"></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card" style="width: 90%; margin: 10px;">
                            <div class="card-body" style="background-color:antiquewhite">
                                <i class="fa fa-angle-double-up" id="icon" style="font-size: 90px;padding-left: 30%; color: rgb(136, 136, 238);"></i>
                            </div>
                            <a href="vendre.php">
                                <div class="card-body" style="background-color: white; color: black;">
                                    vente d'une voiture<span class="badge" style="position: absolute; right: 5%; background-color: rgb(83, 81, 81);"></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card" style="width: 90%; margin: 10px;">
                            <div class="card-body" style="background-color: lightblue;">
                                <i class="fa fa-bolt" id="icon" style="font-size: 90px;padding-left: 30%;  color: rgb(136, 136, 238);"></i>
                            </div>
                            <a href="Location.php">
                                <div class="card-body" style="background-color: white; color: black;">
                                    Location d'une voiture<span class="badge" style="position: absolute; right: 5%; background-color: rgb(83, 81, 81);"></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card" style="width: 90%; margin: 10px;">
                            <div class="card-body" style="background-color:antiquewhite">
                                <i class="fa fa-hourglass-half" id="icon" style="font-size: 90px;padding-left: 30%;  color: rgb(136, 136, 238);"></i>
                            </div>
                            <a href="Financement.php">
                                <div class="card-body" style="background-color: white; color: black;">
                                    Financement<span class="badge" style="position: absolute; right: 5%; background-color: rgb(83, 81, 81);"></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card" style="width: 90%; margin: 10px;">
                            <div class="card-body" style="background-color: lightblue;">
                                <i class="fa fa-exchange" id="icon" style="font-size: 90px;padding-left: 30%;  color: rgb(136, 136, 238);"></i>
                            </div>
                            <a href="Reprise.php">
                                <div class="card-body" style="background-color: white; color: black;">
                                    Reprise d'une voiture<span class="badge" style="position: absolute; right: 5%; background-color: rgb(83, 81, 81);"></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card" style="width: 90%; margin: 10px;">
                            <div class="card-body" style="background-color:rgb(250, 231, 205)">
                                <i class="fa fa-plus-circle" id="icon" style="font-size: 90px;padding-left: 30%;  color: rgb(136, 136, 238);"></i>
                            </div>
                            <a href="Ajout_vehicule.php">
                                <div class="card-body" style="background-color: white; color: black;">
                                    Ajout d'un vehicule <span class="badge" style="position: absolute; right: 5%; background-color: rgb(83, 81, 81);"></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card" style="width: 90%; margin: 10px;">
                            <div class="card-body" style="background-color: lightblue;">
                                <i class="fa fa-asterisk" id="icon" style="font-size: 90px;padding-left: 30%;  color: rgb(136, 136, 238);"></i>
                            </div>
                            <a href="Fonctionnement.php">
                                <div class="card-body" style="background-color: white; color: black;">
                                    fonctionnement<span class="badge" style="position: absolute; right: 5%; background-color: rgb(83, 81, 81);"></span>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $("#accordion").accordion({
                collapsible: true
            });
        });
        $(".togle").click(function() {
            $(".sidebar").toggleClass("sidebar-coll", 1000, "easeOutSine");
            $(".hiding").toggleClass("hide", 500, "easeOutSine");
            $(".image").toggleClass("imagecoll", 1000, "easeOutSine");
        });
    </script>
</body>

</html>