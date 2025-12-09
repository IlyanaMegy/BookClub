<!DOCTYPE html>
<html>

<head>
    <title>BookClub - Connexion</title>

    <!-- fichiers css dans un dossier css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_starter.css">
</head>

<body class="container-fluid index_win">
    <div class="d-flex justify-content-center align-items-center" style="min-height:100vh;">
        <div class="index_wrapper">
            <div class="logo">
                <a href="index.php"><img class="index_logo_img" src="../srcs/icons/logo_bigger.png" alt="BookClub logo" /></a>
            </div>
            <div class="content">
                <div class="title_page">Connectez-vous</div>

                <form action="connexion_form.php" method="post">
                    <label class="input_connexion">
                        <div>Nom utilisateur</div>
                        <input style="color: #eee6c580;" type="text" name="pseudo" required />
                    </label>

                    <label class="input_connexion">
                        <div>Mot de passe</div>
                        <input style="margin-bottom: 0; color: #eee6c580;" type="password" name="mdp" required />
                    </label>

                    <!-- renvoi vers page miss_password.php -->
                    <button class='mdp' onclick="window.location.href='miss_password.php'">Mot de passe oubli&eacute;?</button>

                    <button class="valider_bouton" style="padding: 10px; width:80%;" type="submit">Valider</button>
                </form>

            </div>
        </div>
    </div>
</body>

</html>