<?php
    session_start();
    include_once('bdd.php');
    
    $pseudo = $_SESSION['pseudo'];
    $query1 = $pdo->prepare("SELECT * FROM membres WHERE pseudo_membre='" . $_SESSION['pseudo'] . "'");
    $query1->execute();
    $liste_membres = $query1->fetchAll();
    foreach ($liste_membres as $membres) {
        $id_membre = $membres['id_membre'];
        $pseudo = $membres['pseudo_membre'];
        $role = $membres['role'];
        $mail = $membres['mail_membre'];
        $pays = $membres['pays'];
        $sexe = $membres['sex'];
        $age = $membres['age'];
        $date = $membres['date_creation'];
        $photo = $membres['photo'];
        $bio = $membres['bio'];
    }
    $query2 = $pdo->prepare("SELECT * FROM root WHERE pseudo_root='" . $_SESSION['pseudo'] . "'");
    $query2->execute();
    $liste_root = $query2->fetchAll();
    foreach ($liste_root as $membres) {
        $pseudo = $membres['pseudo_root'];
        $role = $membres['role'];
        $mail = $membres['mail_root'];
        $pays = $membres['pays'];
        $sexe = $membres['sex'];
        $age= $membres['age'];
        $date = $membres['date_creation'];
        $photo = $membres['photo'];
        $bio = $membres['bio'];
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>BookClub - Profil</title>

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

<body>
    <!-- la barre de navigation responsive avec Bootstrap -->
    <?php include_once('navbar.php') ?>

    <div class='body_box'>
        <!-- contenu de la page dans la div content divisée en grilles avec Bootstrap -->
        <div class="container content" style="padding-left:4%;padding-right:5%;">
            <script>
            function showDiv() {
                document.getElementById('new_pic').style.display = "block";
            }

            function hideDiv() {
                document.getElementById('new_pic').style.display = "none";
            }

            function showButton() {
                document.getElementById('save_bio').style.display = "block";
            }

            function hideButton() {
                document.getElementById('save_bio').style.display = "none";
            }
            </script>


            <div class="row">
                <!--bloc gauche profil utilisateur -->
                <div class="col-md-3 col-lg-3 col-xl-3">
                    <div class="col-md-12"
                        style="background-color:rgba(149, 91, 49, 0.06);padding-top:30px;padding-bottom:30px;">
                        <div class="pic_parent" style="margin-top:2px;">
                            <img class='profil_pic' src="<?php echo $photo; ?>" />

                            <button class='profil_pic edit_pic_button' onclick="showDiv()"></button>
                        </div>

                        <div id="new_pic" class="container" style="display:none;">
                            <form action="ajout_photo.php" method="post" enctype="multipart/form-data">
                                <label for "avatar" style="text-align:center;"> Choisissez une photo de profil :</label>
                                <input type="file" name="file" id="file" style="color:rgb(3, 54, 4);padding:10px;"
                                    accept="image/png, image/jpeg">
                                <button class="bouton_style" style="margin-right:15%;border:none;"
                                    type="submit">Envoyer</button>
                                <button class="bouton_style" style="border:none;" onclick="hideDiv()">Annuler</button>
                            </form>
                        </div>

                        <div class="items_box">
                            <h1 class='pseudo'><?php echo $pseudo?></h1>
                            <?php echo'<img class="icon_gender" src="icons/icon_',$sexe, '.png"/>';?>
                        </div>

                        <div class="three_infos">
                            <h3 class="three_infos_style">Statut: <?php echo $role?>
                                </br>Membre depuis: <?php echo $date?></h3>
                        </div>

                        <!-- contenu bio de l'utilisateur php -->
                        <div class="bio_box">
                            <h3 class="bio_title" style="text-align:center;">Votre bio</h3>
                            <?php echo $bio?>
                        </div>
                    </div>
                    <div class="container" style="padding-top:2px;">
                        <form style="float:right;width:min-content;display:inline;" action="deconnexion.php"
                            method="post">
                            <button class="bouton_style deconnexion" type="submit">Deconnexion</button>
                        </form>

                        <button class="bouton_style edit_profil" name="edit_profil" style="float:right;"
                            onclick="window.location.href = 'http://localhost:8080/Bookclub/php/modification_membre.php';">Compte</button>
                    </div>
                </div>

                <!-- bloc droit stats -->
                <div class="col-md-9 col-lg-9 col-xl-9">
                    <div class="col-md-12" style="background-color:rgba(149, 91, 49, 0.06);padding:30px;">



                        <h1 style="padding:50px;padding-bottom:0;">Statistiques de votre bibliothèque</h1>


                        <div class="books_div" style="margin-top:10%;">

                            <h2 style="text-align:left;">Vos livres enregistrés</h2>

                            <div class="progress" style="margin-left:15px;margin-right:15px;height:30px">
                                <div class="progress-bar progress-bar-success" role="progressbar"
                                    style="font-size:small;width:40%;background-color:green">
                                    livres lus
                                </div>
                                <div class="progress-bar progress-bar-warning" role="progressbar"
                                    style="font-size:small;width:10%;background-color:purple;">
                                    en lecture
                                </div>
                                <div class="progress-bar progress-bar-danger" role="progressbar"
                                    style="font-size:small;width:20%;background-color:orange;">
                                    livres à lire
                                </div>
                            </div>

                            <div class="container">
                                <div class="d-inline">Total livres enregistrés:</div>
                                <div class="d-inline" style="float:center;">PHP number</div>
                                <div class="d-inline"">
                                        <a href=" ../html/library.html" class="more" style="margin-left:30%;">Voir
                                    plus...</a>
                                </div>
                            </div>


                            <div class="row" style="margin-top:10%;">
                                <div class="col-md-4 col-lg-4 col-xl-4 book_statut">
                                    <h3>Livres lus</h3>
                                    <div class="container" style="margin-top:75px">
                                        <div class="d-inline" style="margin-right:60px;">Total</div>
                                        <div class="d-inline">PHP</div>
                                    </div>

                                    <h4 style="font-size:20px;margin-top:50px;">Derniers ajouts</h4>

                                    <div class="row" name="line_1" style="margin-top:10%;height:200px;">
                                        <div class="col-md-6 col-lg-6 col-xl-6" name="pic_left" class="show_book">
                                            livre avec photo titre auteur en 100*100
                                        </div>

                                        <div class="col-md-6 col-lg-6 col-xl-6" name="pic_right" class="show_book">
                                            livre avec photo titre auteur en 100*100
                                        </div>
                                    </div>

                                    <div class="row" name="line_2" style="height:200px;">
                                        <div class="col-md-6 col-lg-6 col-xl-6" name="pic_left" class="show_book">
                                            livre avec photo titre auteur en 100*100
                                        </div>

                                        <div class="col-md-6 col-lg-6 col-xl-6" name="pic_right" class="show_book">
                                            livre avec photo titre auteur en 100*100
                                        </div>
                                    </div>

                                    <div class="container more_box">
                                        <a href="../html/finished.html" class="more">Voir plus...</a>
                                    </div>

                                </div>

                                <div class="col-md-4 col-lg-4 col-xl-4 book_statut">
                                    <h3>Livres en cours de lecture</h3>
                                    <div class="container" style="margin-top:48px;">
                                        <div class="d-inline" style="margin-right:60px;">Total</div>
                                        <div class="d-inline">PHP</div>
                                    </div>

                                    <h4 style="font-size:20px;margin-top:50px;">Derniers ajouts</h4>

                                    <div class="row" name="line_1" style="margin-top:10%;height:200px;">
                                        <div class="col-md-6 col-lg-6 col-xl-6" name="pic_left" class="show_book">
                                            livre avec photo titre auteur en 100*100
                                        </div>

                                        <div class="col-md-6 col-lg-6 col-xl-6" name="pic_right" class="show_book">
                                            livre avec photo titre auteur en 100*100
                                        </div>
                                    </div>

                                    <div class="row" name="line_2" style="height:200px;">
                                        <div class="col-md-6 col-lg-6 col-xl-6" name="pic_left" class="show_book">
                                            livre avec photo titre auteur en 100*100
                                        </div>

                                        <div class="col-md-6 col-lg-6 col-xl-6" name="pic_right" class="show_book">
                                            livre avec photo titre auteur en 100*100
                                        </div>
                                    </div>

                                    <div class="container more_box">
                                        <a href="../html/reading.html" class="more">Voir plus...</a>
                                    </div>

                                </div>

                                <div class="col-md-4 col-lg-4 col-xl-4" style="text-align:center;">
                                    <h3>Livres à lire</h3>
                                    <div class="container" style="margin-top:75px">
                                        <div class="d-inline" style="margin-right:60px;">Total</div>
                                        <div class="d-inline">PHP</div>
                                    </div>

                                    <h4 style="font-size:20px;margin-top:50px;">Derniers ajouts</h4>

                                    <div class="row" name="line_1" style="margin-top:10%;height:200px;">
                                        <div class="col-md-6 col-lg-6 col-xl-6" name="pic_left" class="show_book">
                                            livre avec photo titre auteur en 100*100
                                        </div>

                                        <div class="col-md-6 col-lg-6 col-xl-6" name="pic_right" class="show_book">
                                            livre avec photo titre auteur en 100*100
                                        </div>
                                    </div>

                                    <div class="row" name="line_2" style="height:200px;">
                                        <div class="col-md-6 col-lg-6 col-xl-6" name="pic_left" class="show_book">
                                            livre avec photo titre auteur en 100*100
                                        </div>

                                        <div class="col-md-6 col-lg-6 col-xl-6" name="pic_right" class="show_book">
                                            livre avec photo titre auteur en 100*100
                                        </div>
                                    </div>

                                    <div class="container more_box">
                                        <a href="../html/next_books.html" class="more">Voir plus...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--footer-->
        <?php include_once('footer.php') ?>
    </div>


</body>

</html>