<?php
     session_start();
     // error_reporting(E_ALL);
     // ini_set('display_errors', 1);
     
     
     if(!isset($_SESSION["user_id"])){
         header('location: connet.php');
         exit;
     }
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
    <title>5.page</title>
</head>

<body>
    <form action="insertvoiture.php" method="POST">
    <div class="container-fliud text-white">
        <div class="sidebar">
            <div class="d-flex pt">
                <div class="col-sm-1" style="background-color: cornflowerblue;">
                    <img src="logo.jpg" alt="" style="width: 30PX; height: 20px;">
                </div>
                <a href=""><span class=" hiding admin" style="font-size: 20px;"> ADMIM</span></a>            </div>
                <div>
                    <center>
                        <img src="logo.jpg" alt="" class="image">
                    </center>
                    <a href="administrateur.php">
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
                            <a href="Enregistrement.vente.php" class="", style="font-size: 14px;"><i class="fa fa-plus mx-3"> </i>Enregistrement d'une vente</a><br>
                            <a href="liste_vente.php" class="", style="font-size: 15px;"><i class="fa fa-plus mx-3"> </i>Liste des voitures vendu</a>
    
                        </div>
                        <a href="">
                            <h5><i class="fa fa-angle-double-down mx-3"></i><span class=" hiding">Achat</span></h5>
                        </a>
                        <div class=" hiding" style="font-size: 15px;">
                            <a href="Enregistrement.achat.php"><i class="fa fa-plus mx-3"> </i>Enregistrement</a><br>
                            <a href="Liste_achat.php" class="", style="font-size: 15px;"><i class="fa fa-plus mx-3"> </i>Liste des voitures acheter</a>
                        </div>
                        
                        <a href="">
                            <h5><i class="fa fa-bolt mx-3"></i><span class=" hiding">Location</span></h5>
                        </a>
                        <div class=" hiding" style="font-size: 17px;">
                            <a href="Enregistrement.location.php"><i class="fa fa-plus mx-3"> </i>Enregistrement</a><br>
                            <a href="Liste_location.php"><i class="fa fa-plus mx-3"> </i>Liste des voitures loué</a>
                        </div>
                        <a href="">
                            <h5><i class="fa fa-hourglass mx-3"></i><span class=" hiding">Financement</span></h5>
                        </a>
                        <div class=" hiding" style="font-size: 17px;">
                            <a href="Enregistrement.financement.php"><i class="fa fa-plus mx-3"> </i>Enregistrement</a><br>
                            <a href="liste_financement.php" class="", style="font-size: 15px;"><i class="fa fa-plus mx-3"> </i>Liste des voitures financé</a>
    
                        </div>
                        <a href="">
                            <h5><i class="fa fa-exchange mx-3"></i><span class=" hiding">Reprise</span></h5>
                        </a>
                        <div class=" hiding" style="font-size: 17px;">
                            <a href="Enregistrement.reprise.php"><i class="fa fa-plus mx-3"> </i>Enregistrement</a><br>
                            <a href="liste_reprise.php" class="", style="font-size: 14px;"><i class="fa fa-plus mx-3"> </i>Liste des voitures échange</a>
    
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
                </div>

            
        </div>
        <div class="container-P">
            <div class="col-lg-12 entete" >
                <button class="b">
                    <i class="fa fa-list togle" style="color: white;"></i>
                </button>
                <i class="fa fa-bell text-white pp" style="position: absolute; right: 3%;"></i>
            </div>
            
            <div style="background-color: white; margin-left: 25px; margin-top: 15px; margin-right: 30px;" id="conten" class="bg-opacity">
                <div style="text-align: right;">
                    <i class="fa fa-chevron-down mx-2" id="Tchep" style="color: rgb(126 123 123);"></i> <i class="fa fa-x mx-2" id="hider" style="color: rgb(126 123 123);"></i>
                </div>
                <div class="col-lg-12" id="contenu">
                    <div class="row">
                     
                        <div class="btn" style="background-color: white; margin: 3%; width: 95%;">
                            <center>
                                <h3 style="color: rgb(49, 49, 107); margin: 40PX;">Ajout d'un nouveau véhicule</h3>
                            </center>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6">
                                    <tr>
                                        <b>Marque :<span style="color: white;">fffffff</span></b>
                                        <td><input type="text" name="marque" size="30" placeholder="  marque du véhicule"></td>
                                    </tr>
                                </div>
                                <div class="col-lg-6">
                                    <tr>
                                        <b>Modèle :<span style="color: white;">fffffffffff</span></b>
                                        <td><input type="text" name="modele" size="30" placeholder="  modèle du véhicule"></td>
                                    </tr>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <tr>
                                        <b>Année :<span style="color: white;">fffffffffffffffffffffffffffff</span></b>
                                        <td><input type="date" name="annee" size="30" placeholder=" année d'imatriculation"></td>
                                    </tr>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <tr>
                                        <b>photo: </b>
                                        <td><input type="file" name="photo"></td>
                                    </tr>
                                </div> 
                               
                                <div class="col-lg-6 mt-3">
                                    <tr>
                                        <b>Carburant: <span style="color: white;">fffff</span></b>
                                        <td><input type="text" size="30" name="carburant" placeholder=" consommation du véhicule"></td>
                                    </tr>
                                </div>
                                

                                <div class="col-lg-6 mt-3">
                                    <tr>
                                        <b>Kilométrage :<span style="color: white;">ffffff</span></b>
                                        <td><input type="text" size="30" name="kilometre" placeholder="  kilomètre déjà parcouru"></td>
                                    </tr>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <tr>
                                        <b>Boite à vitesse: </b>
                                        <td><input type="text" size="31" name="vitesse" placeholder="  boite à vitesse"></td>
                                    </tr>
                                </div>
                               
                                <div class="col-lg-6 mt-3">
                                    <tr>
                                        <b>Prix:<span style="color: white;">fffffffffffffffffffffffffffff</span></b>
                                        <td><input type="number" size="30" name="prix" placeholder="Montant"></td>
                                    </tr>
                                </div>
                                
                            </div>
                            <div class="d-flex mt-4" style="padding-left: 45%; gap: 2px;">
                                <i><a href="4.page.html" class="cancel btn btn-danger ms-4">annuler</a></i>
                                <i><input type="submit" value="Valider" name="tchep" class="connect btn btn-success ms-4"></i>
                            </div>
                            <div style="color: white;">
                                <p>erdtfyguhji</p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $("#accordion").accordion({ collapsible: true });
        });
        $(".togle").click(function () {
            $(".sidebar").toggleClass("sidebar-coll", 1000, "easeOutSine");
            $(".hiding").toggleClass("hide", 500, "easeOutSine")
            $(".image").toggleClass("imagecoll", 1000, "easeOutSine")
        });

        $(document). ready(function(){
            $("#hider").click(function(){
                $('#conten'). toggle(2000);
            });
        });

        $(document). ready(function(){
            $("#Tchep").click(function(){
                $('#contenu').slideToggle("slow");
            });
        });
    </script>
    </form>
</body>

</html>