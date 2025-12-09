<?php 
header('Content-Type: text/html; charset=UTF-8');
setlocale(LC_ALL, "fr_FR.UTF8", "French", "fra_fra");
session_start();
include_once('bdd.php');
$query1 = $pdo->prepare('SELECT * FROM livres');
$query1->execute();
$liste_livres = $query1->fetchAll();


//list newest books in databse
$query4newest = $pdo->prepare('SELECT * FROM livres ORDER BY date_ajout DESC LIMIT 4');
$query4newest->execute();
$newest_books4 = $query4newest->fetchAll();

$query6newest = $pdo->prepare('SELECT * FROM livres ORDER BY date_ajout DESC LIMIT 6');
$query6newest->execute();
$newest_books6 = $query6newest->fetchAll();


//list books author of the day
$auteurdujour = "Carol Bells";
$query4author = $pdo->prepare('SELECT * FROM livres WHERE auteur="J.K. Rowling" LIMIT 4');
$query4author->execute();
$authoroftheday4 = $query4author->fetchAll();

$query6author = $pdo->prepare('SELECT * FROM livres WHERE auteur="J.K. Rowling" LIMIT 6');
$query6author->execute();
$authoroftheday6 = $query6author->fetchAll();


//6 random books
$queryrandom4 = $pdo->prepare('SELECT * FROM livres ORDER BY RAND() LIMIT 4');
$queryrandom4->execute();
$randombooks4 = $queryrandom4->fetchAll();

$queryrandom6 = $pdo->prepare('SELECT * FROM livres ORDER BY RAND() LIMIT 6');
$queryrandom6->execute();
$randombooks6 = $queryrandom6->fetchAll();
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

<style>
.decoration {
    background-color: #fffce582;
    height: 250px;
    border: 1px solid #ceb068;
    padding: 15px;
    margin-top: 50px;
}

.add_date {
    color: black;
    font-size: 11px;
    text-decoration: none;
    padding: 10px;
}

.navbar_style {
    background-color: #43311ab6;
    padding: 15px;
}

.nav-item {
    margin: 10px;
    color: #eddcb3; 
}

.logo {
    width: 160px;
    height: 45px;
}
</style>

