<?php
include "connect.php";
if(isset($_POST["tchep"])){
    if (!empty($_POST['nom']) && !empty($_POST['mail']) && !empty($_POST['contact']) && !empty($_POST['marque']) && !empty($_POST['model'])
    && !empty($_POST['kilometre']) && !empty($_POST['paye']) && !empty($_POST['mode'])) {
        $nom = $_POST['nom'];
        $mail = $_POST['mail'];
        $contact = $_POST['contact'];
        $marque = $_POST['marque'];
        $model = $_POST['model'];
        $annee = $_POST['annee'];
        $kilometre = $_POST['kilometre'];
        $paye = $_POST['paye'];
        // $date = $_POST['datee'];
        $mode = $_POST['mode'];
    
        echo $nom;
       $qq = "INSERT INTO achat (nom, email, contact, marque, modele, annee, kilometrager, prix_de_vente, date_paiement, mode_paiement) 
       VALUES(:nom, :mail, :contact, :marque, :model, :annee, :kilometre, :paye, :date, :mode)";
       $qq = $con->prepare($qq);
       $qq->bindParam(':nom', $nom);
       $qq->bindParam(':mail', $mail);
       $qq->bindParam(':contact', $contact);
       $qq->bindParam(':marque', $marque);
       $qq->bindParam(':model', $model);
       $qq->bindParam(':annee', $annee);
       $qq->bindParam(':kilometre', $kilometre);
       $qq->bindParam(':paye', $paye);
       $qq->bindParam(':date', $date);
       $qq->bindParam(':mode', $mode);
       $qq->execute();
    }else{
        echo "erreur";
    }

}
header('Location:Engeristrement.achat.php');
?>
