<div class="text" style="padding:5%;padding-bottom:0;">
    <p>Vous connaissez ce livre par coeur?
        </br>Aidez-nous en remplissant ce formulaire!</p>
</div>


<form action="ajout_livres.php" style="margin-top:5%;" method="post">
    <div class="container" style="padding:3%;padding-left:3%;background-color:rgba(206, 192, 51, 0.44);">
        <div class="row">
            <div class="col-4">
                <label class="input_form">
                    <div>Titre</div>
                    <input type="text" name="titre" required />
                </label>
            </div>

            <div class="col-4">
                <label class="input_form">
                    <div>Auteur</div>
                    <input type="text" name="auteur" required />
                </label>
            </div>

            <div class="col-4">
                <label class="input_form">
                    <div>Éditeur</div>
                    <input type="editeur" name="editeur" required />
                </label>
            </div>
        </div>

        <div style="margin-left:4%;">
            <div class="row" style="padding-top:5%;">
                <div class="col-md-1 col-lg-1 col-xl-1"></div>

                <div class="col-md-5 col-lg-5 col-xl-5">
                    <label class="input_form">
                        <div>Date de parution</div>
                        <input type="text" name="date_parrution" required />
                    </label>
                </div>

                <div class="col-md-5 col-lg-5 col-xl-5">
                    <label class="input_form">
                        <div>Genre</div>
                        <input type="text" name="genre" required />
                    </label>
                </div>

                <div class="col-md-1 col-lg-1 col-xl-1"></div>
            </div>
        </div>

        <div style="margin-left:5%;margin-bottom:20px;">
            <div class="row" style="padding-top:5%;">
                <div class="col-md-1 col-lg-1 col-xl-1"></div>

                <div class="col-md-10 col-lg-10 col-xl-10">
                    <textarea class="resume_area" placeholder="Un petit résumé?" name="resume" rows="4"
                        cols="50"></textarea>
                </div>

                <div class="col-md-1 col-lg-1 col-xl-1"></div>
            </div>
        </div>

        <button class="valider_bouton" style="margin-left:35%;" type="submit">Envoyer</button>
    </div>
</form>













{# <?php
$titre = htmlspecialchars($_POST['titre']); // 

?> #}