<body>
    <!-- la barre de navigation responsive avec Bootstrap -->
    <div class="fullscreen_bg">
        <nav class="navbar fixed_top navbar-expand-sm justify-content-between navbar_style">
            <!-- Logo en haut à gauche -->            
            <div class="col-xs-2 col-sm-2 col-md-3 col-lg-3 col-xl-3">
                <div class="col-xs-1xs col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <a href="index.php"><img class='logo' src="../srcs/icons/logo_light_big.png" alt="BookClub logo" /></a>
                </div>
            </div>

            <div class="col-xs-8 col-sm-8 col-md-6 col-lg-6 col-xl-8 navbar-collapse" id="navbar_div">
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
                    <li class="nav-item link_account">
                        <a class="nav-link link_enable"
                            href="index.php">Identifiez-vous !</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>

            <div class="col-xs-2 col-sm-2 col-md-3 col-lg-3 col-xl-1">
            </div>
        </nav>

        <!-- Message de bienvenue -->
        <div class="container message_box">
            <p class="welcome">Bienvenue sur BookClub</p>
            <p class="text">Répertoriez vos livres préférés<br>Et partagez votre avis</p>
        </div>
    </div>

    <!-- le container de la page avec tous les éléments de la page -->
    <div class="container content_box_home">
        <div name="title" style="padding-top:5px;">
            <hr>
            <h1>Nos livres séléctionnés rien que pour vous</h1>
            <hr>
        </div>
        <div class="container" name="selectionS">

            <!--Selection 1 = livres récemment ajoutés-->
            <div id="selection1" class="carousel slide selection1" style="margin-top:15%" data-ride="carousel">
                <h2>Livres récemments ajoutés...</h2>

                <div class="carousel-inner">

                    <!--slide1-->
                    <div class="carousel-item active" name="slide_1">
                        <div class="row" style="width: 80%; margin-left: 10%;">
                            <?php
                            foreach ($newest_books4 as $livres) {
                                $id_livres=$livres['id_livre']; 
                                $photo=$livres['photo'];
                                $titre=$livres['titre']; 
                                $auteur=$livres['auteur']; 
                                $genre=$livres['genre']; 
                                $editeur=$livres['editeur'];
                                $resume=$livres['resume'];
                                $date_ajout = utf8_encode(strftime('%d %B %Y',strtotime($livres['date_ajout'])));
                                $date_parrution=utf8_encode(strftime('%d %B %Y',strtotime($livres['date_parrution'])));
                                $note=$livres['note'];
                                $parametre="photo=$photo&titre=$titre&auteur=$auteur&genre=$genre&editeur=$editeur&resume=$resume&date_parrution=$date_parrution&note=$note&date_ajout=$date_ajout";
                            ?>

                            <div class=" col-3">
                                <div class="decoration">
                                    <a style="text-decoration:none;" href=" livre.php?<?php echo $parametre;?>">
                                        <div style="height:40%;">
                                            <h4 style="text-align:center;"><?php echo $titre ?></h4>
                                        </div>
                                        <div>
                                            <img style="margin-left:25%;" class=" d-block w-50"
                                                src="<?php echo $photo ?>" alt="book_pic">
                                            <p class="add_date">ajouté le </br>
                                                <?php echo $date_ajout ?>
                                            </p>
                                        </div>

                                    </a>
                                </div>

                            </div>

                            <?php 
                            } 
                            ?>
                        </div>
                    </div>

                    <!--slide 2-->
                    <div class="carousel-item" name="slide_2">
                        <div class="row" style="width: 80%; margin-left: 10%;">
                            <?php
                           $i = 0;
                           foreach ($newest_books6 as $livres) {
                               $id_livres=$livres['id_livre']; 
                               $photo=$livres['photo'];
                               $titre=$livres['titre']; 
                               $auteur=$livres['auteur']; 
                               $genre=$livres['genre']; 
                               $editeur=$livres['editeur'];
                               $resume=$livres['resume'];
                               $date_ajout = utf8_encode(strftime('%d %B %Y',strtotime($livres['date_ajout'])));
                               $date_parrution=utf8_encode(strftime('%d %B %Y',strtotime($livres['date_parrution'])));
                               $note=$livres['note'];
                               $parametre="photo=$photo&titre=$titre&auteur=$auteur&genre=$genre&editeur=$editeur&resume=$resume&date_parrution=$date_parrution&note=$note&date_ajout=$date_ajout";
    
                               if ($i > 1 ){?>
                            <div class=" col-3">
                                <div class="decoration">
                                    <a style="text-decoration:none;" href=" livre.php?<?php echo $parametre;?>">
                                        <div style="height:40%;">
                                            <h4 style="text-align:center;"><?php echo $titre ?></h4>
                                        </div>
                                        <div>
                                            <img style="margin-left:25%;" class=" d-block w-50"
                                                src="<?php echo $photo ?>" alt="book_pic">
                                            <p class="add_date">ajouté le </br>
                                                <?php echo $date_ajout?>
                                            </p>
                                        </div>

                                    </a>
                                </div>
                            </div>

                            <?php
                                }
                                $i++;
                            } 
                            ?>
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



            <div id="selection2" class="carousel slide selection" style="margin-top:200px;margin-bottom:200px;"
                data-ride="carousel">
                <h2><?php echo $auteurdujour ?> à l'honneur! </h2>
                <div class="carousel-inner">

                    <!--slide1-->
                    <div class="carousel-item active" name="slide_1">
                        <div class="row" style="width: 80%; margin-left: 10%;">
                            <?php
                            foreach ($authoroftheday4 as $livres) {
                                $id_livres=$livres['id_livre']; 
                                $photo=$livres['photo'];
                                $titre=$livres['titre']; 
                                $auteur=$livres['auteur']; 
                                $genre=$livres['genre']; 
                                $editeur=$livres['editeur'];
                                $resume=$livres['resume'];
                                $date_ajout = utf8_encode(strftime('%d %B %Y',strtotime($livres['date_ajout'])));
                                $date_parrution=utf8_encode(strftime('%d %B %Y',strtotime($livres['date_parrution'])));
                                $note=$livres['note'];
                                $parametre="photo=$photo&titre=$titre&auteur=$auteur&genre=$genre&editeur=$editeur&resume=$resume&date_parrution=$date_parrution&note=$note&date_ajout=$date_ajout";
                                
                            ?>

                            <div class=" col-3">
                                <div class="decoration">
                                    <a style="text-decoration:none;" href=" livre.php?<?php echo $parametre;?>">
                                        <div style="height:40%;">
                                            <h4 style="text-align:center;"><?php echo $titre ?>
                                            </h4>
                                        </div>
                                        <div>
                                            <img style="margin-left:25%;" class=" d-block w-50"
                                                src="<?php echo $photo ?>" alt="book_pic">
                                            <p class="add_date">ajouté le </br>
                                                <?php echo $date_ajout;  ?>
                                            </p>
                                        </div>
                                    </a>
                                </div>

                            </div>

                            <?php 
                            } 
                            ?>
                        </div>
                    </div>

                    <!--slide 2-->
                    <div class="carousel-item" name="slide_2">
                        <div class="row" style="width: 80%; margin-left: 10%;">
                            <?php
                           $i = 0;
                           foreach ($authoroftheday6 as $livres) {
                               $id_livres=$livres['id_livre']; 
                               $photo=$livres['photo'];
                               $titre=$livres['titre']; 
                               $auteur=$livres['auteur']; 
                               $genre=$livres['genre']; 
                               $editeur=$livres['editeur'];
                               $resume=$livres['resume'];
                               $date_ajout = utf8_encode(strftime('%d %B %Y',strtotime($livres['date_ajout'])));
                               $date_parrution=utf8_encode(strftime('%d %B %Y',strtotime($livres['date_parrution'])));
                               $note=$livres['note'];
                               $parametre="photo=$photo&titre=$titre&auteur=$auteur&genre=$genre&editeur=$editeur&resume=$resume&date_parrution=$date_parrution&note=$note&date_ajout=$date_ajout";
    
                               if ($i > 1 ){?>
                            <div class=" col-3">
                                <div class="decoration">
                                    <a style="text-decoration:none;" href=" livre.php?<?php echo $parametre;?>">
                                        <div style="height:40%;">
                                            <h4 style="text-align:center;">
                                                <?php echo $titre ?></h4>
                                        </div>
                                        <div>
                                            <img style="margin-left:25%;" class=" d-block w-50"
                                                src="<?php echo $photo ?>" alt="book_pic">
                                            <p class="add_date">ajouté le </br>
                                                <?php echo $date_ajout; ?>
                                            </p>
                                        </div>

                                    </a>
                                </div>
                            </div>

                            <?php
                                }
                                $i++;
                            } 
                            ?>
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



            <div id="selection3" class="carousel slide selection" style="margin-top:200px;height:500px"
                data-ride="carousel">
                <h2 style:margin-top:200px;>Six livres sélectionnés au
                    hasard.</h2>
                <div class="carousel-inner">

                    <!--slide1-->
                    <div class="carousel-item active" name="slide_1">
                        <div class="row" style="width: 80%; margin-left: 10%;">
                            <?php
                            foreach ($randombooks4 as $livres) {
                                $id_livres=$livres['id_livre']; 
                                $photo=$livres['photo'];
                                $titre=$livres['titre']; 
                                $auteur=$livres['auteur']; 
                                $genre=$livres['genre']; 
                                $editeur=$livres['editeur'];
                                $resume=$livres['resume'];
                                $date_ajout = utf8_encode(strftime('%d %B %Y',strtotime($livres['date_ajout'])));
                                $date_parrution=utf8_encode(strftime('%d %B %Y',strtotime($livres['date_parrution'])));
                                $note=$livres['note'];
                                $parametre="photo=$photo&titre=$titre&auteur=$auteur&genre=$genre&editeur=$editeur&resume=$resume&date_parrution=$date_parrution&note=$note&date_ajout=$date_ajout";
                                
                            ?>

                            <div class=" col-3">
                                <div class="decoration">
                                    <a style="text-decoration:none;" href=" livre.php?<?php echo $parametre;?>">
                                        <div style="height:40%;">
                                            <h4 style="text-align:center;">
                                                <?php echo $titre ?>
                                            </h4>
                                        </div>
                                        <div>
                                            <img style="margin-left:25%;" class=" d-block w-50"
                                                src="<?php echo $photo ?>" alt="book_pic">
                                            <p class="add_date">ajouté
                                                le </br>
                                                <?php echo  $date_ajout; ?>
                                            </p>
                                        </div>

                                    </a>
                                </div>

                            </div>

                            <?php 
                            } 
                            ?>
                        </div>
                    </div>

                    <!--slide 2-->
                    <div class="carousel-item" name="slide_2">
                        <div class="row" style="width: 80%; margin-left: 10%;">
                            <?php
                           $i = 0;
                           foreach ($randombooks6 as $livres) {
                               $id_livres=$livres['id_livre']; 
                               $photo=$livres['photo'];
                               $titre=$livres['titre']; 
                               $auteur=$livres['auteur']; 
                               $genre=$livres['genre']; 
                               $editeur=$livres['editeur'];
                               $resume=$livres['resume'];
                               $date_ajout = utf8_encode(strftime('%d %B %Y',strtotime($livres['date_ajout'])));
                               $date_parrution=utf8_encode(strftime('%d %B %Y',strtotime($livres['date_parrution'])));
                               $note=$livres['note'];
                               $parametre="photo=$photo&titre=$titre&auteur=$auteur&genre=$genre&editeur=$editeur&resume=$resume&date_parrution=$date_parrution&note=$note&date_ajout=$date_ajout";
    
                               if ($i > 1 ){?>
                            <div class=" col-3">
                                <div class="decoration">
                                    <a style="text-decoration:none;" href=" livre.php?<?php echo $parametre;?>">
                                        <div style="height:40%;">
                                            <h4 style="text-align:center;">
                                                <?php echo $titre ?>
                                            </h4>
                                        </div>
                                        <div>
                                            <img style="margin-left:25%;" class=" d-block w-50"
                                                src="<?php echo $photo ?>" alt="book_pic">
                                            <p class="add_date">
                                                ajouté le
                                                </br>
                                                <?php echo  $date_ajout; ?>
                                            </p>
                                        </div>

                                    </a>
                                </div>
                            </div>

                            <?php
                                }
                                $i++;
                            } 
                            ?>
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
        <h2>Liste des livres :</h2>
        <?php
        foreach ($liste_livres as $livres) { 
            $id_livres=$livres['id_livre']; 
            $photo=$livres['photo'];
            $titre=$livres['titre']; 
            $auteur=$livres['auteur']; 
            $genre=$livres['genre']; 
            $editeur=$livres['editeur'];
            $resume=$livres['resume'];              
            $date_parrution=utf8_encode(strftime('%d %B %Y',strtotime($livres['date_parrution'])));
            $note=$livres['note'];
            $date_ajout=utf8_encode(strftime('%d %B %Y',strtotime($livres['date_ajout'])));
            $parametre="photo=$photo&titre=$titre&auteur=$auteur&genre=$genre&editeur=$editeur&resume=$resume&date_parrution=$date_parrution&note=$note&date_ajout=$date_ajout";
        ?>

        <div>
            <?php echo "<a  href=\"livre.php?$parametre\">"; ?>

            <h2>
                <?php
                echo "<img style=\"width: 50px; height: 50px\" src=$photo ><br>";
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
            Proposez-nous un livre que nous
            ajouterons ici !
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