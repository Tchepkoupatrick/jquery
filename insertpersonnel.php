<?php
include "connect.php";
 
if(isset($_POST["done"])){
    if (!empty($_POST['matri']) && !empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['photo']) && !empty($_POST['dnaissance']) && !empty($_POST['contact']) && !empty($_POST['fonction']) && !empty($_POST['salaire'])) {
        $matricule = $_POST['matri'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $photo = $_POST['photo'];
        $date_naissance = $_POST['dnaissance'];
        $contact = $_POST['contact'];
        $fonction = $_POST['fonction'];
        $salaire = $_POST['salaire'];
    
       $qq = "INSERT INTO personnel (matricule, nom, email, photo, Date_naissance, contact, fonction, salaire) VALUES(:matri, :nom, :email, :photo, :dnaissance, :contact, :fonction, :salaire)";
       $qq = $con->prepare($qq);
       $qq->bindParam(':matri', $matricule);
       $qq->bindParam(':nom', $nom);
       $qq->bindParam(':email', $email);
       $qq->bindParam(':photo', $photo);
       $qq->bindParam(':dnaissance', $date_naissance);
       $qq->bindParam(':contact', $contact);
       $qq->bindParam(':fonction', $fonction);
       $qq->bindParam(':salaire', $salaire);
       $qq->execute();
    }

}
header('Location:Ajout_personnel.php');
?>

?>