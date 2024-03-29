<!DOCTYPE html>
<html>

<head>
    <title>BookClub - Connexion</title>

    <!-- fichiers css dans un dossier css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_starter.css">

<body class="container-fluid windows">
    <div class="container content" style="margin-top:1px;">
        <a href="index.php"><img class='logo' src="../logo/logo_lighter.png" alt="BookClub logo" /></a>

        <div class="title_page" style="margin-left:20%;">Connectez-vous</div>

        <form action="connexion_form.php" method="post">
            <label class="input_connexion">
                <div>Nom utilisateur</div>
                <input type="text" name="pseudo" required />
            </label>

            <label class="input_connexion">
                <div>Mot de passe</div>
                <input type="password" name="mdp" required />
            </label>

            <button class="valider_bouton" style="height:50px;margin:3%;margin-left:33%;" type="submit">Valider</button>
        </form>

        <!-- renvoi vers page miss_password.php -->
        <button class='mdp' onclick="window.location.href='miss_password.php'">Mot de passe oubli&eacute;?</button>

    </div>
</body>

</html>