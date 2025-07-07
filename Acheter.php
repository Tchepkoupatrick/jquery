<?php

require_once('connect.php');
$qq = "SELECT * FROM vehicule";
$qq = $con->prepare($qq);
$qq->execute();
$result = $qq->fetchAll(PDO::FETCH_ASSOC);


$headers = "Content-type:text/html;charset=UTF-8" . "\r\n";

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'functions.php';
require_once 'connect.php';


// Traitement du formulaire d'envoi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $marque = $_POST['marque'];
    $model = $_POST['model'];
    $contact = $_POST['contact'];
    $annee = $_POST['annee'];
    $kilo = $_POST['kilometre'];
    // $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = $_POST['mail'];
    $prix = $_POST['prix'];
    $paye = $_POST['paye'];
    $mode = $_POST['mode'];

    $qq = "INSERT INTO achat (nom, email, contact, marque, modele, annee, kilometrager, prix_de_vente, mode_paiement) 
    VALUES(:nom, :mail, :contact, :marque, :model, :annee, :kilometre, :paye, :mode)";
    $qq = $con->prepare($qq);
    $qq->bindParam(':nom', $nom);
    $qq->bindParam(':mail', $email);
    $qq->bindParam(':contact', $contact);
    $qq->bindParam(':marque', $marque);
    $qq->bindParam(':model', $model);
    $qq->bindParam(':annee', $annee);
    $qq->bindParam(':kilometre', $kilometre);
    $qq->bindParam(':paye', $paye);
    $qq->bindParam(':mode', $mode);
    $qq->execute();


    $content = 'Bonjour, je suis ' . $nom . ';  Courriel: ' . $email . ', j\'aimerais éffectuer un achat d\'une voiture de modèle ' . $model . ', de marque 
    ' . $marque . ', avec un kilometrage de ' . $kilo . 'Km/h, dont j\'estime le prix à ' . $prix . ' FCFA. Mon Contact est le suivant: ' . $contact;

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
  <link rel="stylehreet" href="bootstrap-5.3.3-dist/css/bootstrap.css">
  <link rel="stylehreet" href="bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.css">
  <link rel="stylesheet" href="bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >
  <link rel="stylesheet" href="2.page.css">
    <title>Acheter</title>
