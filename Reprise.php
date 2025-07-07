<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'functions.php';
require_once 'connect.php';


// Traitement du formulaire d'envoi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $marque = $_POST['marque'];
    $model = $_POST['modele'];
    $contact = $_POST['contact'];
    $kilo = $_POST['kilometre'];
    // $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = $_POST['mail'];

    $content = 'Salut, je suis ' . $nom . ';  Courriel: ' . $email . ', j\'aimerais éffectuer une reprise d\'une voiture de modèle ' . $model . ', de marque 
    ' . $marque . ', avec un kilometrage de ' . $kilo . '. Mon Contact est le suivant ' . $contact;

    // $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    // $content = filter_input(INPUT_POST, 'content', FILTER_DEFAULT);
    // Puis nettoyez manuellement si nécessaire
    $content = htmlspecialchars($content, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

    if ($email && $content) {
        if (sendMessage($email, $content)) {
            $success = "Message envoyé avec succès!";
        } else {
            $error = "Erreur lors de l'envoi du message";
        }
    } else {
        $error = "Veuillez remplir tous les champs";
    }
}

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
    <link rel="stylehreet" href="bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="6.page.css">
    <title>Reprise</title>
</head>

<body>
    <div class="pat">


        <!-- Modal -->
        <form action="" method="post">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center>
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Enregistrement Reprise</h1>
                            </center>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <tr>
                                        <b>Nom :</b>
                                        <td><input type="text" size="20" name="nom" class="rounded-pill" placeholder="Nom Complet"></td>
                                    </tr>
                                </div>
                                <div class="col-lg-6">
                                    <tr>
                                        <b>Marque :</b>
                                        <td><input type="text" size="20" name="marque" class="rounded-pill" placeholder="Marque du vehicule"></td>
                                    </tr>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <tr>
                                        <b>Email :</b>
                                        <td><input type="email" size="20" name="mail" class="rounded-pill" placeholder="Email"></td>
                                    </tr>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <tr>
                                        <b>Modèle :</b>
                                        <td><input type="text" size="20" name="modele" class="rounded-pill" placeholder="  Modèle du vehicule"></td>
                                    </tr>
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <tr>
                                        <b>Contact :</b>
                                        <td><input type="number" size="20" name="contact" class="rounded-pill" placeholder="  Numero de téléphone"></td>
                                    </tr>
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <tr>
                                        <b>Kilométrage :</b>
                                        <td><input type="number" size="20" name="kilometre" class="rounded-pill" placeholder="  prix "></td>
                                    </tr>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-warning rounded-pill px-3" type="reset">Annule</button>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary rounded-pill">Envoyer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>


        <section>
            <div class="cc-navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid pe-">
                    <div class="row p-3">
                        <div class="col-lg-2" style="color: white; font-size: 20px;">
                            <img src="logo.jpg" style="width: 40px;"> <I><SPan style="color: lightgreen;">AUTO</SPan> <SPan style="color: darkcyan;">QUICK</SPan></I>
                        </div>
                        <div class="col-lg-1" style="font-size: 20px;">
                            <i><a href="index.php" class="po nav-link text-light">Accueil</a></i>
                        </div>
                        <div class="col-lg-2" style="font-size: 20px;">
                            <i><a href="Acheter.php" class="po nav-link text-light">Achete une voiture</a></i>
                        </div>
                        <div class="col-lg-2" style="font-size: 20px;">
                            <i><a href="vendre.php" class="po nav-link text-light">vendre sa voiture</a></i>
                        </div>
                        <div class="col-lg-1" style="font-size: 20px;">
                            <i><a href="Location.php" class="po nav-link text-light">Location</a></i>
                        </div>
                        <div class="col-lg-1" style="font-size: 20px;">
                            <i><a href="Financement.php" class="po nav-link text-light ">Financement</a></i>
                        </div>
                        <div class="col-lg-1" style="font-size: 20px;">
                            <i><a href="Reprise.php" class="po nav-link text-light mx-3">Reprise</a></i>
                        </div>
                        <div class="col-lg-2" style="font-size: 20px;">
                            <i><a href="Fonctionnement.php" class="po nav-link text-light " style="font-size: 19px;">comment ça fonctionne</a></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="row">
                <div class="col-lg-12 bg-succes">
                    <div class="row m-3">
                        <div class="col lg-6">
                            <center class="pt-5">
                                <I>
                                    <h2 class=" py-4 redressed pp" style="color: rgb(128, 203, 203); font-size: 35PX;">"QU'EST-CE QUE LA REPRISE ?"</h2>
                                </I>
                                <hr style="height: 7px; color: rgb(90, 236, 236); width: 130px;">
                                <h5 class="text-capitalize redressed yo" style="color: white;">La reprise est un moyen facile d'échanger votre voiture actuelle contre une de nos voitures,
                                    tout cela en une seule transaction.La valeur de votre ancien véhicule est déduite du prix d'achat, vous ne payez que la différence.</h5>
                                <h5 class="text-capitalize redressed yo" style="color: white;">Grâce à la reprise, vous gagnez beaucoup de temps.</b></h5>
                            </center>
                        </div>
                        <div class="col lg-6">
                            <img src="r2.png" alt="" style="height: 100%; width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 pt-4">
                    <center>
                        <i>
                            <h3 style="color: rgb(128, 203, 203);">Comment fonctionne la reprice ?</h3>
                        </i>
                        <hr style="height: 7px; color: rgb(90, 236, 236); width: 130px;">
                    </center>
                    <div class="row row-cols-1 row-cols-md-3 g-4 m-3">
                        <div class="col">
                            <div class="card">
                                <img src="v3.png" class="card-img-top" alt="..." style="height: 170px;">
                                <div class="card-body">
                                    <h5 class="card-title" style="color: rgb(63, 63, 175)">Effectuer la reprise en agence</h5>
                                    <p class="card-text">Pour la reprice, prenez <b>un rendez-vous</b> en agence.Sur place, nos experts évalueront votre voiture et vous dire
                                        combien elle vaut</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="r4.jpg" class="card-img-top" alt="..." style="height: 170px;">
                                <div class="card-body">
                                    <h5 class="card-title" style="color: rgb(63, 63, 175)">Choisissez votre prochaine voiture</h5>
                                    <p class="card-text">Trouvez une voiture dans notre agence et appliquez votre prix
                                        de vente au paiement. Vous ne paierez que la différence.</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="r5.png" class="card-img-top" alt="..." style="height: 148px;">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-size: 16PX; color: rgb(63, 63, 175)">La reprise et la livraison se font le même jour</h5>
                                    <p class="card-text">Nous confirmerons les informations et nous procéderons à l'échange des
                                        véhicules.Nous nous chargeons de toutes les formalités administratives.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <center class="pb-3">
                <i><a href="#" class="btn btn-primary rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Prendre un rendez-vous</i></a>
            </center>

    </div>
    </section>
    <section>
        <div class="ft">
            <div class="row mx-5 pt-3">
                <div class="col-lg-3" style="color: rgb(128, 203, 203)">
                    <i>
                        <h5 style="color: lightgreen;">AUTOQUICK</h5>
                    </i>
                    <i><a href="#" class="nav-link">Comment ca fonctionne</a></i>
                    <i><a href="#" class="nav-link">Temoignages</a></i>
                    <i><a href="#" class="nav-link">A propos</a></i>
                    <i><a href="#" class="nav-link">Contact</a></i>
                </div>
                <div class="col-lg-3" style="color: rgb(128, 203, 203)">
                    <i>
                        <h5 style="color: lightgreen;">ACHETER & REPRISE</h5>
                    </i>
                    <i><a href="#" class="nav-link">Trouvez votre voiture</a></i>
                    <i><a href="#" class="nav-link">Reprise</a></i>
                    <i><a href="#" class="nav-link">Financement</a></i>
                    <i><a href="#" class="nav-link">Marques & Modeles</a></i>
                </div>
                <div class="col-lg-3" style="color: rgb(128, 203, 203)">
                    <i>
                        <h5 style="color: lightgreen;">AVANTAGES</h5>
                    </i>
                    <i><a href="#" class="nav-link">Livraison</a></i>
                    <i><a href="#" class="nav-link">Garantie</a></i>
                    <i><a href="#" class="nav-link">Fiabilite</a></i>
                    <i><a href="#" class="nav-link">Assurance</a></i>
                </div>
                <div class="col-lg-3" style="color: rgb(128, 203, 203)">
                    <i>
                        <h5 style="color: lightgreen;">AIDE & ASSISTANCE</h5>
                    </i>
                    <i><a href="#" class="nav-link">Question frequente</a></i>
                    <i><a href="#" class="nav-link">Nous contacter</a></i>
                    <i><a href="#" class="nav-link">avis et experiance</a></i>
                    <i><a href="#" class="nav-link">NOS conseils d'achat</a></i>
                </div>
                <div>
                    <h5 style="height: 8px;"></h5>
                </div>
            </div>
        </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>