<?php
session_start();
include '../connexion/PDO.php';
require '../kint/Kint.class.php';
   
    $session=$_SESSION;
    $id = $_SESSION['id'];
  
    $selInv=$pdo->query("SELECT  `id_utilisateur` FROM `inventaire` WHERE `id_utilisateur` LIKE '".$id."' ");
    if($selInv->fetch()==false){
        $selPokemon= $pdo->query("SELECT  `Nom` FROM `pokemon`");
        while($invAjout=$selPokemon->fetch()){
            $nom=$invAjout['Nom'];
            $creaInventaire=$pdo->query("INSERT INTO `inventaire`(`id`, `NomPokemon`, `NombrePokemon`, `NombreBonbon`, `id_utilisateur`) VALUES (null,'".$nom."',0,0,'".$id."')");
        }
        header("Location:../vue/accueil.php?insert=1");
    }
    else{
        header("Location:../vue/accueil.php?fail=1");
    }


    


