<?php
    header('Content-Type: text/html; charset=UTF-8');
    setlocale(LC_ALL, "fr_FR.UTF8", "French", "fra_fra");
    session_start();
    include_once('bdd.php');

    $pseudo = $_SESSION['pseudo'];
    
    $idquerymembre = $pdo->prepare("SELECT id_membre FROM membres WHERE pseudo_membre='$pseudo'");
    $idquerymembre->execute();
    $current_user_membre = $idquerymembre->fetchAll();
    foreach ($current_user_membre as $membres) {
        $id_user = $membres['id_membre'];
    }

    $photo = $_GET['photo'];
    $titre = $_GET['titre'];
    $auteur = $_GET['auteur'];    
    $genre = $_GET['genre'];
    $editeur = $_GET['editeur'];
    $resume = $_GET['resume'];
    $date_parrution =  utf8_encode(strftime('%d %B %Y',strtotime($_GET['date_parution'])));
    $date_ajout =  utf8_encode(strftime('%d %B %Y',strtotime($_GET['date_creation'])));
    $note = $_GET['note'];

    $id_book_query = $pdo->prepare("SELECT id_livre FROM livres WHERE titre='$titre'");
    $id_book_query->execute();
    $current_book_id = $id_book_query->fetchAll();
    foreach ($current_book_id as $res) {
        $id_livre = $res['id_livre'];
    }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>BookClub - Livre</title>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <!-- css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<style>
.addtolib {
    background-color: #f0e9af8c;
    padding: 15%;
    padding-right: 0;
    padding-left: 0;
    height: 130px;
    width: 130px;
}

.goto_profil:hover {
    color: yellow;

}
</style>

