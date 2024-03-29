<?php
include_once('bdd.php');
session_start();
$query1 = $pdo->prepare('SELECT * FROM membres');
$query1->execute();
$liste = $query1->fetchAll();
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>BookClub - Modération membres</title>
    <meta name="description" content="Formulaire modification membres" />

    <!-- fichiers css dans un dossier css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_starter.css">
</head>

<body class="container-fluid windows">
    <div class="container content" style="width:800px;border:none;">

        <a href="../php/home.php"><img class='logo' style="padding-left:37%;" src="../logo/logo_lighter.png"
                alt="BookClub logo" /></a>

        <button class="bouton_retour"
            onclick="window.location.href = 'http://localhost:8080/Bookclub/php/home.php';">Retour</button>

        <h1 class="title_page2">Modération des utilisateurs</h1>

        <h2 class="subtitle">- Espace Administrateurs -</h2>

        <div class="text" style="padding:5%;padding-bottom:0;font-size:23px;">
            <p>Modérez les lecteurs de BookClub</p>
        </div>

        <div class="row" style="padding:5%;padding-left:0;padding-right:0;">
            <div class="col-md-5 col-lg-5 col-xl-5"
                style="background-color:rgba(206, 192, 51, 0.44);margin-left:3%;padding:5%;">
                <p style="letter-spacing:2px;text-align:center;font-size:20px;margin-bottom:20%;">Supprimer un lecteur
                </p>

                <form action="suppresion_membre.php" style="padding-left:7%;" method="post">
                    <input type="text" name="pseudo_membre" placeholder="Pseudo du lecteur" />
                    <button class="valider_bouton" style="margin-left:5%;margin-top:5%;" type="submit"
                        name="supp_m">Supprime-le</button>
                </form>
            </div>

            <div class="col-md-1 col-lg-1 col-xl-1"></div>

            <div class="col-md-5 col-lg-5 col-xl-5" style="background-color:rgba(206, 192, 51, 0.44);padding:5%;">
                <p style="letter-spacing:2px;text-align:center;font-size:19px;">Modifier le rôle d'un lecteur</p>

                <form action="form_modif_membre.php" style="padding-left:7%;" method="post">
                    <input type="text" name="pseudo" placeholder="Pseudo du lecteur" />
                    <button class="valider_bouton" style="margin-left:5%;margin-top:5%;" type="submit"
                        name="modif_m">Modifie-le</button>
                </form>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <?php foreach ($liste as $donnees) { ?>
                    <form action="form_modif_membre.php" style="padding-left:7%;" method="post">
                        <td>
                            <input type="text" name="pseudo" style="display:none;" value="
                          <?php echo $donnees['pseudo_membre']; ?>" />
                            <?php echo $donnees['pseudo_membre']; ?>
                        </td>
                        <td>
                            <input type="text" name="role" style="display:none;" value="
                            <?php echo $donnees['role']; ?>" />
                            <?php echo $donnees['role']; ?>
                        </td>
                        <input type="text" name="mail" style="display:none;"
                            value="<?php echo $donnees['mail_membre']; ?>" />
                        <input type="text" name="mdp" style="display:none;"
                            value="<?php echo $donnees['mdp_membre']; ?>" />
                        <input type="text" name="age" style="display:none;" value="<?php echo $donnees['age']; ?>" />
                        <input type="text" name="pays" style="display:none;" value="<?php echo $donnees['pays']; ?>" />
                        <input type="text" name="date_creation" style="display:none;"
                            value="<?php echo $donnees['date_creation']; ?>" />
                        <input type="text" name="sexe" style="display:none;" value="<?php echo $donnees['sexe']; ?>" />
                        <td><button class="valider_bouton" type="submit" name="modif_m">Modifie-le</button></td>
                    </form>

                </tr>
                <?php
}?>
            </thead>
        </table>
    </div>
</body>

</html>