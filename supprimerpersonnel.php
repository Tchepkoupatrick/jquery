<?php
include "connect.php";  
$id = $_GET['ID'];
$sql = $con->prepare("DELETE FROM personnel WHERE id= :id");
$sql->bindParam(':id', $id);
if ($sql->execute()) {
    header("Location:Liste_personnel.php"); 
}else {
    echo 'Erreur lors de la supression';
}
?>