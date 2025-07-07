<?php
session_start();
// error_reporting(E_ALL);
// ini_set('display_errors', 1);


if(!isset($_SESSION["user_id"])){
    header('location: connet.php');
    exit;
}



error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'functions.php';
require_once 'connected.php';

require_once 'functions.php';
require_once 'mail_config.php';

if (!isset($_GET['id'])) {
    header('Location: view_messages.php');
    exit;
}

$messageId = $_GET['id'];
$message = getMessageById($messageId);

if (!$message) {
    header('Location: view_messages.php');
    exit;
}

// Traitement de la suppression
if (isset($_POST['delete'])) {
    if (deleteMessage($messageId)) {
        header('Location: view_messages.php?deleted=1');
        exit;
    }
}

// Traitement de la réponse
if (isset($_POST['reply'])) {
    $responseContent = filter_input(INPUT_POST, 'response', FILTER_DEFAULT);
    $responseContent = htmlspecialchars(trim($responseContent));
    
    if (!empty($responseContent)) {
        $emailSent = sendEmailResponse(
            $message['email'],
            "Réponse à votre message",
            $responseContent
        );
        
        if ($emailSent) {
            // Marquer comme répondu dans la base
            updateResponse($messageId, $responseContent);
            $success = "Réponse envoyée avec succès!";
        } else {
            $error = "Erreur lors de l'envoi de la réponse";
        }
    } else {
        $error = "Veuillez écrire une réponse";
    }
}

$unansweredCount = countUnansweredMessages();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="vendor/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="vendor/fontawesome/css/all.min.css">
    <script src="jquery-ui-1.14.0-beta.2/jquery-ui.js"></script>
    <script src="jquery-ui-1.14.0-beta.2/external/jquery/jquery.js"></script>
    <script src="jquery-ui-1.14.0-beta.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="2.css">
    <title>Message de <?= htmlspecialchars($message['email']) ?></title>
</head>

