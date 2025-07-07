<?php
    include 'connect.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM administrateur WHERE email = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && $user['mot_de_passe']===$password) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('location: administrateur.php');
        }else{
            $error = 'email ou mot de passe incorrect'; 
        }
    }
?>





<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <title>Connexion</title>
        <link rel="stylesheet" href="st.css">
    </head>
    <body>
        <div class="container">
           <div class="row">
            <div class="col-lg-6">
            <h5 class="ms-5"><?php if (isset($error)) : ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                        <?php
                            endif;
                        ?></h5>
                <form class="form-control" action="" method="POST">
                    <h2>Connexion</h2> 
                    <input type="email" placeholder="   Email" name="email" required style="color: rgb(7, 13, 19);">
                    <input type="password" placeholder="   Mot de passe" name="password" required style="color: rgb(7, 13, 19);">
                    <div class="d-flex mt-4">
                        <div class="d-flex justify-content-center align-items-center">
                        <!-- <i><a href="connet.php" class="cancel btn btn-danger ms-4" style="text-decoration: none;">annuler</a></i> -->
                        <center>
                        <i><input type="submit" value="Connexion" name="done" ></i>
                        </center>
                        <!-- <i><input type="submit" value="Valider" name="done" ></i> -->
                        </div>
                        
                    </div>
                 </form>
            </div>
           </div>
        </div>

        
        <div class="container">
            <div class="ring"></div>
            <div class="ring"></div>
            <div class="ring"></div>
        </div>
        

    </body>
</html>