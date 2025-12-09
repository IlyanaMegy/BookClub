<?php
include_once('bdd.php');
session_start();

$query1 = $pdo->prepare("SELECT * FROM membres WHERE pseudo_membre='" . $_SESSION['pseudo'] . "'");
$query1->execute();
$liste_membres = $query1->fetchAll();
foreach ($liste_membres as $membres) {
   $pseudo = $membres['pseudo_membre'];
   $mail = $membres['mail_membre'];
   $pays = $membres['pays'];
   $age = $membres['age'];
   $bio = $membres['bio'];
}

$query2 = $pdo->prepare("SELECT * FROM root WHERE pseudo_root='" . $_SESSION['pseudo'] . "'");
$query2->execute();
$liste_root = $query2->fetchAll();
foreach ($liste_root as $membres) {
   $pseudo = $membres['pseudo_root'];
   $mail = $membres['mail_root'];
   $pays = $membres['pays'];
   $age = $membres['age'];
   $bio = $membres['bio'];
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Modification données</title>

    <!-- fichiers css dans un dossier css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_starter.css">
</head>

<body class="container-fluid index_win">
    <div class="d-flex justify-content-center align-items-center" style="min-height:100vh;">
        <div class="index_wrapper">
            <div class="logo">
                <a href="../php/home.php"><img class='logo' src="../srcs/icons/logo_bigger.png" alt="BookClub logo" /></a>
            </div>
            <div class="content">
                <div class="title_page">Modifier vos données</div>

                <form method="POST" action="modif_donnees_membre.php">

                    <div class="row">
                        <div class="col-6">
                            <label for="pseudo" class="input_inscription">
                                <div>Nom utilisateur</div>
                                <input class="input_inscription" name="pseudo" type="text" value="<?php echo"$pseudo"?>" required />
                            </label>
                        </div>

                        <div class="col-6">
                            <label for="mail" class="input_inscription">
                                <div>Adresse Email</div>
                                <input class="input_inscription" name="mail" type="email" value="<?php echo"$mail"?>" required />
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label for="pays" class="input_inscription">
                                <div>Pays</div>
                                <input name="pays" class="input_inscription" type="text" value="<?php echo"$pays"?>" required />
                            </label>
                        </div>

                        <div class="col-6" style="padding-left:0;">
                            <label for="age" class="input_inscription">
                                <div style="padding-left:7%;">Votre âge</div>
                                <input class="input_inscription age" name="age" type="number" value="<?php echo"$age"?>" required />
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2"></div>

                        <div class="col-8" style="padding-left:10%;">
                            <label for="bio" class="input_inscription">
                                <div>Votre bio</div>
                                <textarea class="bio" name="bio" type="text" value="<?php echo"$bio"?>" required></textarea>
                            </label>
                        </div>

                        <div class="col-2"></div>
                    </div>

                    <div class=div_buttons>
                        <input class="inscription_boutons" type="button" name="home" value="Retour"
                            onclick="self.location.href='./profil.php'">
                        <input class="inscription_boutons" type="submit" name="inscription_membre" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>