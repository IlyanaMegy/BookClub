<?php 
   session_start();
   include_once('bdd.php');
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Accueil</title>

      <!-- css -->
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/style.css">

   </head>
   
   <body>
        <div class='body_box'>
            <!-- la barre de navigation responsive avec Bootstrap -->
            <?php include_once('navbar.php') ?>

            <div class="container content"> 
                <!-- php ici, 
                get informations de l'utiliateur connecté:
                photo profil, pseudo, statut, date creation compte, bio,
                nombre livres lus, livres à lire, livres en lecture, total
                6 derniers livres ajoutés dans la bibliothèques, 6 max livres favoris -->

                <!-- ajouter boutons:
                amis
                livres lus (lien vers page finished.php)
                livres à lire (lien vers page next_book.php)
                livres en cours (lien vers page reading.php)
                 -->
            </div>

            <!--footer-->
            <?php include_once('footer.php') ?>
        </div>
   </body>
</html>