<?php
include_once('bdd.php');
// Creation du root dans la bdd

// Si un ou aucun champs n'est rempli on invite l'utilisateur à recommencer son incription.
if (empty($_POST['pseudo']) or empty($_POST['mail']) or empty($_POST['mdp']) or empty($_POST['pays']) or empty($_POST['age'])) {
    echo "Pas de saisie correct veillez remplir tout les champs. <a href=\"index.php\">Réesayer</a>";
}
else {
    if (isset($_POST['inscription_admin'])) {

        // Vérifie dans la BDD si le mail est déjà connu, si oui on invite l'utilisateur à se connecter.
        $_SESSION['mail'] = htmlspecialchars($_POST['mail']);
        $query1 = $pdo->prepare('SELECT * FROM root');
        $query1->execute();
        $liste_mail = $query1->fetchAll();
        foreach ($liste_mail as $name) {
            $mail_test = $name['mail_root'];
            if ($_SESSION['mail'] == $mail_test) { ?>
<script>
alert("<?php echo htmlspecialchars('un compte existe avec cet email, connectez vous plutôt', ENT_QUOTES); ?>")
</script>
<?php
                header("Refresh:0; url=connexion.php");
                exit;
            }
        }

        $query2 = $pdo->prepare('SELECT * FROM membres');
        $query2->execute();
        $liste_mail = $query2->fetchAll();
        foreach ($liste_mail as $name) {
            $mail_test = $name['mail_membre'];
            if ($_SESSION['mail'] == $mail_test) {
?>
<script>
alert("<?php echo htmlspecialchars('un compte existe avec cet email, connectez vous plutôt', ENT_QUOTES); ?>")
</script>
<?php
                header("Refresh:0; url=connexion.php");
                exit;
            }
        }


        // Si le pseudo entré est déjà utilisé on invite l'utilisateur à choisir un autre pseudo

        $_SESSION['pseudo'] = htmlspecialchars($_POST['pseudo']);
        $query1 = $pdo->prepare('SELECT * FROM root');
        $query1->execute();
        $liste_pseudo = $query1->fetchAll();
        foreach ($liste_pseudo as $name) {
            $pseudo_test = $name['pseudo_root'];
            if ($_SESSION['pseudo'] == $pseudo_test) {
?>
<script>
alert("<?php echo htmlspecialchars('ce pseudo est indisponible', ENT_QUOTES); ?>")
</script>
<?php
                header("Refresh:0; url=inscription_admin.php");
                exit;
            }
        }

        $query2 = $pdo->prepare('SELECT * FROM membres');
        $query2->execute();
        $liste_pseudo = $query2->fetchAll();
        foreach ($liste_pseudo as $name) {
            $pseudo_test = $name['pseudo_membre'];
            if ($_SESSION['pseudo'] == $pseudo_test) {
?>
<script>
alert("<?php echo htmlspecialchars('ce pseudo est indisponible', ENT_QUOTES); ?>")
</script>
<?php
                header("Refresh:0; url=inscription_admin.php");
                exit;
            }
        }

        $_SESSION['pseudo'] = htmlspecialchars($_POST['pseudo']);
        $mail = htmlspecialchars($_POST['mail']);
        $mdp = htmlspecialchars($_POST['mdp']);

        $mdp = md5($mdp);

        $pays = htmlspecialchars($_POST['pays']);
        $sexe = htmlspecialchars($_POST['sex']);
        $age = htmlspecialchars($_POST['age']);
        $role = "admin";
        $pseudo = $_SESSION['pseudo'];
        $date_creation = DATE("Y-m-d");


        $requete = "INSERT INTO bookclub.root (pseudo_root, mail_root, mdp_root, pays, sex, age, role,
    date_creation)
    VALUES (:pseudo, :mail, :mdp, :pays, :sexe, :age, :role, :date_creation)";
        $query1 = $pdo->prepare($requete);
        $query1->bindParam(":pseudo", $pseudo);
        $query1->bindParam(":mail", $mail);
        $query1->bindParam(":mdp", $mdp);
        $query1->bindParam(":pays", $pays);
        $query1->bindParam(":sexe", $sexe);
        $query1->bindParam(":age", $age, PDO::PARAM_INT);
        $query1->bindParam(":role", $role);
        $query1->bindParam(":date_creation", $date_creation);
        $query1->execute();
        header('Location: http://localhost:8080/Bookclub/php/index.php');
        exit;
    }
}

?>