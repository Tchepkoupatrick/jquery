<?php

session_start();
     // error_reporting(E_ALL);
     // ini_set('display_errors', 1);
     
     
     if(!isset($_SESSION["user_id"])){
         header('location: connet.php');
         exit;
     }

require_once('connect.php');
$qq = "SELECT * FROM location";
$qq = $con->prepare($qq);
$qq->execute();
$result = $qq->fetchAll(PDO::FETCH_ASSOC); 
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
    <link rel="stylesheet" href="DataTables/datatables.min.css">
    <script src="jquery-ui-1.14.0-beta.2/jquery-ui.js"></script>
    <script src="jquery-ui-1.14.0-beta.2/external/jquery/jquery.js"></script>
    <script src="jquery-ui-1.14.0-beta.2/jquery-ui.js"></script>

    <script src="datatables.min.js"></script>
    <link rel="stylesheet" href="2.css">
    <title>liste location</title>
</head>

<body>
    <div class="container-fliud text-white">
        <div class="sidebar">
            <div class="d-flex pt">
                <div class="col-sm-1" style="background-color: cornflowerblue;">
                    <img src="logo.jpg" alt="" style="width: 30PX; height: 20px;">
                </div>
                <a href=""><span class=" hiding admin" style="font-size: 20px;">ADMIM</span></a>
            </div>
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
            <div class="col-lg-12 entete">
                <button class="b">
                    <i class="fa fa-list togle" style="color: white;"></i>
                </button>
                <i class="fa fa-bell text-white pp" style="position: absolute; right: 3%;"></i>
            </div>
            <!--debut corps-->
                <div style="background-color: white; margin-left: 25px; margin-top: 15px; margin-right: 30px;" id="conten" class="bg-opacity">
                    <div style="text-align: right;">
                        <i class="fa fa-chevron-down mx-2" id="Tchep" style="color: rgb(126 123 123);"></i> <i class="fa fa-x mx-2" id="hider" style="color: rgb(126 123 123);"></i>
                    </div>
                    <div class="col-lg-12" id="contenu">
                        <div class="row">
        
                            <div class="bt" style="background-color: white; margin: 3%; width: 95%;">
                                <hr style="height: 1px; color: black;">
                                <center>
                                    <i><h3 style="color:rgb(47, 47, 87);">LISTE Location</h3></i>
                                </center>
        
                                <table id="e" class="table table-striped" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nom client</th>
                                            <th>Email client</th>
                                            <th>email_client</th>
                                            <th>Contact chauffeur</th>
                                            <th>Debut</th>
                                            <th>Fin</th>
                                            <th>Contact client</th>
                                            <th>Marque</th>
                                            <th>Modèle</th>
                                            <th>prix de location</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php if ($result){ $cpt=1; ?>
                                <?php foreach($result as $row){ ?>
                                    <tbody>
                                    <tr>
                                            <td><?=$cpt?></td>
                                            <td><?=$row['nom_client']?></td>
                                            <td><?=$row['nom_chauffeur']?></td> 
                                            <td><?=$row['email_client']?></td>
                                            <td><?=$row['contact_chauffeur']?></td>
                                            <td><?=$row['debut']?></td>
                                            <td><?=$row['fin']?></td> 
                                            <td><?=$row['contact_client']?></td>
                                            <td><?=$row['marque']?></td>
                                            <td><?=$row['modele']?></td>
                                            <td><?=$row['prix_de_location']?></td>
                                            <td>
                                                <a href="modif.php?ID=<?=$row['id']?>" class="fa fa-refresh text-success"></a>
                                                |
                                                <a href="supprimerlocation.php?ID=<?=$row['id']?>" onclick="return confirmer();" class="fa fa-trash text-danger"></a> 
                                            </td>
                                        </tr> 

                                        <script>
                                            function confirmer() {
                                                return confirm("es-tu sûr de vouloir supprimer cet enregistrement ?")
                                            }
                                        </script>

                                        <?php $cpt= $cpt+1;}?>
                                        <?php }else{ ?>
                                            <th colspan="12">oups!!! Aucun personnel trouvé</th>   
                                            <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <!--corps corps-->
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
        
        $(document).ready( function () {
            $("#e").dataTable();
        });
        </script>
</body>

</html>