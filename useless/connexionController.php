<?php

session_start();
include '../connexion/PDO.php';

if (filter_input_array(INPUT_POST)) {

    $nom = filter_input(INPUT_POST, 'nom');
    $mdp = md5(filter_input(INPUT_POST, 'mdp'));


    if ($nom != "" && $mdp != "d41d8cd98f00b204e9800998ecf8427e") {
        $req = $pdo->query("SELECT `id`, `Nom`, `MotDePasse` FROM `utilisateur` WHERE `Nom`  LIKE '" . $nom . "' AND `MotDePasse`LIKE '" . $mdp . "'");
        if ($req->fetch() == false) {
            header("Location: ../vue/connexion.php?fail=1");
        } else {
            $req = $pdo->query("SELECT `id`, `Nom`, `MotDePasse` FROM `utilisateur` WHERE `Nom`  LIKE '" . $nom . "' AND `MotDePasse`LIKE '" . $mdp . "'");
            $data = $req->fetch();
            
            $_SESSION['nom']= $data['Nom'];
            $_SESSION['mdp']= $data['MotDePasse'];
            $_SESSION['id']= $data['id'];

            header("Location: ../vue/accueil.php");
            
        }
    } else {
        header("Location: ../vue/connexion.php?vide=1");
    }
}