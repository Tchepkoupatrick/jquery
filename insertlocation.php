<?php
include "connect.php";
if(isset($_POST["done"])){
    if (!empty($_POST['nomclient']) && !empty($_POST['nomchauffeur']) && !empty($_POST['contactchauffeur']) && !empty($_POST['email']) && !empty($_POST['debut'])
    && !empty($_POST['fin']) && !empty($_POST['contactclient']) && !empty($_POST['marque']) && !empty($_POST['prix']) && !empty($_POST['modele'])) {
        $nomclient = $_POST['nomclient'];
        $nomchauffeur = $_POST['nomchauffeur'];
        $contactchauffeur = $_POST['contactchauffeur'];
        $email = $_POST['email'];
        $debut = $_POST['debut'];
        $fin = $_POST['fin'];
        $contactclient = $_POST['contactclient'];
        $marque = $_POST['marque'];
        $prix = $_POST['prix'];
        $modele = $_POST['modele'];
        
        // echo $contactclient;
       $qq = "INSERT INTO location (nom_client, nom_chauffeur, email_client, contact_chauffeur, debut, fin, contact_client, marque, modele, prix_de_location) 
       VALUES(:nomclient, :nomchauffeur, :contactchauffeur, :email, :debut, :fin, :contactclient, :marque, :prix, :modele)";
       $qq = $con->prepare($qq);
       $qq->bindParam(':nomclient', $nomclient);
       $qq->bindParam(':nomchauffeur', $nomchauffeur);
       $qq->bindParam(':email', $email);
       $qq->bindParam(':contactchauffeur', $contactchauffeur);
       $qq->bindParam(':debut', $debut);
       $qq->bindParam(':fin', $fin);
       $qq->bindParam(':contactclient', $contactclient);
       $qq->bindParam(':marque', $marque);
       $qq->bindParam(':modele', $modele);
       $qq->bindParam(':prix', $prix);
       $qq->execute();
    }else{
        echo"erreur";
    }

}
header('Location:Enregistrement.location.php');
?>
