<?php
include "connect.php";  
$id = $_GET['ID'];
$sql = $con->prepare("DELETE FROM financement WHERE id= :id");
$sql->bindParam(':id', $id);
if ($sql->execute()) {
    header("Location:Liste_financement.php"); 
}else {
    echo 'Erreur lors de la supression';
}
?>