<body>
    <div class="container-fliud text-dark">
        <div class="sidebar">
            <div class="d-flex justify-content-center align-items-center ">
                <a href="" class="nav-link text-light">
                    <span class=" hiding admin" style="font-size: 20px;">ADMINISTRATEUR</span></a>
            </div>
            <div>
                <center>
                    <img src="logo.jpg" alt="" class="image">
                </center>
                <a href="administrateur.html">
                    <h5><i class="fa fa-universal-access mx-3"></i><span class=" hiding">accueil</span></h5>
                </a>
                <div id="accordion">
                    <a href="">
                        <h5><i class="fa fa-user mx-3"></i><span class=" hiding">personnel</span></h5>
                    </a>
                    <div class=" hiding" style="font-size: 17px;">
                        <a href="Ajout_personnel.php"><i class="fa fa-plus mx-3"> </i>ajoute du personnel</a>
                        <a href="Liste_personnel.php"><i class="fa fa-plus mx-3"> </i>Liste du personnel</a>

                    </div>
                    <a href="">
                        <h5><i class="fa fa-angle-double-up mx-3"></i><span class=" hiding">vente</span></h5>
                    </a>
                    <div class=" hiding" style="font-size: 17px;">
                        <a href="Enregistrement.vente.php" class="" , style="font-size: 14px;"><i class="fa fa-plus mx-3"> </i>Enregistrement d'une vente</a><br>
                        <a href="liste_vente.php" class="" , style="font-size: 15px;"><i class="fa fa-plus mx-3"> </i>Liste des voitures vendu</a>

                    </div>
                    <a href="">
                        <h5><i class="fa fa-angle-double-down mx-3"></i><span class=" hiding">Achat</span></h5>
                    </a>
                    <div class=" hiding" style="font-size: 15px;">
                        <a href="Enregistrement.achat.php"><i class="fa fa-plus mx-3"> </i>Enregistrement</a><br>
                        <a href="Liste_achat.php" class="" , style="font-size: 15px;"><i class="fa fa-plus mx-3"> </i>Liste des voitures acheter</a>
                    </div>

                    <a href="">
                        <h5><i class="fa fa-bolt mx-3"></i><span class=" hiding">Location</span></h5>
                    </a>
                    <div class=" hiding" style="font-size: 17px;">
                        <a href="Enregistrement.location.hphp"><i class="fa fa-plus mx-3"> </i>Enregistrement</a><br>
                        <a href="Liste_location.php"><i class="fa fa-plus mx-3"> </i>Liste des voitures loué</a>
                    </div>
                    <a href="">
                        <h5><i class="fa fa-hourglass mx-3"></i><span class=" hiding">Financement</span></h5>
                    </a>
                    <div class=" hiding" style="font-size: 17px;">
                        <a href="Enregistrement.financement.php"><i class="fa fa-plus mx-3"> </i>Enregistrement</a><br>
                        <a href="liste_financement.php" class="" , style="font-size: 15px;"><i class="fa fa-plus mx-3"> </i>Liste des voitures financé</a>

                    </div>
                    <a href="">
                        <h5><i class="fa fa-exchange mx-3"></i><span class=" hiding">Reprise</span></h5>
                    </a>
                    <div class=" hiding" style="font-size: 17px;">
                        <a href="Enregistrement.reprise.php"><i class="fa fa-plus mx-3"> </i>Enregistrement</a><br>
                        <a href="liste_reprise.php" class="" , style="font-size: 14px;"><i class="fa fa-plus mx-3"> </i>Liste des voitures échange</a>

                    </div>
                    <a href="">
                        <h5><i class="fa fa-ils mx-3"></i><span class=" hiding" style="font-size: 18px;">Rendez-vous</span></h5>
                    </a>
                    <div class=" hiding" style="font-size: 17px;">
                        <a href="Enregistrement.rendezv.php"><i class="fa fa-plus mx-3"> </i>Enregistrement</a> <br>
                        <a href="Liste_rendez-vous.php"><i class="fa fa-plus mx-3"> </i>Liste des rendez-vous</a> <br>

                    </div>
                </div>
                <a href="Ajout d'un vehicule.html">
                    <h5><i class="fa fa-plus-circle mx-3"></i><span class=" hiding">Ajoute vehicule</span></h5>
                </a>
            </div>


        </div>
        <div class="container-P">
            <div class="col-lg-12 entete d-flex justify-content-between align-items-center py-4">
                <button class="b">
                    <i class="fa fa-list togle" style="color: white;"></i>
                </button>

                <div class=" d-flex justify-content-center ms-5 pe-5 py-3 m-0">
                    <a href="view_messages.php" class="btn btn-primary position-relative">
                        <i class="fa fa-bell fa-lg text-white ">
                        <?php if ($unansweredCount > 0): ?>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?= $unansweredCount ?>
                                <span class="visually-hidden">messages non lus</span>
                            </span>
                        <?php endif; ?> 
                        </i>
                        </a>
                </div>
                <!-- <a href="#"><i class="fa fa-bell text-white pp" style="position: absolute; right: 3%;"></i></a> -->

            </div>
            <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Lecture du message</h1>
            <a href="view_messages.php" class="btn btn-secondary">Retour</a>
        </div>
        
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <strong><?= htmlspecialchars($message['email']) ?></strong>
                    <small><?= date('d/m/Y H:i', strtotime($message['created_at'])) ?></small>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text"><?= nl2br(htmlspecialchars($message['content'])) ?></p>
            </div>
        </div>
        
        <?php if (isset($success)): ?>
            <div class="alert alert-success"><?= $success ?></div>
        <?php elseif (isset($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        
        <div class="card">
            <div class="card-header bg-primary text-white">
                <strong>Actions</strong>
            </div>
            <div class="card-body">
                <form method="post" class="mb-4">
                    <div class="mb-3">
                        <label for="response" class="form-label">Réponse</label>
                        <textarea class="form-control" id="response" name="response" rows="5" required></textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" name="reply" class="btn btn-success">Envoyer la réponse</button>
                        <button type="submit" name="delete" class="btn btn-danger" 
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce message?')">
                            Supprimer le message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        </div>
    </div>
    <script>
        $(function() {
            $("#accordion").accordion({
                collapsible: true
            });
        });
        $(".togle").click(function() {
            $(".sidebar").toggleClass("sidebar-coll", 1000, "easeOutSine");
            $(".hiding").toggleClass("hide", 500, "easeOutSine");
            $(".image").toggleClass("imagecoll", 1000, "easeOutSine");
        });
    </script>
</body>

</html>