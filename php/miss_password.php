<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>BookClub - Oubli mot de passe</title>

        <!-- fichiers css dans un dossier css -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style_starter.css">
    </head>

    <body class="container-fluid windows">
        <div class="container content" style="margin-top:3%;">  
            <a href="index.php"><img class="logo" src="../logo/logo_lighter.png" alt="BookClub logo"/></a>
            
            <div class="title_page">Mot de passe oublié</div>

            <div class="text" style="font-size:15px;margin-top:7%;">
                <p>Pour réinitialiser votre mot de passe, renseignez votre adresse Email ci-dessous.</p>
                <p>Vous recevrez votre mot de passe dans votre boîte mail.</p>
            </div>

            <label class="input_connexion" style="margin-top:10%;">
                <div>Adresse Email</div>
                <input type="text" name="mail" required />
            </label>

            <button class="valider_bouton" style="height:50px;margin:5%;margin-left:33%;" type="submit">Envoyer</button>
        </div>
    </body>
</html>