<?php
include "connect.php";
 
if(isset($_POST["azem"])){
    if (!empty($_POST['nom']) && !empty($_POST['marque']) && !empty($_POST['email']) && !empty($_POST['modele']) && !empty($_POST['contact'])
     && !empty($_POST['annee']) && !empty($_POST['kilometre']) && !empty($_POST['prix']) && !empty($_POST['datee'])) {
        $nom = $_POST['nom'];
        $marque = $_POST['marque'];
        $email = $_POST['email'];
        $modele = $_POST['modele'];
        $contact = $_POST['contact'];
        $annee = $_POST['annee'];
        $kilometre = $_POST['kilometre'];
        $prix = $_POST['prix'];
        $datee = $_POST['datee'];
        
        // echo $annee;
       $qq = "INSERT INTO vente (nom, marque, email, modele, contact, annee, kilometrager, prix_de_vente, date_paiement) 
       VALUES(:nom, :marque, :email, :modele, :contact, :annee, :kilometre, :prix, :datee)";
       $qq = $con->prepare($qq);
       $qq->bindParam(':nom', $nom);
       $qq->bindParam(':marque', $marque);
       $qq->bindParam(':email', $email);
       $qq->bindParam(':modele', $modele);
       $qq->bindParam(':contact', $contact);
       $qq->bindParam(':annee', $annee);
       $qq->bindParam(':kilometre', $kilometre);
       $qq->bindParam(':prix', $prix);
       $qq->bindParam(':datee', $datee);
       $qq->execute();
    }else{
        echo "erreur de connexion";
    }

}
header('Location: Enregistrement.vente.php');

?>