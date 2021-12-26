<?php

include_once('bdd.php');
session_start();


if (empty(htmlspecialchars($_POST['pseudo'])) or empty(htmlspecialchars($_POST['mdp']))) {
    echo "Pas de saisie d'identifiant. <a href=\"../php/connexion.php\">Réesayer</a>";
}
else {
    $mdp = md5($_POST['mdp']);
    $_SESSION['pseudo'] = htmlspecialchars($_POST['pseudo']);
    $query1 = $pdo->prepare('SELECT * FROM root');
    $query1->execute();
    $liste_pseudo = $query1->fetchAll();
    foreach ($liste_pseudo as $name) {
        $pseudo_test = $name['pseudo_root'];
        if ($_SESSION['pseudo'] == $pseudo_test) {
            $pseudo = $pseudo_test;
            $_SESSION['table'] = 'root';
            $_SESSION['IS_CONNECTED'] = true;
        }
    }

    $query2 = $pdo->prepare('SELECT * FROM membres');
    $query2->execute();
    $liste_pseudo = $query2->fetchAll();
    foreach ($liste_pseudo as $name) {
        $pseudo_test = $name['pseudo_membre'];
        if ($_SESSION['pseudo'] == $pseudo_test) {
            $pseudo = $pseudo_test;
            $_SESSION['table'] = 'membres';
            $_SESSION['IS_CONNECTED'] = true;
        }
    }
    $query3 = $pdo->prepare('SELECT pseudo_membre, mdp_membre FROM membres WHERE pseudo_membre="' . $_POST['pseudo'] . '" AND mdp_membre="' . $mdp . '" ');
    $query3->execute();
    $data_m = $query3->fetch();
    $query4 = $pdo->prepare('SELECT pseudo_root, mdp_root FROM root WHERE pseudo_root="' . $_POST['pseudo'] . '" AND mdp_root="' . $mdp . '"  ');
    $query4->execute();
    $data_r = $query4->fetch();

    if ($data_m or $data_r) {
        header('Location: home.php');
        exit;

    }
    else {
        header('Refresh:0; url=connexion.php');
        exit;
    }
}

?>