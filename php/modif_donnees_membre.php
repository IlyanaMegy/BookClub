<?php
include_once('bdd.php');
session_start();

$ancien_pseudo = $_SESSION['pseudo'];
$pseudo = htmlspecialchars($_POST['pseudo']);
$email = htmlspecialchars($_POST['mail']);
$pays = htmlspecialchars($_POST['pays']);
$age = htmlspecialchars($_POST['age']);
$bio = htmlspecialchars($_POST['bio']);


$queryroot = $pdo->prepare("UPDATE root SET pseudo_root=\"$pseudo\", mail_root=\"$email\", pays=\"$pays\", age=\"$age\", bio=\"$bio\" WHERE pseudo_root=\"$ancien_pseudo\";");
$queryroot->execute();
$queryroot2 = $pdo->prepare('SELECT * FROM root');
$queryroot2->execute();
$liste_root = $queryroot2->fetchAll();
foreach ($liste_root as $membre) {
    if ($membre['pseudo_root'] == $pseudo) {
        $pseudo = $membre['pseudo_root'];
        $email = $membre['mail_root'];
        $pays = $membre['pays'];
        $age = $membre['age'];
        $bio = $membre['bio'];
    }

}


$query1 = $pdo->prepare("UPDATE membres SET pseudo_membre=\"$pseudo\", mail_membre=\"$email\", pays=\"$pays\", age=\"$age\", bio=\"$bio\" WHERE pseudo_membre=\"$ancien_pseudo\";");
$query1->execute();
$query2 = $pdo->prepare('SELECT * FROM membres');
$query2->execute();
$liste_membre = $query2->fetchAll();
foreach ($liste_membre as $membre) {
    if ($membre['pseudo_membre'] == $pseudo) {
        $pseudo = $membre['pseudo_membre'];
        $email = $membre['mail_membre'];
        $pays = $membre['pays'];
        $age = $membre['age'];
        $bio = $membre['bio'];
    }

}
$_SESSION['pseudo'] = $pseudo;
header('Location:http://localhost:80/Bookclub/php/profil.php');
exit;
?>