<?php 
session_start();
include_once('bdd.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>BookClub - Communauté</title>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <!-- css -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">

   </head>
   
   <body>
        <!-- la barre de navigation responsive avec Bootstrap -->
        <?php include_once('navbar.php') ?>
        
        <div class='body_box'>
            <div class="container content" style="padding-left:5%;padding-right:4%;"> 
                <script>
                        function show_advanced_search() {
                            document.getElementById('advanced_search').style.display = "block";
                        }
                        function hide_advanced_search() {
                            document.getElementById('advanced_search').style.display = "none";
                        }
                </script>

                
                <div class="row">
                    <!-- bloc de gauche-->
                    <div class="col-md-8 col-lg-8 col-xl-8" style="background-color:rgba(149, 91, 49, 0.06);">                        
                        <h2 style="margin-top:5%">Quelques lecteurs de notre communauté</h2>

                        <div class="col-md-12">
                            <div class="row" style="margin:10%">
                                <div class="col-md-4 col-lg-4 col-xl-4" style="height:30%;width:30%">
                                    <div class="parent_users_pic">
                                        <img class='users_pic' src="selection_livres/img1.png"/>
                                    </div>

                                    <h4 style="margin-left:5%;">pseudo user<?php echo $pseudo?></h4>
                                </div>

                                <div class="col-md-4 col-lg-4 col-xl-4" style="height:30%;width:30%">
                                    <div class="parent_users_pic">
                                        <img class='users_pic' src="selection_livres/img1.png"/>
                                    </div>

                                    <h4 style="margin-left:5%;">pseudo user<?php echo $pseudo?></h4>
                                </div>

                                <div class="col-md-4 col-lg-4 col-xl-4" style="height:30%;width:30%">
                                    <div class="parent_users_pic">
                                        <img class='users_pic' src="selection_livres/img1.png"/>                                         
                                    </div>
                                    
                                    <h4 style="margin-left:5%;">pseudo user<?php echo $pseudo?></h4>
                                </div>
                            </div>

                            <div class="row" style="margin:10%">
                                <div class="col-md-4 col-lg-4 col-xl-4" style="height:30%;width:30%">
                                    <div class="parent_users_pic">
                                        <img class='users_pic' src="selection_livres/img1.png"/>
                                    </div>
                                    <h4 style="margin-left:5%;">pseudo user<?php echo $pseudo?></h4>
                                </div>

                                <div class="col-md-4 col-lg-4 col-xl-4" style="height:30%;width:30%">
                                    <div class="parent_users_pic">
                                        <img class='users_pic' src="selection_livres/img1.png"/>
                                    </div>
                                    <h4 style="margin-left:5%;">pseudo user<?php echo $pseudo?></h4>
                                </div>

                                <div class="col-md-4 col-lg-4 col-xl-4" style="height:30%;width:30%">
                                    <div class="parent_users_pic">
                                        <img class='users_pic' src="selection_livres/img1.png"/>
                                    </div>
                                    <h4 style="margin-left:5%;">pseudo user<?php echo $pseudo?></h4>
                                </div>
                            </div>

                            <div class="row" style="margin:10%">
                                <div class="col-md-4 col-lg-4 col-xl-4" style="height:30%;width:30%">
                                    <div class="parent_users_pic">
                                        <img class='users_pic' src="selection_livres/img1.png"/>
                                    </div>
                                    <h4 style="margin-left:5%;">pseudo user<?php echo $pseudo?></h4>
                                </div>

                                <div class="col-md-4 col-lg-4 col-xl-4" style="height:30%;width:30%">
                                    <div class="parent_users_pic">
                                        <img class='users_pic' src="selection_livres/img1.png"/>
                                    </div>
                                    <h4 style="margin-left:5%;">pseudo user<?php echo $pseudo?></h4>
                                </div>

                                <div class="col-md-4 col-lg-4 col-xl-4" style="height:30%;width:30%">
                                    <div class="parent_users_pic">
                                        <img class='users_pic' src="selection_livres/img1.png"/>
                                    </div>
                                    <h4 style="margin-left:5%;">pseudo user<?php echo $pseudo?></h4>
                                </div>
                            </div> 
                        </div>
                    </div>

                    <!-- bloc de droite-->
                    <div class="col-md-4 col-lg-4 col-xl-4">
                        <div class="col-md-12" style="background-color:rgba(149, 91, 49, 0.06);padding:30px;padding-bottom:40px;"> 

                            <h2 style="font-size:23px;">Trouvez un lecteur</h2>

                            <form class="form_reader" action="###" method="post">
                                <label class="find_reader">
                                    <input type="text" class="reader_pseudo" name="pseudo" placeholder="Nom utilisateur" required />
                                </label>

                                <a href="findreader.html"><button class="bouton_style" style="margin-left:8%;display:inline-block;outline:0;cursor:pointer;" type="submit">Rechercher</button></a>
                            </form>

                            <button class="advanced_search_button" style="cursor:pointer;outline:0;" onclick="show_advanced_search()">
                                <h4 style="font-style:italic;" class="advanced_search_style">Recherche avancée</h4>
                            </button>

                            <div class="container-fluid" id="advanced_search" style="display:none;margin-top:50px;padding:5px;">
                                
                                <div class="col-md-12">
                                    <h3 style="text-align:left;">>> Genre</h3>
                                    <label for="sexe" class="input_text" style="display:inline-block;width:100%;border:none;">
                                        <input name="sex" type="radio" style="margin:3%;outline:0;cursor:pointer;" value="H" checked>Homme
                                        <input type="radio" name="sex" style="margin:3%;outline:0;cursor:pointer;" value="F">Femme
                                    </label>

                                    <h3 style="text-align:right;margin-top:25px;">Tranche d'âge <<</h3>
                                    <label for="age_select" style="margin-left:10%;" class="input_label"></label>

                                        <select name="ages"  class="input_text">
                                            <option value="">- Choisir -</option>
                                            <option value="kids">10 à 20 ans</option>
                                            <option value="youngs">20 à 30 ans</option>
                                            <option value="adults">30 à 40 ans</option>
                                            <option value="seniors">40 ans et plus...</option>
                                        </select>
                                    </label> 

                                    <h3 style="text-align:left;margin-top:25px;">>> Pays</h3>
                                    <label for="age_select" style="margin-left:10%;" class="input_label"></label>

                                        <select name="pays"  class="input_text">
                                            <option value="">- Choisir -</option>
                                            <option value="fr">France</option>
                                            <option value="en">Angleterre</option>
                                            <option value="es">Espagne</option>
                                            <option value="it">Italie</option>
                                            <option value="us">USA</option>
                                            <option value="jp">Japon</option>
                                        </select>
                                    </label> 

                                    <a href="findreader.html"><button class="bouton_style" style="margin-top:5%;margin-left:65%;cursor:pointer;outline:0;" type="submit">Rechercher</button></a>
                                </div>                            
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>     

            <!--footer-->
            <?php include_once('navbar.php') ?>     
        </div>
   </body>
</html>