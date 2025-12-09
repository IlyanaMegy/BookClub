<?php
    include_once('bdd.php');
    session_start();
    $pseudo = $_POST['pseudo'];
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    $pays = $_POST['pays'];
    $sexe = $_POST['sexe'];
    $age = $_POST['age'];
    $date_creation = $_POST['date_creation'];
    $role = $_POST['role'];
    

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>BookClub - Modifiez rôle</title>
    <meta name="description" content="Modification rôle membre" />

    <!-- fichiers css dans un dossier css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_starter.css">
</head>

<body class="container-fluid windows">
    <div class="container content"
        style="width:800px;border:none;padding:5%;margin-top:20px;background-color:rgba(206, 192, 51, 0.44);">
        <div class="container" style="padding:10%;padding-top:2%;background-color:white;">
            <a href="home.php"><img class='logo' style="padding-left:33%;" src="../logo/logo_lighter.png"
                    alt="BookClub logo" /></a>

            <button class="bouton_retour"
                onclick="window.location.href = 'http://localhost:80/Bookclub/php/moderation_membres.php';">Retour</button>

            <h2 class="subtitle">- Espace Administrateurs -</h2>

            <div class="text"
                style="padding:5%;text-align:center;font-size:25px;border:1px solid;border-left:none;border-right:none;">
                Quel doit être le rôle de <?php echo $pseudo ?>?
            </div>

            <div class="row" style="margin-top:5%;">
                <div class="col-md-1 col-lg-1 col-xl-1"></div>

                <div class="col-md-10 col-lg-10 col-xl-10">
                    <form action="update_donnees_membre.php" style="margin-left:10%;" method="post">
                        <select name="role" class="form_select">
                            <option value="Membre">Membre</option>
                            <option value="Admin">Admin</option>
                        </select>

                        <input type="hidden" name="pseudo" value="<?php echo $pseudo ?>" />
                        <input type="text" name="mail" style="display:none;" value="<?php echo $mail; ?>" />
                        <input type="text" name="mdp" style="display:none;" value="<?php echo $mdp; ?>" />
                        <input type="text" name="age" style="display:none;" value="<?php echo $age; ?>" />
                        <input type="text" name="pays" style="display:none;" value="<?php echo $pays; ?>" />
                        <input type="text" name="date_creation" style="display:none;"
                            value="<?php echo $date_creation ?>" />
                        <input type="text" name="sexe" style="display:none;" value="<?php echo $sexe; ?>" />
                        <button class="inscription_boutons" style="height:40px;border-color:gray;color:black;"
                            type=submit>
                            Modifier </button>
                    </form>
                </div>

                <div class="col-md-1 col-lg-1 col-xl-1"></div>
            </div>
        </div>
    </div>
</body>

</html>