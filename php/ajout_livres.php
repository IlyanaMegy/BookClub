<?php
include_once('bdd.php');
session_start();
$titre = htmlspecialchars($_POST['titre']);
$auteur = htmlspecialchars($_POST['auteur']);
$genre = "non renseigné";
$note = "0";
$photo = "../css/images/book.jpg";
$editeur = htmlspecialchars($_POST['editeur']);
$resume = htmlspecialchars($_POST['resume']);
$date_parrution = htmlspecialchars($_POST['date_parrution']);
$date_ajout = date("Y-m-d");

$requete = "INSERT INTO bookclub.livres (titre, auteur, genre, editeur, resume, date_parrution, date_ajout, note, photo) VALUES (:titre, :auteur, :genre, :editeur, :resume, :date_parrution, :date_ajout, :note, :photo)";

$query1 = $pdo->prepare($requete);
$query1->bindParam(":titre", $titre);
$query1->bindParam(":auteur", $auteur);
$query1->bindParam(":genre", $genre);
$query1->bindParam(":editeur", $editeur);
$query1->bindParam(":date_parrution", $date_parrution);
$query1->bindParam(":resume", $resume);
$query1->bindParam(":note", $note);
$query1->bindParam(":photo", $photo);
$query1->bindParam(":date_ajout", $date_ajout);
$query1->execute();
header('Location:http://localhost:80/BookClub/php/home.php');
exit;
?>