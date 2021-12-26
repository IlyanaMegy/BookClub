<?php
include_once('bdd.php');
session_start();
$query1 = $pdo->prepare('SELECT * FROM livres');
$query1->execute();
$liste = $query1->fetchAll();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>BookClub - Modération livres</title>
    <meta name="description" content="Formulaire modification bibliothèque" />

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

        <h1 class="title_page2">Modération de la bibliothèque</h1>

        <h2 class="subtitle">- Espace Administrateurs -</h2>

        <div class="text" style="padding:5%;padding-bottom:0;font-size:23px;">
            <p>Gérons ensemble la bibliothèque de livres</p>
        </div>

        <div class="row" style="padding:5%;padding-left:0;padding-right:0;">
            <div class="col-md-5 col-lg-5 col-xl-5"
                style="background-color:rgba(206, 192, 51, 0.44);margin-left:3%;padding:5%;">
                <p style="letter-spacing:2px;text-align:center;font-size:20px;margin-bottom:20%;">Supprimer un livre</p>

                <form action="suppresion_livre.php" style="padding-left:7%;" method="post">
                    <input type="text" name="titre" placeholder="Titre du livre" />
                    <button class="valider_bouton" style="margin-left:12%;margin-top:5%;" type="submit"
                        name="supp_l">Supprime-le</button>
                </form>
            </div>

            <div class="col-md-1 col-lg-1 col-xl-1"></div>

            <div class="col-md-5 col-lg-5 col-xl-5" style="background-color:rgba(206, 192, 51, 0.44);padding:5%;">
                <p style="letter-spacing:2px;text-align:center;font-size:19px;">Modifier les données d'un livre</p>

                <form action="form_modif_livre.php" style="padding-left:7%;" method="post">
                    <input type="text" name="titre" placeholder="Titre du livre" />
                    <button class="valider_bouton" style="margin-left:12%;margin-top:5%;" type="submit"
                        name="modif_l">Modifie-le</button>
                </form>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <?php foreach ($liste as $donnees) { ?>
                    <form action="form_modif_livre.php" style="padding-left:7%;" method="post">
                        <td>
                            <input type="text" name="titre" style="display:none;" value="
                                <?php echo $donnees['titre']; ?>" />
                            <?php echo $donnees['titre']; ?>

                        </td>
                        <td>
                            <input type="text" name="auteur" style="display:none;" value="
                                <?php echo $donnees['auteur']; ?>" />
                            <?php echo $donnees['auteur']; ?>
                        </td>
                        <td>
                            <input type="text" name="editeur" style="display:none;" value="
                                <?php echo $donnees['editeur']; ?>" />
                            <?php echo $donnees['editeur']; ?>
                        </td>
                        <td>
                            <input type="text" name="date_parrution" style="display:none;" value="
                                <?php echo $donnees['date_parrution']; ?>" />
                            <?php echo $donnees['date_parrution']; ?>
                        </td>
                        <input type="text" name="resume" style="display:none;"
                            value="<?php echo $donnees['resume']; ?>" />
                        <input type="text" name="genre" style="display:none;" value="
                                <?php echo $donnees['genre']; ?>" />
                        <input type="text" name="photo" style="display:none;" value="
                                <?php echo $donnees['photo']; ?>" />
                        <input type="text" name="note" style="display:none;" value="
                                <?php echo $donnees['note']; ?>" />
                        <td><button class="valider_bouton" type="submit" name="modif_l">Modifie-le</button></td>

                    </form>

                </tr>
                <?php } ?>
            </thead>
        </table>
    </div>
</body>

</html>