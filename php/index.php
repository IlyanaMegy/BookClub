<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>BookClub - Entrée</title>

    <!-- fichiers css dans un dossier css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_starter.css">

</head>

<body class="container-fluid index_win">
    <div class="d-flex justify-content-center align-items-center" style="min-height:100vh;">
        <div class="index_wrapper">
            <div class="logo">
                <img src="../srcs/icons/logo_bigger.png" alt="BookClub logo" class="index_logo_img" />
            </div>
            <div class="content">
                <button class="visiteur_bouton" onclick="window.location.href = 'home.php';">Visiteur de passage</button>
                <button class="inscription_bouton" onclick="window.location.href = 'inscription.php';">Nouveau membre</button>
                <button class="connexion_bouton" onclick="window.location.href = 'connexion.php';">Un connaisseur</button>
            </div>
        </div>
    </div>
</body>
</html>
