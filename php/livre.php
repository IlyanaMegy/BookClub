<?php
    session_start();
    include_once('bdd.php');

    $photo = $_GET['photo'];
    $titre = $_GET['titre'];
    $auteur = $_GET['auteur'];    
    $genre = $_GET['genre'];
    $editeur = $_GET['editeur'];
    $resume = $_GET['resume'];
    $date_parrution = $_GET['date_parrution'];
    $note = $_GET['note'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>BookClub - Livre</title>

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

            <!-- contenu de la page dans la div content divisée en grilles avec Bootstrap -->
            <div class="container content" style="padding:2%;"> 
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-xl-6"style="padding-left:2%;">                    
                        <div class="row" style="">
                            <div class="col-md-1 col-lg-1 col-xl-1"></div>

                            <div class="col-md-10 col-lg-10 col-xl-10">
                                <?php echo "<img style=\"width: 300px; height: 300px; border: 1px solid rgba(123, 94, 56, 0.61)\" src=$photo >" ?>
                            </div>

                            <div class="col-md-1 col-lg-1 col-xl-1"></div>
                        </div>

                        <div class="container" style="margin-top:5px;padding-left:11%;padding-right:25%;" name="tag_box">
                            <div name="type_tag" style="" class="tag_style">
                                genre<?php echo $genre?> 
                            </div>

                            <div name="editor_tag" class="tag_style">
                                éditeur<?php echo $editeur?>
                            </div>

                            <div name="author_tag" class="tag_style">
                                auteur<?php echo $auteur?>
                            </div>
                        </div>

                        <div class="row" style="margin-top:5%;">
                            <div class="col-md-4 col-lg-4 col-xl-4"></div>

                            <div class="col-md-4 col-lg-4 col-xl-4">
                                Note <?php echo $note?>                        
                            </div>

                            <div class="col-md-4 col-lg-4 col-xl-4"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6 col-xl-6">
                        <h1 style="text-align:left;margin-left:0;margin-top:5%;"><?php echo $titre?></h1> 
                        <h1 style="text-align:left;margin-left:0;margin-bottom:20px;">De <?php echo $auteur?></h1>

                        <h3 style="margin-right:5%;font-size:16px;">Publié le <?php echo $date_parrution?></h3>

                        <h3 style="text-align:left;margin-top:10%;">Résumé</h3>
                        <textarea style="width:70%;height:100px;background-color:white;border:1px solid rgba(123, 94, 56, 0.61);padding:1%;margin;10%;"><?php echo $resume?></textarea>
                    </div>
                </div>            
            </div>
            
            <!--footer-->  
            <?php include_once('footer.php') ?>
        </div>
    </body>
</html>