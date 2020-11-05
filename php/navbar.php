
<div>
    <nav class="navbar fixed_top navbar-expand-sm justify-content-between navbar_style">
        <!-- Logo en haut à gauche -->
        <div class="col-xs-1xs col-sm-1 col-md-1 col-lg-1 col-xl-1">
            <a href="index.php"><img class='logo' src="../logo/logo_lighter.png" alt="BookClub logo" /></a>
        </div>

        <div class="col-xs-0 col-sm-0 col-md-0 col-lg-1 col-xl-1"></div>

        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 navbar-collapse" id="navbar_div">
        <!-- liens, celui de la page actuelle est désactivé -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link link_enable" href="home.php">Accueil</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link link_enable" href="about_us.php">BookClub</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link link_enable" href="community.php">Communauté</a>
                </li>

                <!-- php ici si utilisateur connecté alors redirection vers page profil.php sinon redirection vers page index.php -->
                <?php if (isset($_SESSION['IS_CONNECTED'])) {?>
                    <li class="nav-item">
                        <a class="nav-link link_enable" href="profil.php">Profil</a>
                    </li> 
                <?php }?>  
                
                <li class="nav-item">
                    <a class="nav-link link_enable" href="form_recherche.php">Rechercher un livre</a>         
                </li>
                
                <li class="nav-item">
                    <a class="nav-link link_enable" href="message.php">Messages</a>            
                </li>    
                
                <?php 
                    if (isset($_SESSION['IS_CONNECTED'])) {
                        if ($_SESSION['table']  == 'root') {
                            
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle icon_drop" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <img src="../icons/admin.png" style="height:25px;width:25px;" alt="admin settings">
                        </a>
                        <div class="dropdown-menu drop_style" aria-labelledby="navbarDropdownMenuLink">
                           <a class="dropdown-item drop_style" href="./moderation_livres.php">Moderation livres</a>
                           <a class="dropdown-item drop_style" href="./moderation_membres.php">Moderation membres</a>
                           <a class="dropdown-item drop_style" href="./form_ajout_livres.php">Ajout de livres</a>
                        </div>
                    </li>
                <?php    
                        }
                    }
                ?>                  
            </ul>
        </div>
    </nav>
</div>