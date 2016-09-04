<?php session_start();
require '../kint/Kint.class.php';

include '../connexion/PDO.php';
include '../fonction/calculEvol.php';

if (filter_input_array(INPUT_POST)) {

    $post = filter_input_array(INPUT_POST);
    $nbBonbon = null;
    $pokemonChangeArray = array();
    $envoi = true;
    
    //On récupère la liste des nombres bonbons nécessaire aux évolutions.
    $req=$pdo->query("SELECT NbBonbonEvol FROM pokemon WHERE NbBonbonEvol > 0");
    while($data=$req->fetch()){
        $tabNbBonbonEvol[]=$data['NbBonbonEvol'];
    }

    //on parcours les résultats du post pour créer les tableaux
    foreach ($post as $key => $posts) {
        if (substr($key, 0, 9) == 'nbPokemon') {
            $nomPokemon = substr($key, 9);
            $tabnbpokemon[] = array( 'nom' =>$nomPokemon, 'nbPokemon'=>$posts,);
        } elseif (substr($key, 0, 8) == 'nbBonbon') {
            $tabnbBonbon[] = $posts;
        } elseif (substr($key, 0, 9) == 'nomBonbon') {
            $tabnomBonbon[] = $posts;
        }
    }

    //on met tout les tableau en un seul
    for ($i = 0; $i < count($tabnomBonbon); $i++) {
        array_push($tabnbpokemon[$i], $tabnbBonbon[$i]);
        array_push($tabnbpokemon[$i], $tabnomBonbon[$i]);
        array_push($tabnbpokemon[$i], $tabNbBonbonEvol[$i]);
    }

    $calcul = calculEvol($tabnbpokemon);
    $_SESSION['calcul']=$calcul;
    
    header("Location: ../index.php");

}


