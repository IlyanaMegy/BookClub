<?php
include_once('bdd.php');
session_start();
$oldtitle = $_POST['oldtitle'];
$titre = $_POST['titre'];
$auteur = htmlspecialchars($_POST['auteur']);
$genre = htmlspecialchars($_POST['genre']);
$editeur = htmlspecialchars($_POST['editeur']);
$resume = htmlspecialchars($_POST['resume']);
$date_parrution = htmlspecialchars($_POST['date_parrution']);
$note = htmlspecialchars($_POST['note']);
$query1 = $pdo->prepare("UPDATE bookclub.livres SET titre=\"$titre\", auteur=\"$auteur\", genre=\"$genre\", editeur=\"$editeur\", resume=\"$resume\", date_parrution=\"$date_parrution\", note=\"$note\"  WHERE titre=\"$oldtitle\";");
$query1->execute();
header('Location:http://localhost:8080/Bookclub/php/moderation_livres.php');
exit;
?>