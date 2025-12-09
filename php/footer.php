<div class="container-fluid footer">
    <div class="row" style="width:80%;margin-left:10%;">
        <div class="col-4" name="us_col">
            <div>
                <img class="footer_logo" src="../srcs/icons/logo_light_big.png" alt="BookClub logo"/>
            </div>
            <p class="footer_title" style="font-size:15px;text-align:left;margin-top:5%;max-width:265px">Répertoriez vos livres préférés</br>Et partagez votre avis.</p>
        </div> 

        <div class="col-4 footer_col" name="pages_col">
            <p class="footer_title">Visitez nos pages</p>
            
            <ul style="padding-left:0;margin-bottom:5%;margin-top:5%;">
                <li class="footer_li">
                    <a href="home.php" class="footer_text" style="">Accueil</a>
                </li>
                    
                <li class="footer_li">
                    <a href="about_us.php" class="footer_text">BookClub</a>
                </li>
                    
                <li class="footer_li">
                    <a href="community.php" class="footer_text">Communauté</a>
                </li>
                    
                <?php if (isset($_SESSION['IS_CONNECTED'])) {?>
                <li class="footer_li">
                    <a href="profil.php" class="footer_text">Profil</a>
                </li>
                <?php }?>

                <li class="footer_li">
                    <a href="form_recherche.php" class="footer_text">Rechercher un livre</a>
                </li>

                <li class="footer_li">
                    <a href="message.php" class="footer_text">Messages</a>
                </li>
            </ul>
        </div>

        <div class="col-4" name="contact_col" ">
            <p class="footer_title">Contact</p>
            
            <ul style="padding:0;margin-bottom:5%;margin-top:5%;">
                <li class="footer_li" style="margin:5%;text-align:left;">
                    <div class="row">
                        <div class="col-3">
                            <div style="padding-left:70%;">
                                <img style="height:25px;width:25px;" src="../srcs/icons/phone.png" alt="telephone number"/>
                            </div>
                        </div>
                        <div class="col-9">
                            <a style="font-size:small;" class="footer_text">(+33)06.01.03.01.02 </a>
                        </div>
                    </div>
                </li>

                <li class="footer_li" style="margin:5%;text-align:left;">
                    <div class="row">
                        <div class="col-3">
                            <div style="padding-left:70%;">
                                <img style="height:25px;width:25px;" src="../srcs/icons/email.png" alt="email"/>
                            </div>
                        </div>
                        <div class="col-9">
                            <a style="font-size:small;" class="footer_text" href="mailto:ilyana.megy@email.com">ilyana.megy@email.com </a>
                        </div>
                    </div>
                </li>

                <li class="footer_li" style="margin:5%;text-align:left;">
                    <div class="row">
                        <div class="col-3">
                        <div style="padding-left:70%;">
                            <img style="height:25px;width:25px;" src="../srcs/icons/adresse.png" alt="address"/> 
                        </div>
                        </div>
                        <div class="col-9">
                        <a class="footer_text" style="font-size:small;" href="https://www.google.com/maps/place/Bordeaux+Ynov+Campus/@44.854186,-0.5684943,17z/data=!3m1!4b1!4m5!3m4!1s0xd55287c2b667971:0xfaa5a2368b146e35!8m2!3d44.854186!4d-0.5663056" target="_blank">
                            89 quai des Chartrons, 33300 Bordeaux.
                        </a>
                        </div>                        
                    </div>
                </li>
            </ul>
        </div> 
    </div>


</div>