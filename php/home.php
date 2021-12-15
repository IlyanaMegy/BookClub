<?php 
session_start();
include_once('bdd.php');
$query1 = $pdo->prepare('SELECT * FROM livres');
$query1->execute();
$liste_livres = $query1->fetchAll();
foreach ($liste_livres as $livres) {
        $id_livres = $livres['id_livre'];
        $photo= $livres['photo'];
        $titre = $livres['titre'];
        $auteur = $livres['auteur'];
        $genre = $livres['genre'];
        $editeur = $livres['editeur'];
        $resume = $livres['resume'];
        $date_parrution = $livres['date_parrution'];
        $note = $livres['note'];
}
$liste = $query1->fetchAll(); 

//list newest books in databse
//list popular books (>=4*)
//if connected, if book in library, list same genre or author books
?>

<!DOCTYPE html>
<!-- Home - Undertale -->
<html>

<head>
    <meta charset="utf-8">
    <title>BookClub - Accueil</title>

    <!-- css/js -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/bootstrap.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</head>

<body>
    <!-- la barre de navigation responsive avec Bootstrap -->
    <div class="fullscreen_bg">

        <nav class="navbar fixed_top navbar-expand-sm justify-content-between">
            <!-- Logo en haut à gauche -->
            <div class="col-xs-1xs col-sm-1 col-md-1 col-lg-1 col-xl-1">
                <a href="index.php"><img class='logo' src="../logo/logo_lighter.png" alt="BookClub logo" /></a>
            </div>

            <div class="col-xs-0 col-sm-0 col-md-0 col-lg-1 col-xl-1"></div>

            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 navbar-collapse" id="navbar_div">
                <!-- liens, celui de la page actuelle est désactivé -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link disabled link_disable" href="home.php">Accueil</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link link_enable" href="about_us.php">BookClub</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link link_enable" href="community.php">Communauté</a>
                    </li>

                    <!-- php ici si utilisateur connecté alors redirection vers page profil.php sinon redirection vers page index.php -->
                    <?php if (isset($_SESSION['IS_CONNECTED'])) {?>
                    <li class="nav-item">
                        <a class="nav-link link_enable" href="profil.php">Profil</a>
                    </li>
                    <?php }?>

                    <li class="nav-item">
                        <a class="nav-link link_enable" href="form_recherche.php">Rechercher un livre</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link link_enable" href="message.php">Messages</a>
                    </li>

                    <?php 
                     if (isset($_SESSION['IS_CONNECTED'])) {
                        if ($_SESSION['table']  == 'root') {
                              
                  ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="color:#d5d54b;padding-left:40%;padding-top:10%;"
                            href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img src="../icons/admin.png" style="height:25px;width:25px;" alt="admin settings">
                        </a>
                        <div class="dropdown-menu drop_style" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item drop_style" href="./moderation_livres.php">Moderation livres</a>
                            <a class="dropdown-item drop_style" href="./moderation_membres.php">Moderation membres</a>
                            <a class="dropdown-item drop_style" href="./form_ajout_livres.php">Ajout de livres</a>
                        </div>
                    </li>
                    <?php    
                        }
                     }else{
                  ?>
                    <li class="nav-item">
                        <a class="nav-link link_enable" style="border:rgb(253, 236, 180) 1px solid;"
                            href="index.php">Identifiez-vous !</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>

        <!-- Message de bienvenue -->
        <div class="container message_box">
            <p class="welcome">Bienvenue sur BookClub</p>
            <p class="text">Répertoriez vos livres préférés
                <br>Et partagez votre avis.
            </p>
        </div>
    </div>

    <!-- le container de la page avec tous les éléments de la page -->
    <div class="container content_box_home">
        <div name="title" style="padding-top:20px;">
            <hr>
            <h1>Nos livres séléctionnés rien que pour vous</h1>
            <hr>
        </div>
        <div class="container" name="selectionS">

            <!--Selection 1 = livres récemment ajoutés-->
            <div id="selection1" class="carousel slide selection1" data-ride="carousel">
                <div class="carousel-inner">

                    <!--slide1-->
                    <div class="carousel-item active" name="slide_1">
                        <div class="row">
                            <div class="col-3"><img class="d-block w-100" src="../selection_livres/img1.png" alt="">
                            </div>
                            <div class="col-3"><img class="d-block w-100" src="../selection_livres/img2.png" alt="">
                            </div>
                            <div class="col-3"><img class="d-block w-100" src="../selection_livres/img3.png" alt="">
                            </div>
                            <div class="col-3"><img class="d-block w-100" src="../selection_livres/img4.png" alt="">
                            </div>
                        </div>
                    </div>

                    <!--slide 2-->
                    <div class="carousel-item" name="slide_2">
                        <div class="row">
                            <div class="col-3"><img class="d-block w-100" src="../selection_livres/img3.png" alt="">
                            </div>
                            <div class="col-3"><img class="d-block w-100" src="../selection_livres/img4.png" alt="">
                            </div>
                            <div class="col-3"><img class="d-block w-100" src="../selection_livres/img5.png" alt="">
                            </div>
                            <div class="col-3"><img class="d-block w-100" src="../selection_livres/img6.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#selection1" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#selection1" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>



            <!--Selection 2 seulement si utilisateur est connecté = séléction personnelle-->
            <div id="selection2" class="carousel slide selection" data-ride="carousel">
                <div class="carousel-inner">

                    <!--slide1-->
                    <div class="carousel-item active" name="slide_1">
                        <div class="row">
                            <div class="col-3"><img class="d-block w-100" src="../selection_livres/img1.png" alt="">
                            </div>
                            <div class="col-3"><img class="d-block w-100" src="../selection_livres/img2.png" alt="">
                            </div>
                            <div class="col-3"><img class="d-block w-100" src="../selection_livres/img3.png" alt="">
                            </div>
                            <div class="col-3"><img class="d-block w-100" src="../selection_livres/img4.png" alt="">
                            </div>
                        </div>
                    </div>

                    <!--slide 2-->
                    <div class="carousel-item" name="slide_2">
                        <div class="row">
                            <div class="col-3"><img class="d-block w-100" src="../selection_livres/img3.png" alt="">
                            </div>
                            <div class="col-3"><img class="d-block w-100" src="../selection_livres/img4.png" alt="">
                            </div>
                            <div class="col-3"><img class="d-block w-100" src="../selection_livres/img5.png" alt="">
                            </div>
                            <div class="col-3"><img class="d-block w-100" src="../selection_livres/img6.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#selection2" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#selection2" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>



            <!--Selection 4 = livres adorés (les mieux notés)-->
            <div id="selection3" class="carousel slide selection" data-ride="carousel">
                <div class="carousel-inner">

                    <!--slide1-->
                    <div class="carousel-item active" name="slide_1">
                        <div class="row">
                            <div class="col-3"><img class="d-block w-100" src="../selection_livres/img1.png" alt="">
                            </div>
                            <div class="col-3"><img class="d-block w-100" src="../selection_livres/img2.png" alt="">
                            </div>
                            <div class="col-3"><img class="d-block w-100" src="../selection_livres/img3.png" alt="">
                            </div>
                            <div class="col-3"><img class="d-block w-100" src="../selection_livres/img4.png" alt="">
                            </div>
                        </div>
                    </div>

                    <!--slide 2-->
                    <div class="carousel-item" name="slide_2">
                        <div class="row">
                            <div class="col-3"><img class="d-block w-100" src="../selection_livres/img3.png" alt="">
                            </div>
                            <div class="col-3"><img class="d-block w-100" src="../selection_livres/img4.png" alt="">
                            </div>
                            <div class="col-3"><img class="d-block w-100" src="../selection_livres/img5.png" alt="">
                            </div>
                            <div class="col-3"><img class="d-block w-100" src="../selection_livres/img6.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#selection3" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#selection3" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <?php
            echo "<h2>Liste des livres :</h2>";
            foreach ($liste_livres as $livres) {
               $photo = $livres['photo'];
               $titre = $livres['titre'];
               $auteur = $livres['auteur'];
               $genre = $livres['genre'];
               $editeur = $livres['editeur'];
               $resume = $livres['resume'];
               $date_parrution = $livres['date_parrution'];
               $note = $livres['note'];
               $parametre = "photo=$photo&titre=$titre&auteur=$auteur&genre=$genre&editeur=$editeur&resume=$resume&date_parrution=$date_parrution&note=$note";
         ?>
        <div class="livres">
            <?php
               echo "<a class=\"decoration\" href=\"livre.php?$parametre\">";
         ?>

            <h2>
                <?php
                  echo "<img style=\"width: 100px; height: 100px\" src=$photo ><br>";
                  echo "$titre<br>";
                  echo "$auteur<br>";
            ?>
            </h2>
            </a>
        </div>

        <?php } ?>
    </div>

    <div>
        <h2>
            Vous ne trouvez pas votre bonheur?
            Proposez-nous un livre que nous ajouterons ici !
        </h2>
        <a href="form_ajout_livres.php">
            <button class="valider_bouton" style="margin-left:40%;">
                Ajouter un livre.
            </button>
        </a>
    </div>

    <!--footer-->
    <?php include_once('footer.php') ?>

</body>

</html>