<body>
    <div class='body_box'>
        <!-- la barre de navigation responsive avec Bootstrap -->
        <?php include_once('navbar.php') ?>

        <!-- contenu de la page dans la div content divisée en grilles avec Bootstrap -->
        <div class="container content" style="padding:2%;margin-top:5%">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xl-6" style="padding-left:2%;">
                    <div class="row">
                        <div class="col-md-1 col-lg-1 col-xl-1"></div>

                        <div class="col-md-10 col-lg-10 col-xl-10">
                            <?php echo "<img style=\"width: 300px; height: 300px; border: 1px solid rgba(123, 94, 56, 0.61)\" src=$photo >" ?>
                        </div>

                        <div class="col-md-1 col-lg-1 col-xl-1"></div>
                    </div>

                    <div class="container" style="margin-top:5px;padding-left:11%;padding-right:25%;" name="tag_box">
                        <div name="type_tag" class="tag_style">
                            genre <?php echo $genre?>
                        </div>

                        <div name="editor_tag" class="tag_style">
                            éditeur <?php echo $editeur?>
                        </div>

                        <div name="author_tag" class="tag_style">
                            auteur <?php echo $auteur?>
                        </div>
                    </div>
                    <?php 
                if (isset($_SESSION['IS_CONNECTED'])) {
                    if ($_SESSION['table']  == 'membres') { 

                        $sql = "SELECT COUNT(*) from bib_perso WHERE id_membre ='$id_user' AND id_livre='$id_livre'"; // for checking >1 records
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindParam(1, $_GET['id'], PDO::PARAM_INT);
                        $stmt->execute();

                        if($stmt->fetchColumn()){?>

                    <h3
                        style="margin-left:9%;margin-top:15%;letter-spacing: 2px;font-size: 26px;color: rgb(100, 54, 6);text-align: center;">
                        Tu as déjà ajouté ce livre à ta bibliothèque !
                    </h3>

                    <div class="row" style="margin-top:10%;margin-left:5%">
                        <div class="col-md-4 col-lg-4 col-xl-4">
                            <div style="padding:5%;padding-left:12%;background-color:grey;" class="addtolib">
                                <img style=" width: 70px; height:70px; margin-left:10%"
                                    src="../css/images/plan_to.png" />
                                <h4
                                    style="width:90%;margin-top:5%;letter-spacing: 2px;font-size: 16px;text-align: center;">
                                    Je prévois de lire</h4>
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-4 col-xl-4">
                            <div style="padding-left:22%;background-color:grey;" class="addtolib">
                                <img style="width: 70px; height:70px" src="../css/images/reading.png" />
                                <h4 style="margin-top:5%;letter-spacing: 2px;font-size: 16px;">
                                    Je le lis</h4>
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-4 col-xl-4">
                            <div style="padding-left:22%;background-color:grey;" class="addtolib">
                                <img style="width: 70px; height:70px" src="../css/images/finished.png" />
                                <h4 style="margin-top:5%;letter-spacing: 2px;font-size: 16px;">
                                    Déjà lu!</h4>
                            </div>
                        </div>
                        <a href="./profil.php" style="text-decoration:none;">
                            <h3 style="margin-top:15%;letter-spacing: 2px;font-size: 20px;color: rgb(100, 54, 6);text-align: center;"
                                onMouseOver="this.style.color='rgb(166, 123, 78)'"
                                onMouseOut="this.style.color='rgb(100, 54, 6)'">

                                -> Aller voir ma bibliothèque
                            </h3>
                        </a>

                    </div>

                    <?php 
                        } else {
                    ?>
                    <h3
                        style="margin-left:9%;margin-top:15%;letter-spacing: 2px;font-size: 26px;color: rgb(100, 54, 6);text-align: center;">
                        Ajoute-le dans ta bibliothèque !
                    </h3>

                    <div class="row" style="margin-top:10%;margin-left:5%">
                        <div class="col-md-4 col-lg-4 col-xl-4">
                            <form action="add_to_lib.php" style="margin-top:5%;" method="post">
                                <input type="id_user" style="display:none" name="id_user"
                                    value="<?php echo "$id_user" ?>" required />
                                <input type="id_book" style="display:none" name="id_book"
                                    value="<?php echo "$id_livre" ?>" required />
                                <input type="state" style="display:none" name="state" value="plan_to_read" required />
                                <button style="background-color:transparent;border:none;" type="submit">
                                    <div style="padding:5%;padding-left:12%" class="addtolib">
                                        <img style=" width: 70px; height:70px; margin-left:10%"
                                            src="../css/images/plan_to.png" />
                                        <h4
                                            style="width:90%;margin-top:5%;letter-spacing: 2px;font-size: 16px;color: rgb(100, 54, 6);text-align: center;">
                                            Je prévois de lire</h4>
                                    </div>
                                </button>
                            </form>
                        </div>

                        <div class="col-md-4 col-lg-4 col-xl-4">
                            <form action="add_to_lib.php" style="margin-top:5%;" method="post">
                                <input type="id_user" style="display:none" name="id_user"
                                    value="<?php echo "$id_user" ?>" required />
                                <input type="id_book" style="display:none" name="id_book"
                                    value="<?php echo "$id_livre" ?>" required />
                                <input type="state" style="display:none" name="state" value="reading" required />
                                <button style="background-color:transparent;border:none;" type="submit">
                                    <div class="addtolib">
                                        <img style="width: 70px; height:70px" src="../css/images/reading.png" />
                                        <h4
                                            style="margin-top:5%;letter-spacing: 2px;font-size: 16px;color: rgb(100, 54, 6);">
                                            Je le lis</h4>
                                    </div>
                                </button>
                            </form>

                        </div>

                        <div class="col-md-4 col-lg-4 col-xl-4">
                            <form action="add_to_lib.php" style="margin-top:5%;" method="post">
                                <input type="id_user" style="display:none" name="id_user"
                                    value="<?php echo "$id_user" ?>" required />
                                <input type="id_book" style="display:none" name="id_book"
                                    value="<?php echo "$id_livre" ?>" required />
                                <input type="state" style="display:none" name="state" value="finished" required />
                                <button style="background-color:transparent;border:none;" type="submit">
                                    <div class="addtolib">
                                        <img style="width: 70px; height:70px" src="../css/images/finished.png" />
                                        <h4
                                            style="margin-top:5%;letter-spacing: 2px;font-size: 16px;color: rgb(100, 54, 6);">
                                            Déjà lu!</h4>
                                    </div>
                                </button>
                            </form>
                        </div>
                    </div>


                    <?php 
                        }
                    }
                } else { ?>
                    <p>Connectez-vous pour ajouter ce livre à votre bibliothèque !</p>
                    <?php
                } ?>
                </div>

                <div class=" col-md-6 col-lg-6 col-xl-6">
                    <h1 style="text-align:left;margin-left:0;margin-top:5%;"><?php echo $titre?></h1>
                    <h1 style="text-align:left;margin-left:0;margin-bottom:20px;">De <?php echo $auteur?>
                    </h1>

                    <h3 style="margin-right:5%;font-size:16px;">Publié le
                        <?php echo $date_parrution ?></h3>

                    <h3 style="margin-right:5%;font-size:16px;">Ajouté le
                        <?php echo $date_ajout ?></h3>

                    <h3 style="text-align:left;margin-top:10%;">Résumé</h3>
                    <p
                        style="width:70%;height:auto;background-color:white;border:1px solid rgba(123, 94, 56, 0.61);padding:1%;margin:10%;">
                        <?php echo $resume?>
                    </p>

                    <?php 
                    if (isset($_SESSION['IS_CONNECTED'])) {
                        if ($_SESSION['table']  == 'root') { ?>
                    <a href="moderation_livres.php">
                        <button class="valider_bouton" type="submit">
                            Modifier ou supprimer ce livre ?
                        </button>
                    </a>
                    <?php    
                        }
                    }?>
                </div>
            </div>
        </div>

        <!--footer-->
        <?php include_once('footer.php') ?>
    </div>
</body>

</html>