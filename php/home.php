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
   </head>

   <body>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

      <!-- la barre de navigation responsive avec Bootstrap -->
      <div class="fullscreen_bg">

         <nav class="navbar fixed_top navbar-expand-sm justify-content-between">
            <!-- Logo en haut à gauche -->
            <div class="col-xs-1xs col-sm-1 col-md-1 col-lg-1 col-xl-1">
               <a href=""><img class='logo' src="../logo/logo_lighter.png" alt="BookClub logo" /></a>
            </div>

            <div class="col-xs-0 col-sm-0 col-md-1 col-lg-2 col-xl-2"></div>

            <div class="col-xs-11 col-sm-11 col-md-10 col-lg-9 col-xl-9 navbar-collapse" id="navbar_div">
            <!-- liens, celui de la page actuelle est désactivé -->
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link disabled link_disable" href="../php/home.php">| Accueil</a>
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
            </div>
         </nav>

         <!-- Message de bienvenue -->
         <div class="message_box">
           <p class="welcome">Bienvenue sur BookClub</p>
           <p class="text">Répertoriez vos livres préférés
           <br>Et partagez votre avis.</p>  
         </div>
      </div>


      <?php /*Liens de moderation[en cours]
               Probleme :
               mise en page
               suppresion d'une colonne dans la bdd
               */ ?>
         <?php if (isset($_SESSION['IS_CONNECTED'])) {
               if ($_SESSION['table']  == 'root') {
                     
         ?>
         <div id="admliens">
            <a href="./moderation_livres.php"><button>Moderation livres</button></a>
            <a href="./moderation_membres.php"><button>Moderation membres</button></a>
            <a href="./form_ajout_livres.php"><button>Ajout de livres</button></a>
         </div>
         <?php }
               }
      ?>


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
                        <div class="col-3"><img class="d-block w-100" src="../selection_livres/img1.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="../selection_livres/img2.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="../selection_livres/img3.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="../selection_livres/img4.png" alt=""></div>
                     </div>
                  </div>

                  <!--slide 2-->
                  <div class="carousel-item" name="slide_2">
                     <div class="row">
                        <div class="col-3"><img class="d-block w-100" src="../selection_livres/img3.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="../selection_livres/img4.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="../selection_livres/img5.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="../selection_livres/img6.png" alt=""></div>
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
                        <div class="col-3"><img class="d-block w-100" src="../selection_livres/img1.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="../selection_livres/img2.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="../selection_livres/img3.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="../selection_livres/img4.png" alt=""></div>
                     </div>
                  </div>

                  <!--slide 2-->
                  <div class="carousel-item" name="slide_2">
                     <div class="row">
                        <div class="col-3"><img class="d-block w-100" src="../selection_livres/img3.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="../selection_livres/img4.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="../selection_livres/img5.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="../selection_livres/img6.png" alt=""></div>
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
                        <div class="col-3"><img class="d-block w-100" src="../selection_livres/img1.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="../selection_livres/img2.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="../selection_livres/img3.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="../selection_livres/img4.png" alt=""></div>
                     </div>
                  </div>

                  <!--slide 2-->
                  <div class="carousel-item" name="slide_2">
                     <div class="row">
                        <div class="col-3"><img class="d-block w-100" src="../selection_livres/img3.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="../selection_livres/img4.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="../selection_livres/img5.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="../selection_livres/img6.png" alt=""></div>
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
      
      <div class="container-fluid footer">
         <div class="row" style="width:80%;margin-left:10%;">
            <div class="col-4" name="us_col" style="padding-left:3%;">
               <div style="margin-left:30%;margin-bottom:0%;">
                  <img class='logo' style="height:135px;width:135px;" src="../logo/logo_lighter.png" alt="BookClub logo"/>
               </div>
               
               <p style="letter-spacing:2px;color:rgb(245, 253, 180);text-align:center;font-size:medium;text-align:center;"style="font-size:medium">
               Répertoriez vos livres préférés
               </br>Et partagez votre avis.</p>
            </div> 

            <div class="col-4" name="pages_col" style="padding:0;border:1px solid #4d3c20;border-top:none;border-bottom:none;">
               <p style="letter-spacing:2px;color:rgb(245, 253, 180);text-align:center;margin-top:15%;font-size:20px;">Visitez nos pages</p>
               
               <ul style="padding-left:0;margin-bottom:5%;margin-top:8%;">
                  <li class="footer_li">
                     <a href="../php/home.php" class="footer_text" style="font-size:medium;">Accueil</a>
                  </li>
                     
                  <li class="footer_li">
                     <a href="../html/about_us.html" class="footer_text" style="font-size:medium;">A propos</a>
                  </li>
                     
                  <li class="footer_li">
                     <a href="../html/community.html" class="footer_text" style="font-size:medium;">Communauté</a>
                  </li>
                     
                  <?php if (isset($_SESSION['IS_CONNECTED'])) {?>
                  <li class="footer_li">
                     <a href="../php/profil.php" class="footer_text" style="font-size:medium;">Profil</a>
                  </li>
                  <?php }?>

                  <li class="footer_li">
                     <a href="../html/form_recherche.html" class="footer_text" style="font-size:medium;">Rechercher un livre</a>
                  </li>

                  <li class="footer_li">
                     <a href="../html/message.html" class="footer_text" style="font-size:medium;">Messages</a>
                  </li>
               </ul>
            </div>

            <div class="col-4" name="contact_col" style="padding-left:3%;">
               <p style="letter-spacing:2px;color:rgb(245, 253, 180);text-align:center;margin-top:17%;font-size:20px;">Contact</p>
               
               <ul style="padding-left:0;margin-bottom:5%;margin-top:10%;">
                  <li class="footer_li" style="margin:2%;text-align:left;">
                     <div class="row">
                        <div class="col-3">
                           <div style="padding-left:70%;">
                              <img style="height:25px;width:25px;" src="../icons/phone.png" alt="telephone number"/>
                           </div>
                        </div>
                        <div class="col-9">
                           <a style="font-size:small;" class="footer_text" href="..."> (+33)06.47.20.69.01 </a>
                        </div>
                     </div>
                  </li>

                  <li class="footer_li" style="margin:3%;text-align:left;">
                     <div class="row">
                        <div class="col-3">
                           <div style="padding-left:70%;padding-top:2%;">
                              <img style="height:25px;width:25px;" src="../icons/email.png" alt="email"/>
                           </div>
                        </div>
                        <div class="col-9">
                           <a style="font-size:small;" class="footer_text" href="mailto:axel.boudeau@ynov.com"> axel.boudeau@ynov.com </a>
                        </div>
                     </div>
                  </li>

                  <li class="footer_li" style="margin:2%;text-align:left;">
                     <div class="row">
                        <div class="col-3">
                           <div style="padding-left:70%;padding-top:5%;">
                              <img style="height:25px;width:25px;" src="../icons/adresse.png" alt="address"/> 
                           </div>
                        </div>
                        <div class="col-9">
                           <a class="footer_text" style="font-size:small;" href="https://www.google.com/maps/place/Bordeaux+Ynov+Campus/@44.854186,-0.5684943,17z/data=!3m1!4b1!4m5!3m4!1s0xd55287c2b667971:0xfaa5a2368b146e35!8m2!3d44.854186!4d-0.5663056" target="_blank">
                              89 quai des Chartrons, 33300 Bordeaux.
                           </a>
                        </div>                        
                     </div>
                  </li>
               </ul>
            </div> 
         </div>


      </div>

   </body>
</html>