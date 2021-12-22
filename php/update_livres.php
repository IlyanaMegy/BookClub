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



// $photo = htmlspecialchars($_POST['photo']);

//creer un dossier dans /css/images qui contiendra image de couverture du livre
// $folderdir = "../css/images/" . $titre;
// $folderdir = str_replace(' ', '_', $folderdir);

// if (isset($_FILES['file'])) {
//     if (!file_exists($folderdir)) {
//         mkdir($folderdir);
//     }

//     $infofichier = pathinfo($_FILES['file']['name']);
//     $extension = $infofichier['extension'];
//     $name = basename($_FILES['file']['name']);
//     $filename = $titre . '.' . $extension;
//     $filename = str_replace(' ', '_', $filename);
//     $filepath = $folderdir . '/' . $filename;
//     echo $filepath;

// move_uploaded_file($_FILES["file"]["tmp_name"], "$folder/$filename");
$query1 = $pdo->prepare("UPDATE bookclub.livres SET titre=\"$titre\", auteur=\"$auteur\", genre=\"$genre\", editeur=\"$editeur\", resume=\"$resume\", date_parrution=\"$date_parrution\", note=\"$note\" WHERE titre=\"$oldtitle\";");

// photo=\"$filepath\" 
$query1->execute();

// }

//header('Location:http://localhost:8080/Bookclub/php/moderation_livres.php');
exit;
?>