<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'functions.php';
require_once 'connected.php';
$messages = getAllMessages();
$unansweredCount = countUnansweredMessages();

// Notification de suppression
if (isset($_GET['deleted'])) {
    $alert = '<div class="alert alert-success">Message supprimé avec succès</div>';
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
    <title>Administrateur </title>
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
           
            <div class="container-fluid py-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <?= $alert ?? '' ?>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Messages reçus</h1>
                    <!-- <a href="index.php" class="btn btn-primary">Envoyer un message</a> -->
                </div>

                <?php if (empty($messages)): ?>
                    <div class="alert alert-info">Aucun message à afficher.</div>
                <?php else: ?>
                    <div class="list-group">
                        <?php foreach ($messages as $message): ?>
                            <div class="list-group-item">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1  bg-light"><?= htmlspecialchars($message['email']) ?></h5>
                                    <small><?= date('d/m/Y H:i', strtotime($message['created_at'])) ?></small>
                                </div>
                                <p class="mb-1 mt-2"><?= nl2br(htmlspecialchars($message['content'])) ?></p>

                                <!-- Boutons d'action -->
                                <div class="mt-3 d-flex justify-content-end gap-2">
                                    <a href="message.php?id=<?= $message['id'] ?>" class="btn btn-sm btn-primary">
                                        Répondre
                                    </a>
                                    <form method="post" action="delete_message.php" class="d-inline">
                                        <input type="hidden" name="id" value="<?= $message['id'] ?>">
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce message?')">
                                            Supprimer
                                        </button>
                                    </form>
                                </div>

                                <?php if (!empty($message['response'])): ?>
                                    <div class="mt-3 p-2 bg-light rounded">
                                        <strong>Réponse :</strong>
                                        <p><?= nl2br(htmlspecialchars($message['response'])) ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
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