</head>
<body>
 <form action="" method="post">
 <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Enregistrement d'un Achat</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-6">
                <tr>
                    <b>Nom :</b>
                    <td><input type="text" size="20" name="nom" class="rounded-pill" placeholder="Nom Complet" required></td>
                </tr>
            </div>
            <div class="col-lg-6">
                <tr>
                    <b>Marque :</b>
                    <td><input type="text" size="20" name="marque" class="rounded-pill" placeholder="Marque du vehicule" required></td>
                </tr>
            </div>
            <div class="col-lg-6 mt-3">
                <tr>
                    <b>Email :</b>
                    <td><input type="email" size="20" name="mail" class="rounded-pill" placeholder="Email" required></td>
                </tr>
            </div>
            <div class="col-lg-6 mt-3">
                <tr>
                    <b>Modèle :</b>
                    <td><input type="text" size="20" name="model" class="rounded-pill" placeholder="  Modèle du vehicule" required></td>
                </tr>
            </div> 
           
            <div class="col-lg-6 mt-3">
                <tr>
                    <b>Contact :</b>
                    <td><input type="number" size="20" name="contact" class="rounded-pill" placeholder="  Numero de téléphone" required></td>
                </tr>
            </div>
            

            <div class="col-lg-6 mt-3">
                <tr>
                    <b>Année :</b>
                    <td><input type="date" size="20" name="annee" class="rounded-pill" placeholder="  année d'imatriculation" required></td>
                </tr>
            </div>
            <div class="col-lg-6 mt-3">
                <tr>
                    <b>Kilométrage :</b>
                    <td><input type="number" size="20" name="kilometre" class="rounded-pill" placeholder=" Kilométrage" required></td>
                </tr>
            </div>
           
            <div class="col-lg-6 mt-3">
                <tr>
                    <b>prix d'achat :</b>
                    <td><input type="number" size="20" name="prix" class="rounded-pill" placeholder="  Montant payé" required></td>
                </tr>
            </div>

            <div class="col-lg-6 mt-3">
              <tr>
                  <b>Mode de paiement :</b>
                  <td>
                    <select name="mode" id="" class="rounded-pill" style="width: 5cm;" required>
                        <option value="En entreprise">En entreprise</option>
                        <option value="Virement">Virement</option>
                    </select>
                </td>
              </tr>
          </div>

          <div class="col-lg-6 mt-3">
            <tr>
                <b> paiement :</b>
                <td><input type="number" name="paye" size="20" class="rounded-pill" placeholder="  API"></td>
            </tr>
        </div>
            
        </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-warning rounded-pill px-3" type="reset">Annule</button>
          <input type="submit" class="btn btn-primary rounded-pill px-3" value="Valider" name="tchep">
        </div>
      </div>
    </div>
  </div>
 </form>
  <!-- <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open first modal</a> -->


   <div class="pat">
    <section>
      <div class="cc-navbar navbar-expand-lg navbar-dark">
          <div class="container-fluid pe-">
              <div class="row p-3">
                  <div class="col-lg-2" style="color: white; font-size: 20px;">
                      <img src="logo.jpg" style="width: 40px;"> <I><SPan style="color: lightgreen;">AUTO</SPan> <SPan style="color: darkcyan;">QUICK</SPan></I>
                  </div>
                  <div class="col-lg-1"  style="font-size: 20px;">
                      <i><a href="index.php" class="po nav-link text-light">Accueil</a></i>
                  </div>
                  <div class="col-lg-2"  style="font-size: 20px;">
                      <i><a href="Acheter.php" class="po nav-link text-light">Achete une voiture</a></i>
                  </div>
                  <div class="col-lg-2"  style="font-size: 20px;">
                      <i><a href="vendre.php" class="po nav-link text-light">vendre sa voiture</a></i>
                  </div>
                  <div class="col-lg-1"  style="font-size: 20px;">
                      <i><a href="Location.php" class="po nav-link text-light">Location</a></i>
                  </div>
                  <div class="col-lg-1"  style="font-size: 20px;">
                      <i><a href="Financement.php" class="po nav-link text-light ">Financement</a></i>
                  </div>
                  <div class="col-lg-1"  style="font-size: 20px;">
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
               </section>
               <section>
                <center>
                    <i><h3 class="pt-2" style="color: darkcyan;">CHER CLIENT(E) BIENVENUE CHEZ AUTOQUICK</h3></i>
                    <i><h5 style="color: rgb(96, 102, 96);">Trouvez la voiture de vos reves rapidement et facilement avec AUTOQUICK</h5></i>
                </center>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row row-cols-1 row-cols-md-5 g-8 m-4">


                    

                          <!-- <div class="col">
                                <div class="card">
                                  <img src="" <?=$row['photo']?> class="card-img-top" alt="..." style="height: 107px">
                                  <div class="card-body" style="background-color:  rgba(137, 133, 133, 0.5);">
                                    <h5 class="card-title" <?=$row['marque'] . '*' . $row['modele']?>  style="color: rgb(46, 46, 80); font-size: 17px;"></h5>
                                    <p class="card-text"  <?=$row['annee'] . '*' . $row['consommation'] . '*' . $row['kilometrager']?> style="font-size: 13px;"></p>
                                    <p class="card-text"  <?=$row['consommation'] ?> style="font-size: 13px;"></p>
                                    <p class="card-text"  <?=$row['prix']?> style="font-size: 13px;"></p>
                                    <i><a class="btn-info rounded-pill px-2"  data-bs-toggle="modal" href="#exampleModalToggle" role="button" style="text-decoration: none;">Commander</i></a> 
                                  </i><a href="visit1.php" class="btn-success rounded-pill px-3" style="text-decoration: none;">visiter</i></a>   
                                 </div>
                                </div>
                              </div> -->








                            <div class="col">
                              <div class="card">
                                <img src="c1.png" class="card-img-top" alt="..." style="height: 107px;">
                                <div class="card-body" style="background-color:  rgba(137, 133, 133, 0.5);">
                                  <h5 class="card-title" style="color: rgb(46, 46, 80); font-size: 17px;">Mercedes Benz</h5>
                                  <p class="card-text" style="font-size: 13px;">.2015*Diesel*125537 km <br>.Manuelle <br>.5 000 000 fcfa</p>
                                  <i><a class="btn-info rounded-pill px-2"  data-bs-toggle="modal" href="#exampleModalToggle" role="button" style="text-decoration: none;">Commander</i></a> 
                                </i><a href="visit.php" class="btn-success rounded-pill px-3" style="text-decoration: none;">visiter</i></a>
                                </div>
                              </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                  <img src="cc5.jpg" class="card-img-top" alt="..." style="height: 107px">
                                  <div class="card-body" style="background-color:  rgba(137, 133, 133, 0.5);">
                                    <h5 class="card-title" style="color: rgb(46, 46, 80); font-size: 17px;">Toyota Cabrio</h5>
                                    <p class="card-text" style="font-size: 13px;">.2018*Super*12565 km <br>.Automatique <br>.12 500 000 fcfa</p>
                                    <i><a class="btn-info rounded-pill px-2"  data-bs-toggle="modal" href="#exampleModalToggle" role="button" style="text-decoration: none;">Commander</i></a> 
                                  </i><a href="visit1.php" class="btn-success rounded-pill px-3" style="text-decoration: none;">visiter</i></a>   
                                 </div>
                                </div>
                              </div>
                              <div class="col">
                                <div class="card">
                                  <img src="c2.png" class="card-img-top" alt="..." style="height: 107px;">
                                  <div class="card-body" style="background-color:  rgba(137, 133, 133, 0.5);">
                                    <h5 class="card-title" style="color: rgb(46, 46, 80); font-size: 17px;">Citroen Berlingo</h5>
                                    <p class="card-text" style="font-size: 13px;">.2019*Diesel*81695 km <br>.Manuelle <br>.11 500 000 fcfa</p>
                                    <i><a class="btn-info rounded-pill px-2"  data-bs-toggle="modal" href="#exampleModalToggle" role="button" style="text-decoration: none;">Commander</i></a> 
                                  </i><a href=" " class="btn-success rounded-pill px-3" style="text-decoration: none;">visiter</i></a>                                  
                                </div>
                                </div>
                              </div>
                              <div class="col">
                                <div class="card">
                                  <img src="c4.png" class="card-img-top" alt="..." style="height: 107px;">
                                  <div class="card-body" style="background-color:  rgba(137, 133, 133, 0.5);">
                                    <h5 class="card-title" style="color: rgb(46, 46, 80); font-size: 17px;">BMW Serie 1</h5>
                                    <p class="card-text" style="font-size: 13px;">.2021*Super*12563 km <br>.Automatique <br>.8 000 000 fcfa</p>
                                    <i><a class="btn-info rounded-pill px-2"  data-bs-toggle="modal" href="#exampleModalToggle" role="button" style="text-decoration: none;">Commander</i></a> 
                                  </i><a href=" " class="btn-success rounded-pill px-3" style="text-decoration: none;">visiter</i></a>                                  
                                </div>
                                </div>
                              </div>
                              <div class="col">
                                <div class="card">
                                  <img src="cc7.jpg" class="card-img-top" alt="..." style="height: 107px;">
                                  <div class="card-body" style="background-color:  rgba(137, 133, 133, 0.5);">
                                    <h5 class="card-title" style="color: rgb(46, 46, 80); font-size: 17px;">Berline Serie 1</h5>
                                    <p class="card-text" style="font-size: 13px;">.2015*Diesel*125545 km <br>.Manuel <br>.9 000 000 fcfa</p>
                                    <i><a class="btn-info rounded-pill px-2"  data-bs-toggle="modal" href="#exampleModalToggle" role="button" style="text-decoration: none;">Commander</i></a> 
                                  </i><a href=" " class="btn-success rounded-pill px-3" style="text-decoration: none;">visiter</i></a>                                  
                                </div>
                                </div>
                              </div>
                              <div class="col pt-3">
                                <div class="card">
                                  <img src="c6.jpg" class="card-img-top" alt="..." style="height: 107px;">
                                  <div class="card-body" style="background-color:  rgba(137, 133, 133, 0.5);">
                                    <h5 class="card-title" style="color: rgb(46, 46, 80); font-size: 17px;">Mercedes Benz</h5>
                                    <p class="card-text" style="font-size: 13px;">.2019*Diesel*125578 km <br>.Manuel <br>.10 000 000 fcfa</p>
                                    <i><a class="btn-info rounded-pill px-2"  data-bs-toggle="modal" href="#exampleModalToggle" role="button" style="text-decoration: none;">Commander</i></a> 
                                  </i><a href=" " class="btn-success rounded-pill px-3" style="text-decoration: none;">visiter</i></a>                                  
                                </div>
                                </div>
                              </div>
                              <div class="col pt-3">
                                <div class="card">
                                  <img src="cc10.jpg" class="card-img-top" alt="..." style="height: 107px;">
                                  <div class="card-body" style="background-color:  rgba(137, 133, 133, 0.5);">
                                    <h5 class="card-title" style="color: rgb(46, 46, 80); font-size: 17px;">Toyota Lexus</h5>
                                    <p class="card-text" style="font-size: 13px;">.2021*Diesel*125512 km <br>.Automatique <br>.6 000 000 fcfa</p>
                                    <i><a class="btn-info rounded-pill px-2"  data-bs-toggle="modal" href="#exampleModalToggle" role="button" style="text-decoration: none;">Commander</i></a> 
                                  </i><a href=" " class="btn-success rounded-pill px-3" style="text-decoration: none;">visiter</i></a>                                  
                                </div>
                                </div>
                              </div>
                              <div class="col pt-3">
                                <div class="card">
                                  <img src="c8.jpg" class="card-img-top" alt="..." style="height: 107px;">
                                  <div class="card-body" style="background-color:  rgba(137, 133, 133, 0.5);">
                                    <h5 class="card-title" style="color: rgb(46, 46, 80); font-size: 17px;">Mercedes X</h5>
                                    <p class="card-text" style="font-size: 13px;">.2015*Super*125432 km <br>.Manuel <br>.9 500 000 fcfa</p>
                                    <i><a class="btn-info rounded-pill px-2"  data-bs-toggle="modal" href="#exampleModalToggle" role="button" style="text-decoration: none;">Commander</i></a> 
                                  </i><a href=" " class="btn-success rounded-pill px-3" style="text-decoration: none;">visiter</i></a>                                  
                                </div>
                                </div>
                              </div>
                              <div class="col pt-3">
                                <div class="card">
                                  <img src="c99.jpg" class="card-img-top" alt="..." style="height: 107px;">
                                  <div class="card-body" style="background-color:  rgba(137, 133, 133, 0.5);">
                                    <h5 class="card-title" style="color: rgb(46, 46, 80); font-size: 17px;">Mercedes KIA</h5>
                                    <p class="card-text" style="font-size: 13px;">.2015*Diesel*127634 km <br>.Automatique <br>.8 500 000 fcfa</p>
                                    <i><a class="btn-info rounded-pill px-2"  data-bs-toggle="modal" href="#exampleModalToggle" role="button" style="text-decoration: none;">Commander</i></a> 
                                  </i><a href=" " class="btn-success rounded-pill px-3" style="text-decoration: none;">visiter</i></a>                                  
                                </div>
                                </div>
                              </div>
                              <div class="col pt-3">
                                <div class="card">
                                  <img src="mm.jpg" class="card-img-top" alt="..." style="height: 107px;">
                                  <div class="card-body" style="background-color:  rgba(137, 133, 133, 0.5);">
                                    <h5 class="card-title" style="color: rgb(46, 46, 80); font-size: 17px;">Toyota  Lexus</h5>
                                    <p class="card-text" style="font-size: 13px;">.2015*Diesel*123432 km <br>.Manuel <br>.6 000 000 fcfa</p>
                                    <i><a class="btn-info rounded-pill px-2"  data-bs-toggle="modal" href="#exampleModalToggle" role="button" style="text-decoration: none;">Commander</i></a> 
                                  </i><a href=" " class="btn-success rounded-pill px-3" style="text-decoration: none;">visiter</i></a>                                  
                                </div>
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
                <i><h5 style="color: lightgreen;">AUTOQUICK</h5></i>
                <i><a href="#" class="nav-link">Comment ca fonctionne</a></i>
                <i><a href="#" class="nav-link">Temoignages</a></i>
                <i><a href="#" class="nav-link">A propos</a></i>
                <i><a href="#" class="nav-link">Contact</a></i>
            </div>
            <div class="col-lg-3" style="color: rgb(128, 203, 203)">
                <i><h5  style="color: lightgreen;">ACHETER & REPRISE</h5></i>
                <i><a href="#" class="nav-link">Trouvez votre voiture</a></i>
                <i><a href="#" class="nav-link">Reprise</a></i>
                <i><a href="#" class="nav-link">Financement</a></i>
                <i><a href="#" class="nav-link">Marques & Modeles</a></i>    
            </div>
            <div class="col-lg-3" style="color: rgb(128, 203, 203)">
                <i><h5  style="color: lightgreen;">AVANTAGES</h5></i>
                <i><a href="#" class="nav-link">Livraison</a></i>
                <i><a href="#" class="nav-link">Garantie</a></i>
                <i><a href="#" class="nav-link">Fiabilite</a></i>
                <i><a href="#" class="nav-link">Assurance</a></i>
            </div>
            <div class="col-lg-3" style="color: rgb(128, 203, 203)">
                <i><h5  style="color: lightgreen;">AIDE & ASSISTANCE</h5></i>
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