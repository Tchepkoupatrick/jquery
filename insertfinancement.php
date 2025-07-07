<?php
include "connect.php";
 
if(isset($_POST["tchep"])){
    if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['contact']) && !empty($_POST['montant'])
    && !empty($_POST['marque']) && !empty($_POST['modele']) && !empty($_POST['prix']) && !empty($_POST['duree'])) {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $montant = $_POST['montant'];
        $marque = $_POST['marque'];
        $modele = $_POST['modele'];
        $prix = $_POST['prix'];
        $duree = $_POST['duree'];
    
    
       $qq = "INSERT INTO financement (nom, email, contact, montant_a_financer, marque, modele , prix_total, duree_du_pret) VALUES(:nom, :email, :contact, :montant, :marque, :modele, :prix, :duree)";
       $qq = $con->prepare($qq);
       $qq->bindParam(':nom', $nom);
       $qq->bindParam(':email', $email);
       $qq->bindParam(':contact', $contact);
       $qq->bindParam(':montant', $montant);
       $qq->bindParam(':marque', $marque);
       $qq->bindParam(':modele', $modele);
       $qq->bindParam(':prix', $prix);
       $qq->bindParam(':duree', $duree);
       $qq->execute();
    }else{
        echo "erreu";
    }

}
header('Location: Enregistrement.financement.php');

?>