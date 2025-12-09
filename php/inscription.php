<!DOCTYPE html>
<html>

<head>
    <title>BookClub - Inscription</title>
    <meta charset="utf-8">

    <!-- fichiers css dans un dossier css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_starter.css">
</head>

<body class="container-fluid index_win">
    <div class="d-flex justify-content-center align-items-center" style="min-height:100vh;">
        <div class="index_wrapper">
            <div class="logo">
                <a href="../php/index.php"><img class="index_logo_img" src="../srcs/icons/logo_bigger.png" alt="BookClub logo" /></a>
            </div>
            <div class="content">
                <div class="title_page">Inscrivez-vous</div>

                <form method="POST" action="creation_membre.php">
                    <div class="row">
                        <div class="col-6">
                            <label for="pseudo" class="input_form">
                                <div>Nom utilisateur</div>
                                <input class="input_inscription" name="pseudo" type="text" required />
                            </label>
                        </div>

                        <div class="col-6">
                            <label for="mail" class="input_form">
                                <div>Adresse Email</div>
                                <input class="input_inscription" name="mail" type="text" required />
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label for="mdp" class="input_form">
                                <div>Mot de passe</div>
                                <input class="input_inscription" name="mdp" type="text" required />
                            </label>
                        </div>

                        <div class="col-6">
                            <label for="pays" class="input_form">
                                <div>Pays</div>
                                <input class="input_inscription" name="pays" type="text" required />
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6" style="padding-top:5%;">
                            <label for="sexe" class="input_form">
                                <input class="input_inscription" name="sex" type="radio" value="H"> Homme <input type="radio" name="sex" value="F"> Femme
                            </label>
                        </div>

                        <div class="col-6" ">
                            <label for="age" class="input_form">
                                <div>Votre âge</div>
                                <input class="input_inscription" class="age" name="age" type="text" required />
                            </label>
                        </div>
                    </div>

                    <div class=div_buttons>
                        <input class="inscription_boutons" type="button" name="home" value="Retour"
                            onclick="self.location.href='../php/index.php'">
                        <input class="inscription_boutons" type="submit" name="inscription_membre" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>