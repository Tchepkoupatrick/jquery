<?php
try {
    $con= new PDO("mysql:host=localhost;dbname=autoquick", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //  echo "connxion reussie";
} catch (PDOException $th) {
    echo "erreur de connexion" . $th->getMessage();
}
?>