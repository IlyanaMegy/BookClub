<?php
    session_start();
    include_once('bdd.php');
    if(isset($_POST['modif_l'])) {
        
        $titre = trim($_POST['titre']);
        echo $titre;
        $oldtitle = trim($_POST['titre']);
        echo $oldtitle;
        $photo= trim($_POST['photo']);
        $auteur = trim($_POST['auteur']);
        $genre = trim($_POST['genre']);
        $editeur = trim($_POST['editeur']);
        $resume = trim($_POST['resume']);
        $date_parrution = trim($_POST['date_parrution']);
        $note = trim($_POST['note']);   
    }
?>






<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>BookClub - Modifiez un livre</title>
    <meta name="description" content="Formulaire modification livre" />
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type="text/javascript" src="../js/search.js"></script>

    <!-- fichiers css dans un dossier css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_starter.css">

</head>

<body class="container-fluid windows">
    <div class="container content" style="width:800px;border:none;">
        <a href="home.php"><img class='logo' style="padding-left:32%;" src="../logo/logo_lighter.png"
                alt="BookClub logo" /></a>

        <button class="bouton_retour"
            onclick="window.location.href = 'http://localhost:80/Bookclub/php/moderation_livres.php';">Retour</button>

        <h1 style="margin-left:23%" class="title_page2">Modifier un livre</h1>

        <h2 class="subtitle" style="margin-left:23%">- Espace Administrateurs -</h2>

        <div class="text" style="padding:5%;padding-bottom:0;">
            <p style="margin-left:5%;">Modifier les données de ce livre
                </br>en remplissant ce formulaire!</p>
        </div>

        <style>
        .profil_pic:hover {
            opacity: 10%;
            outline: 0;
        }

        .edit_pic_button {
            background-color: transparent;
            background-image: url(images/edit.png);
            background-repeat: no-repeat;
            background-position: 100% 0%;
        }


        #new_pic {
            background-color: white;
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 10px;
        }
        </style>

        <script>
        function showDiv() {
            document.getElementById('new_pic').style.display = "block";
        }

        function hideDiv() {
            document.getElementById('new_pic').style.display = "none";
        }
        </script>

        <form action="update_livres.php" style="margin-top:5%;" method="post">
            <div class="container" style="padding:3%;background-color:rgba(206, 192, 51, 0.44);">
                <div style="margin-left:4%;">
                    <div class="row" style="padding-top:5%;">
                        <div class="col-1"></div>
                        <div class=" col-5">
                            <div class="pic_parent"
                                style="margin-top:15%;position: relative;height:150px;width:150px;margin-bottom: 2%;border: solid 1px black;margin-left: 7%;">
                                <img style="position: absolute;width: 100%;height: 100%;top: 0;left: 0;border: none;object-fit: cover;"
                                    src=" <?php echo $photo; ?>" />
                            </div>
                        </div>

                        <div class="col-6">
                            <div style="padding-top:5%;">
                                <label class="input_form">
                                    <div>Titre
                                    </div>
                                    <input type="text" name="oldtitle" value="<?php echo "$oldtitle"?>"
                                        style=" display:none;">
                                    </input>
                                    <input type=" text" name="titre" style="text-align:center;width: 230px;"
                                        value="<?php echo "$titre" ?>" required />
                                </label>
                            </div>

                            <div>
                                <label class="input_form">
                                    <div>Auteur</div>
                                    <input style="width: 230px;text-align:center;" type="text" name="auteur"
                                        value="<?php echo "$auteur" ?>" required />
                                </label>
                            </div>

                            <div>
                                <label style="margin-left:10%;" class=" input_form">
                                    <div>Genre</div>
                                    <input type="text" style="text-align:center;" name="genre"
                                        value="<?php echo "$genre" ?>" required />
                                </label>
                            </div>
                        </div>
                    </div>

                    <div style="margin-left:4%;">
                        <div class="row" style="padding-top:5%;">
                            <div class="col-md-4 col-lg-4 col-xl-4">
                                <label class="input_form">
                                    <div>Éditeur</div>
                                    <input type="editeur" style="text-align:center;" name="editeur"
                                        value="<?php echo "$editeur" ?>" required />
                                </label>
                            </div>

                            <div class="col-md-4 col-lg-4 col-xl-4">
                                <label class="input_form">
                                    <div>Date de parution</div>
                                    <input type="text" style="text-align:center;" name="date_parrution"
                                        value="<?php echo "$date_parrution" ?>" required />
                                </label>
                            </div>

                            <div class="col-md-4 col-lg-4 col-xl-4">
                                <label class="input_form">
                                    <div>Note</div>
                                    <input type="text" name="note" style="text-align:center;"
                                        value="<?php echo "$note" ?>" required />
                                </label>
                            </div>
                        </div>
                    </div>


                    <div style="margin-left:5%;margin-bottom:20px;">
                        <div class="row" style="padding-top:5%;">
                            <div class="col-md-1 col-lg-1 col-xl-1"></div>

                            <div class="col-md-10 col-lg-10 col-xl-10">
                                <textarea style="width: 500px;height: 500px; background-color: #fbf6ca;"
                                    class="resume_area" placeholder="Un petit résumé?" name="resume" rows="4" cols="50"
                                    value="<?php echo $resume ?>"><?php echo $resume ?></textarea>
                            </div>

                            <div class="col-md-1 col-lg-1 col-xl-1"></div>
                        </div>
                    </div>

                    <button class="valider_bouton" style="margin-left:40%;" type="submit">Envoyer</button>
                </div>
        </form>
    </div>
</body>

</html>