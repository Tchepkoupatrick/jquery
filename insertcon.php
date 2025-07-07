<?php
include "connect.php";
 
if(isset($_POST["azem"])){
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['contact']) && !empty($_POST['operation']) && !empty($_POST['datee']) && !empty($_POST['heure'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $operation = $_POST['operation'];
        $datee = $_POST['datee'];
        $heure = $_POST['heure'];
        
        // echo  $operation;
       $qq = "INSERT INTO rendez_vous (nom, prenom, email, contact, operation, date_rdv, heure) 
       VALUES(:nom, :prenom, :email, :contact, :operation, :datee, :heure)";
       $qq = $con->prepare($qq);
       $qq->bindParam(':nom', $nom);
       $qq->bindParam(':prenom', $prenom);
       $qq->bindParam(':email', $email);
       $qq->bindParam(':contact', $contact);
       $qq->bindParam(':operation', $operation);
       $qq->bindParam(':datee', $datee);
       $qq->bindParam(':heure', $heure);
       $qq->execute();
    }else{
        echo "erreur";
    }

}
header('Location:Enregistrement.rendezv.php');
?>

?>