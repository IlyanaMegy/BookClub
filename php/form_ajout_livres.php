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
    <title>BookClub - Ajoutez un livre</title>
    <meta name="description" content="Formulaire ajout livre" />
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type="text/javascript" src="../js/search.js"></script>

    <!-- fichiers css dans un dossier css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_starter.css">
</head>

<body class="container-fluid windows">
    <div class="container content" style="width:800px;border:none;">

        <a href="home.php"><img class='logo' style="padding-left:37%;" src="../logo/logo_lighter.png"
                alt="BookClub logo" /></a>

        <button class="bouton_retour"
            onclick="window.location.href = 'http://localhost:8080/Bookclub/php/home.php';">Retour</button>

        <h1 class="title_page2" style="margin-left:15%;">Partagez un nouveau livre</h1>

        <div class="text" style="padding:5%;padding-bottom:0;padding-top:0;">
            <p style="margin-top:20px;"></p>Indiquez-nous juste le titre du livre.</p>
        </div>

        <div class="container" style="margin-top: 5%;background-color:rgba(206, 192, 51, 0.44);padding: 5%;">
            <div class="row">
                <div class="col-md-2 col-lg-2 col-xl-2"></div>

                <div class="col-md-8 col-lg-8 col-xl-8">
                    <input type="text" placeholder="Titre d'un livre" style="margin-left:8%;" id="terms" />
                    <button class="research_button valider_bouton" style="margin-right:8%;"
                        onClick="search()">Rechercher</button>

                    <ul style="margin-top:5%;text-align:center;" id="results">
                        <div id="results_message" style="display:none;text-align:center;">
                            Attendez quelques secondes, on cherche...
                        </div>
                    </ul>
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2"></div>
            </div>
        </div>
    </div>
</body>

</html>