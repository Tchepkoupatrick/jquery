<?php
include "connect.php";
 
if(isset($_POST["tchep"])){
    if (!empty($_POST['marque']) && !empty($_POST['modele']) && !empty($_POST['annee']) && !empty($_POST['photo']) && !empty($_POST['carburant'])
     && !empty($_POST['kilometre']) && !empty($_POST['vitesse']) && !empty($_POST['prix'])) {
        $marque = $_POST['marque'];
        $modele = $_POST['modele'];
        $annee = $_POST['annee'];
        $photo = $_POST['photo'];
        $carburant = $_POST['carburant'];
        $kilometre = $_POST['kilometre'];
        $vitesse = $_POST['vitesse'];
        $prix = $_POST['prix'];
        
        // echo $photo;
       $qq = "INSERT INTO vehicule (marque, modele, annee, prix, consommation, kilometrager, boite_a_vitesse, photo) 
       VALUES(:marque, :modele, :annee, :prix, :carburant, :kilometre, :vitesse, :photo)";
       $qq = $con->prepare($qq);
       $qq->bindParam(':marque', $marque);
       $qq->bindParam(':modele', $modele);
       $qq->bindParam(':annee', $annee);
       $qq->bindParam(':photo', $photo);
       $qq->bindParam(':carburant', $carburant);
       $qq->bindParam(':kilometre', $kilometre);
       $qq->bindParam(':vitesse', $vitesse);
       $qq->bindParam(':prix', $prix);
       $qq->execute();
    }else{
        echo "erreur de connexion";
    }

}
header('Location: Ajout_vehicule.php');

?>