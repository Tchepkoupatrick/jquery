<?php
include "connect.php";  
$id = $_GET['ID'];
$sql = $con->prepare("DELETE FROM location WHERE id= :id");
$sql->bindParam(':id', $id);
if ($sql->execute()) {
    header("Location:Liste_location.php"); 
}else {
    echo 'Erreur lors de la supression';
}
?>