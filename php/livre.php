<?php
    $photo = $_GET['photo'];
    $titre = $_GET['titre'];
    $auteur = $_GET['auteur'];    
    $genre = $_GET['genre'];
    $editeur = $_GET['editeur'];
    $resume = $_GET['resume'];
    $date_parrution = $_GET['date_parrution'];
    $note = $_GET['note'];
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>BookClub - Livre</title>

        <!-- css -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
    <div class='body_box'>
        <!-- la barre de navigation responsive avec Bootstrap -->
        <nav class="navbar fixed_top navbar-expand-sm nav_bar_style">
            <!-- Logo en haut à gauche -->
            <a href="../php/home.php"><img class='logo' src="../logo/logo_lighter.png" alt="BookClub logo" /></a>
            
            <!-- liens, celui de la page actuelle est désactivé -->
            <ul class="navbar-nav links_position">
                <li class="nav-item">
                    <a class="nav-link link_enable" href="../php/home.php">| Accueil</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link link_enable" href="../html/about_us.html">| A propos</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link link_enable" href="../html/community.html">| Communauté</a>
                </li>

                <!-- php ici si utilisateur connecté alors redirection vers page profil.php sinon redirection vers page index.html -->
                <?php if (isset($_SESSION['IS_CONNECTED'])) {?>
                <li class="nav-item">
                    <a class="nav-link link_enable" href="profil.php">| Profil</a>
                </li> 
                <?php }?>  
                
                <li class="nav-item">
                    <a class="nav-link link_enable" href="../html/form_recherche.html">| Rechercher un livre</a>            
                </li>
                
                <li class="nav-item">
                    <a class="nav-link link_enable" href="../html/message.html">| Messages</a>            
                </li>               
            </ul>
        </nav>

        <!-- contenu de la page dans la div content divisée en grilles avec Bootstrap -->
        <div class="container content" style="padding:2%;"> 
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xl-6"style="padding-left:2%;">                    
                    <div class="row" style="">
                        <div class="col-md-1 col-lg-1 col-xl-1"></div>

                        <div class="col-md-10 col-lg-10 col-xl-10">
                            <?php echo "<img style=\"width: 300px; height: 300px; border: 1px solid rgba(123, 94, 56, 0.61)\" src=$photo >" ?>
                        </div>

                        <div class="col-md-1 col-lg-1 col-xl-1"></div>
                    </div>

                    <div class="container" style="margin-top:5px;padding-left:11%;padding-right:25%;" name="tag_box">
                        <div name="type_tag" style="" class="tag_style">
                            genre<?php echo $genre?> 
                        </div>

                        <div name="editor_tag" class="tag_style">
                            éditeur<?php echo $editeur?>
                        </div>

                        <div name="author_tag" class="tag_style">
                            auteur<?php echo $auteur?>
                        </div>
                    </div>

                    <div class="row" style="margin-top:5%;">
                        <div class="col-md-4 col-lg-4 col-xl-4"></div>

                        <div class="col-md-4 col-lg-4 col-xl-4">
                            Note <?php echo $note?>                        
                        </div>

                        <div class="col-md-4 col-lg-4 col-xl-4"></div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-6">
                    <h1 style="text-align:left;margin-left:0;margin-top:5%;"><?php echo $titre?></h1> 
                    <h1 style="text-align:left;margin-left:0;margin-bottom:20px;">De <?php echo $auteur?></h1>

                    <h3 style="margin-right:5%;font-size:16px;">Publié le <?php echo $date_parrution?></h3>

                    <h3 style="text-align:left;margin-top:10%;">Résumé</h3>
                    <textarea style="width:70%;height:100px;background-color:white;border:1px solid rgba(123, 94, 56, 0.61);padding:1%;margin;10%;"><?php echo $resume?></textarea>
                </div>
            </div>            
        </div>

        <div class="container-fluid footer">
            <div class="row" style="width:80%;margin-left:10%;">
                <div class="col-4" name="us_col" style="padding-left:3%;">
                    <div style="margin-left:30%;margin-bottom:0%;">
                        <img class='logo' style="height:135px;width:135px;" src="../logo/logo_lighter.png" alt="BookClub logo"/>
                    </div>
                    
                    <p class="footer_text" style="font-size:medium;text-align:center;"style="font-size:medium">
                    Répertoriez vos livres préférés
                    </br>Et partagez votre avis.</p>
                </div> 

                <div class="col-4" name="pages_col" style="padding:0;border:1px solid #4d3c20;border-top:none;border-bottom:none;">
                    <p class="footer_text" style="margin-top:15%;">Visitez nos pages</p>
                    
                    <ul style="padding-left:0;margin-bottom:5%;margin-top:8%;">
                        <li class="footer_li">
                            <a href="../php/home.php" class="footer_links">Accueil</a>
                        </li>
                            
                        <li class="footer_li">
                            <a href="../html/about_us.html" class="footer_links">A propos</a>
                        </li>
                            
                        <li class="footer_li">
                            <a href="../html/community.html" class="footer_links">Communauté</a>
                        </li>
                            
                        <?php if (isset($_SESSION['IS_CONNECTED'])) {?>
                        <li class="footer_li">
                            <a href="../php/profil.php" class="footer_links">Profil</a>
                        </li>
                        <?php }?>

                        <li class="footer_li">
                            <a href="../html/form_recherche.html"" class="footer_links">Rechercher un livre</a>
                        </li>

                        <li class="footer_li">
                            <a href="../html/message.html" class="footer_links">Messages</a>
                        </li>
                    </ul>
                </div>

                <div class="col-4" name="contact_col" style="padding-left:3%;">
                    <p class="footer_text" style="margin-top:17%;">Contact</p>
                    
                    <ul style="padding-left:0;margin-bottom:5%;margin-top:10%;">
                        <li class="footer_li" style="margin:2%;">
                            <div class="row">
                                <div class="col-3">
                                <div style="padding-left:70%;">
                                    <img style="height:25px;width:25px;" src="../icons/phone.png" alt="telephone number"/>
                                </div>
                                </div>

                                <div class="col-9 footer_text" style="font-size:medium;text-align:left;padding-left:5%;">
                                (+33)06.47.20.69.01
                                </div>
                            </div>
                        </li>

                        <li class="footer_li" style="margin:3%;">
                            <div class="row">
                                <div class="col-3">
                                <div style="padding-left:70%;padding-top:2%;">
                                    <img style="height:25px;width:25px;" src="../icons/email.png" alt="email"/>
                                </div>
                                </div>

                                <div class="col-9 footer_text" style="font-size:medium;text-align:left;padding-left:5%;">
                                axel.boudeau@ynov.com
                                </div>
                            </div>
                        </li>

                        <li class="footer_li" style="margin:2%;">
                            <div class="row">
                                <div class="col-3">
                                <div style="padding-left:70%;padding-top:5%;">
                                    <img style="height:25px;width:25px;" src="../icons/adresse.png" alt="address"/> 
                                </div>
                                </div>
                                <div class="col-9 footer_text" style="font-size:medium;text-align:left;padding-left:5%;">
                                89 quai des Chartrons, 33300 Bordeaux, France.
                                </div>
                            </div>
                        </li>
                    </ul>
                </div> 
            </div>
        </div>
    </body>
</html>