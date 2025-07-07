<?php
include "connect.php";  
$id = $_GET['ID'];
$sql = $con->prepare("DELETE FROM rendez_vous WHERE id= :id");
$sql->bindParam(':id', $id);
if ($sql->execute()) {
    echo "enregistrement supprimé avec succès";
    header("Location:Liste_rendez-vous.php"); 
}else {
    echo 'Erreur lors de la supression';
}
?>