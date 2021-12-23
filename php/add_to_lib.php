<?php
include_once('bdd.php');
session_start();
$id_membre = htmlspecialchars($_POST['id_user']);
$id_livre = htmlspecialchars($_POST['id_book']);
$statut = htmlspecialchars($_POST['state']);



$requete = "INSERT INTO bookclub.bib_perso (id_membre, id_livre, statut) VALUES (:id_membre, :id_livre, :statut)";

$query1 = $pdo->prepare($requete);
$query1->bindParam(":id_membre", $id_membre);
$query1->bindParam(":id_livre", $id_livre);
$query1->bindParam(":statut", $statut);
$query1->execute();
header('Location:http://localhost:8080/BookClub/php/profil.php');
exit;
?>