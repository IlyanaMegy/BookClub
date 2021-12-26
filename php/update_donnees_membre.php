<?php
include_once('bdd.php');
session_start();

$pseudo = $_POST['pseudo'];
$mail = $_POST['mail'];
$mdp = htmlspecialchars($_POST['mdp']);
$pays = htmlspecialchars($_POST['pays']);
$sexe = htmlspecialchars($_POST['sexe']);
$age = htmlspecialchars($_POST['age']);
$date_creation = $_POST['date_creation'];
$role = $_POST['role'];


$requete = "INSERT INTO bookclub.root (pseudo_root, mail_root, mdp_root, pays, sex, age, role, date_creation) VALUES (:pseudo, :mail, :mdp, :pays, :sexe, :age, :role, :date_creation)";
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

echo $pseudo;
header('Location: http://localhost:8080/Bookclub/php/suppression_membre2.php/?pseudo=' . $pseudo);
exit;

?>