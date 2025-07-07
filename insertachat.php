<?php
include "coct.php";
 
if(isset($_POST["tchep"])){
    if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['contact']) && !empty($_POST['marque']) && !empty($_POST['modele']) && !empty($_POST['annee']) && !empty($_POST['kilometre']) && !empty($_POST['prix']) && !empty($_POST['paye']) && !empty($_POST['datee'])) {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $marque = $_POST['marque'];
        $modele = $_POST['modele'];
        $annee = $_POST['annee'];
        $kilometre = $_POST['kilometre'];
        $prix = $_POST['prix'];
        $paye = $_POST['paye'];
        $datee = $_POST['datee'];
    
       $qq = "INSERT INTO achat (nom, email, contact, marque, modele, annee, kilometrager, prix_achat, paiement, date_paiement) VALUES(:nom, :email, :contact, :marque, :modele, :annee, :kilometre, :prix, :paye, :datee)";
       $qq = $con->prepare($qq);
       $qq->bindParam(':nom', $nom);
       $qq->bindParam(':email', $email);
       $qq->bindParam(':contact', $contact);
       $qq->bindParam(':marque', $marque);
       $qq->bindParam(':modele', $modele);
       $qq->bindParam(':annee', $annee);
       $qq->bindParam(':kilometre', $kilometre);
       $qq->bindParam(':prix', $prix);
       $qq->bindParam(':paye', $paye);
       $qq->bindParam(':datee', $datee);
       $qq->execute();
    }

}
header('Location: Acheter.php');

?>