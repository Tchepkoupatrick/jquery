<?php
include "connect.php";  
$id = $_GET['ID'];
$sql = $con->prepare("DELETE FROM achat WHERE id= :id");
$sql->bindParam(':id', $id);
if ($sql->execute()) {
    header("Location:Liste_achat.php"); 
}else {
    echo 'Erreur lors de la supression';
}
?>