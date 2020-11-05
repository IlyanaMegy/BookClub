<?php
    include_once('bdd.php');

    if (! empty($_POST['mot_cle'])) {
        $mot_cle = $_POST['mot_cle'];
        $liste_mot_cle = explode(' ', $mot_cle);
    } else {
        $mot_cle = '';
    }
    if (! empty($_POST['titre'])) {
        $titre = $_POST['titre'];
    } else {
        $titre = '';
    }
    if (! empty($_POST['auteur'])) {
        $auteur = $_POST['auteur'];
    } else {
        $auteur = '';
    }
    if (! empty($_POST['genre'])) {
        $genre = $_POST['genre'];
    } else {
        $genre = '';
    }
    if (! empty($_POST['editeur'])) {
        $editeur = $_POST['editeur'];
    } else {
        $editeur = '';
    }
    if (! empty($_POST['note_min'])) {
        $note_min = $_POST['note_min'];
    } else {
        $note_min = 0;
    }
    if (! empty($_POST['note_max'])) {
        $note_max = $_POST['note_max'];
    } else {
        $note_max = 5;
    }
    $query_prepare_requete = "SELECT * FROM livres WHERE titre LIKE '%$titre%' AND auteur LIKE '%$auteur%' AND genre LIKE '%$genre%' AND editeur LIKE '%$editeur%' AND note BETWEEN $note_min AND $note_max"; 
    $query1= $pdo->prepare($query_prepare_requete);
    $query1->execute();
    $liste = $query1->fetchAll();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>BookClub - Résultats de recherche</title>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <!-- css -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
   
    <body>
        <div class='body_box'>
            <!-- la barre de navigation responsive avec Bootstrap -->
            <?php include_once('navbar.php') ?>

            <div class="container content" style="height:1500px;">
                <script>
                    function error() {
                        document.getElementById('error_div').style.display = "block";
                        document.getElementById('no_error_div').style.display = "none";
                    }
                    function no_error() {
                        document.getElementById('no_error_div').style.display = "block";
                        document.getElementById('error_div').style.display = "none";
                    }
                </script>

                <!-- php et js ici
                 affiche tous les livres qui correspondent aux mots clés de la recherche
                 informations: titre auteur et photo
                 liens qui renvoie vers book.php -->

                <!-- 1/ calcul nombre de résultats de la recherche
                     2/ if nbr=0; affiche cette div: (fonction js)-->

                <div class=" container error_research" id="error_div" style="display:none;background-color:pink">
                
                    <h2 style="font-size:20px;margin:0;margin-bottom:5%;width:100%;">Il semblerait qu'il n'y ait pas de résultats de votre recherche : "php mots clés"</h2>
                    <h3 style="margin-left:4%;"> Voici quelques conseils pour vous aider à trouver votre bonheur:</h3>
                    <ul style="list-style-type: none;">
                        <li style="margin:3px;">- Vérifiez l'orthographe des mots utilisés</li>
                        <li style="margin:3px;">- Évitez les abréviations</li>
                        <li style="margin:3px;">- Tapez un minimum de mots clés dans votre recherche</li>
                    </ul>               
                </div>

                <!--else: affiche cette div: (fonction js)-->
                <div class=" container no_error_research" id="no_error_div" style="display:block;">

                    <!-- dans cette div on affiche les livres ou utlisateurs qui répondent aux critères de recherche-->
                    
                    <!-- 1 élément par ligne avec: image, titre et auteur ou pseudo faire une fonction en php avec
                    comme paramètre la liste des livres ou utilisateur
                    for each element in list do :-->


                    <h1>Liste des livres</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Auteur</th>
                                <th>Genre</th>
                                <th>Editeur</th>
                                <th>Note</th>
                            </tr>
                            
                            <tr>
                            <?php foreach ($liste as $donnees) { ?>
                                <td><?php echo $donnees['titre']; ?></td>
                                <td><?php echo $donnees['auteur']; ?></td> 
                                <td><?php echo $donnees['genre']; ?></td> 
                                <td><?php echo $donnees['editeur']; ?></td>
                                <td><?php echo $donnees['note']; ?></td><br>
                            </tr>
                            <?php
                            }
                            ?>
                        </thead>
                    </table>                
                </div>
            </div>
            
            <?php include_once('footer.php') ?>
        </div>
    </body>
</html>