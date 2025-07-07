<?php
include "connect.php";  

if (isset($_POST["done"])){
    $matricule = $_POST['matri'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $photo = $_POST['photo'];
    $date_naissance = $_POST['dnaissance'];
    $contact = $_POST['contact'];
    $fonction = $_POST['fonction'];
    $salaire = $_POST['salaire'];
    $id = $_POST["dol"];

    // echo "$fonction";
 $sql = $con->prepare("UPDATE personnel SET matricule = :matri, nom = :nom, email = :email, photo = :photo, Date_naissance = :dnaissance,
 contact = :contact, fonction = :fonction, salaire = :salaire WHERE id = :id ");
$sql->bindParam(':id', $id);
$sql->bindParam(':matri', $matricule);
$sql->bindParam(':nom', $nom);
$sql->bindParam(':email', $email);
$sql->bindParam(':photo', $photo);
$sql->bindParam(':dnaissance', $date_naissance);
$sql->bindParam(':contact', $contact);
$sql->bindParam(':fonction', $fonction);
$sql->bindParam(':salaire', $salaire);
$sql->execute();
if ($sql->execute()) {
    header("Location:Liste_personnel.php");
}else {
    echo 'Erreur lors de la modification';
}   
}else {
    echo "ici lerror";
}