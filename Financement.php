<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'functions.php';
require_once 'connect.php';


// Traitement du formulaire d'envoi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $contact = $_POST['contact'];
    $statut = $_POST['statut'];
    $revenu_mensuel = $_POST['revenu_mensuel'];
    $depense_mansual = $_POST['depense_mansual'];
    // $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = $_POST['mail'];

    $content = 'Bonjour, je suis ' . $nom . ';  Courriel: ' . $email . ', j\'aimerais fait une demande de financement d\'une voiture dans votre entreprise, mon statut d\'emploi est ' . $statut . ', et mon revenu mensuel total est  
    ' . $revenu_mensuel . ', mes depense mensuelles totals ssont de : ' . $depense_mansual. 'mon contact est le suivant'.$contact;

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
    <link rel="stylesheet" href="7.page.css">
    <title>Financement</title>
</head>

<body>

    <!-- Modal -->
    <form action="" method="post">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Demande de Financement</h1>
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
                            <div class="col-lg-6 mt-3">
                                <tr>
                                    <b>Email :</b>
                                    <td><input type="email" size="20" name="mail" class="rounded-pill" placeholder="Email"></td>
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
                                    <b>quel est votre statut d'emploi? :</b>
                                    <td>
                                        <select name="statut" id="" class="rounded-pill" style="width: 5cm;">
                                            <option value="1">Employé</option>
                                            <option value="1">Sans emploi</option>
                                            <option value="1">Employeur</option>
                                        </select>
                                    </td>
                                </tr>
                            </div>

                            <div class="col-lg-6 mt-3">
                                <tr>
                                    <b>Quel est votre revenu net mensuel total :</b>
                                    <td><input type="number" size="20" name="revenu_mensuel" class="rounded-pill" placeholder=" revenu total"></td>
                                </tr>
                            </div>

                            <div class="col-lg-6 mt-3">
                                <tr>
                                    <b>Quelles sont vos depenses mensuelles totales :</b>
                                    <td><input type="number" size="20" name="depense_mansual" class="rounded-pill" placeholder="  depenses totales"></td>
                                </tr>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger rounded-pill px-3">Annuler</button>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary rounded-pill">Envoyer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <div class="pat">
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
                            <img src="tchep.jpg" alt="" style="height: 80%; width: 100%;">
                        </div>
                        <div class="col lg-6">
                            <center class="pt-5">
                                <I>
                                    <h2 class=" py-4 redressed pp" style="color: rgb(128, 203, 203);">"Votre financement automobile en toute simplicité avec Autoquick"</h2>
                                </I>
                                <h5 class="text-capitalize redressed yo" style="color: white;">Il n'a jamais été aussi facile de financer votre vehicule. Autoquick vous propose
                                    des options de financement rapide,flexibles,sécurisé et Rapide.</h5>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 pt-4">
                    <center>
                        <i>
                            <h3 style="color: rgb(128, 203, 203);">Un crédit vous engage et doit etres remboursé. Vérifiez vos capacités de remboursement
                                avant de vous engager</h3>
                        </i>
                        <hr style="height: 7px; color: rgb(90, 236, 236); width: 130px;">
                        <h5 style="color: rgb(148, 171, 148);"><i>Vous devez savoir combien est votre budget mensuel pour financer une voiture Autoquick. pour cela vous devez remplir ce formulaire
                                et envoyer a l'entreprise enfin qu'il analyse et voir si vous êtes éligible, un mail vous sera envoyé pour vous dire si vous êtes éligible et l'entreprise fixera un rendez-vous
                                pour effectuer le financement
                            </i></h5><br>

                        <center class="pb-3">
                            <i><a href="#" class="btn btn-primary rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Évaluation</i></a>
                        </center>

                    </center>

                    <div class="row">
                        <div class="col-lg-12 pt-4">
                            <center>
                                <i>
                                    <h3 style="color: rgb(128, 203, 203);">Comment faire une demande de financement ?</h3>
                                </i>
                                <hr style="height: 7px; color: rgb(90, 236, 236); width: 130px;">
                            </center>
                            <div class="row row-cols-1 row-cols-md-3 g-4 m-3">
                                <div class="col">
                                    <div class="card">
                                        <img src="ff1.png" class="card-img-top" alt="..." style="height: 170px;">
                                        <div class="card-body" style="background-color:  rgba(137, 133, 133, 0.5);">
                                            <p class="card-text">
                                                Lorsque vous avec remplir le formulaire d’éligibilité, nos experts calculerons votre budget mensuel et nous vous envoyons un mail.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 bg-succes">
                            <div class="row m-3">
                                <div class="col lg-6">
                                    <img src="C5.png" alt="" style="height: 100%; width: 100%;">
                                </div>
                                <div class="col lg-6">

                                    <I>
                                        <h2 class=" py-4 redressed pp" style="color: rgb(128, 203, 203);"></h2>
                                    </I>
                                    <h2 class="py-1 mx-4 as" style="color: rgb(128, 203, 203);"><i>Condition de financement</i></h2>
                                    <ul class="mx-4" style="color: rgb(192, 192, 231); font-size: 20px;">
                                        <li class="nav-item">
                                            <i class="pp" style="font-size: 30px;">.</i>
                                            Etre majeur (21ans ou plus)
                                        </li>
                                        <li class="nav-item">
                                            <i class="pp" style="font-size: 30px;">.</i>
                                            Etre domicilié au cameroun
                                        </li>
                                        <li class="nav-item">
                                            <i class="pp" style="font-size: 30px;">.</i>
                                            Percevoir des revenus réguliers d'au moins 200 000 fcfa nets par mois
                                        </li>
                                        <li class="nav-item">
                                            <i class="pp" style="font-size: 30px;">.</i>
                                            Avoir une pièce d'identité et un permis en cours de validité
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
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