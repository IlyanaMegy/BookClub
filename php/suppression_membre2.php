<?php
include_once('bdd.php');
session_start();
if (empty($_GET)) {
    echo "Pas de saisie correct veillez remplir tout les champs. <a href=\"./moderation_offres.php\">Réesayer</a>";
}
$pseudo_membre = htmlspecialchars($_GET['pseudo']);
$pseudo_membre = trim($pseudo_membre);

$sql = "DELETE FROM bookclub.membres WHERE pseudo_membre = \"$pseudo_membre\"";
$query1 = $pdo->prepare($sql);
$query1->execute();

header('Location: http://localhost:80/Bookclub/php/moderation_membres.php');
exit;

?>