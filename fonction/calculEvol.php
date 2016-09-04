<?php

require '../kint/Kint.class.php';
include '../connexion/PDO.php';

function calculEvol($tabnbpokemon) {

    $petiteEvolTab = array();
    $moyenneEvolTab = array();
    $grandeEvolTab = array();
    $immenseEvolTab = array();
    $legendaireEvolTab = array();
    $petiteEvolResultTab = null;
    $moyenneEvolResultTab = null;
    $grandeEvolResultTab = null;
    $immenseEvolResultTab = null;
    $legendaireEvolResultTab = null;
    $petiteEvolArray = array();
    $moyenneEvolArray = array();
    $grandeEvolArray = array();
    $immenseEvolArray = array();
    $legendaireEvolArray = array();
    $resultatLegendaire = array();
    $resultatImmense = array();
    $resultatGrande = array();
    $resultatMoyenne = array();
    $resultatPetite = array();

    //Récupération de tableaux en rapprt avec le nombre de bonbons nécessaires pour les évolutions
    foreach ($tabnbpokemon as $request) {
        if ($request['2'] == 12) {
            $petiteEvolArray[] = array("nom" => $request['nom'], "nombrePokemon" => $request['nbPokemon'], "nombreBonbon" => $request['0'], 'typeBonbon' => $request['1']);
        }
        if ($request['2'] == 25) {
            $moyenneEvolArray[] = array("nom" => $request['nom'], "nombreBonbon" => $request['0'], "nombrePokemon" => $request['nbPokemon'], 'typeBonbon' => $request['1']);
        }
        if ($request['2'] == 50) {
            $grandeEvolArray[] = array("nom" => $request['nom'], "nombreBonbon" => $request['0'], "nombrePokemon" => $request['nbPokemon'], 'typeBonbon' => $request['1']);
        }
        if ($request['2'] == 100) {
            $immenseEvolArray[] = array("nom" => $request['nom'], "nombreBonbon" => $request['0'], "nombrePokemon" => $request['nbPokemon'], 'typeBonbon' => $request['1']);
        }
        if ($request['2'] == 400) {
            $legendaireEvolArray[] = array("nom" => $request['nom'], "nombreBonbon" => $request['0'], "nombrePokemon" => $request['nbPokemon'], 'typeBonbon' => $request['1']);
        }
    }

    //Boucle pour le calcul des petites évolutions
    foreach ($petiteEvolArray as $petiteEvol) {
        $nombreEvolBonbon = intval($petiteEvol['nombreBonbon'] / 12);
        $nombreEvolPokemon = intval($petiteEvol['nombrePokemon']);
        $nomPokemon = $petiteEvol['nom'];
        $typeBonbon = $petiteEvol['typeBonbon'];
        //on calcul les nombre d'évolutions possible
        if ($nombreEvolBonbon > $nombreEvolPokemon) {
            $petiteEvolCalcul = $nombreEvolPokemon;
        } else {
            $petiteEvolCalcul = $nombreEvolBonbon;
        }
        //on calcul les restes
        $tranche = $petiteEvolCalcul / 12;
        $restePokemon = $nombreEvolPokemon - $petiteEvolCalcul;
        $resteBonbon = $petiteEvol['nombreBonbon'] - ($petiteEvolCalcul * 11);
        //on regarde si le nombre d'évolution est supérieur ou égal au nombre de bonbon qu'il faut car un bonbons revient apres une evolution
        if ($tranche > 1 && $restePokemon >= $tranche) {
            $petiteEvolCalcul = $petiteEvolCalcul + intval($tranche);
        }
        $petiteEvolTab[] = array('nom' => $nomPokemon, 'typeBonbon' => $typeBonbon, 'calcul' => $petiteEvolCalcul, 'reste' => $resteBonbon);
        $resultatPetite[] = $petiteEvolCalcul;
        
    }
    //Boucle pour le calcul des moyennes évolutions
    foreach ($moyenneEvolArray as $moyenneEvol) {
        $nombreEvolBonbon = intval($moyenneEvol['nombreBonbon'] / 25);

        $nombreEvolPokemon = intval($moyenneEvol['nombrePokemon']);
        $nomPokemon = $moyenneEvol['nom'];
        $typeBonbon = $moyenneEvol['typeBonbon'];
        //on boucle pour voir s'il ne reste pas des bonbons d'avant
        foreach ($petiteEvolTab as $petiteEvol) {
            if ($typeBonbon == $petiteEvol['typeBonbon']) {
                $nombreEvolBonbon = intval($petiteEvol['reste'] / 25);
            }
        }
        //on calcul les nombre d'évolutions possible
        if ($nombreEvolBonbon > $nombreEvolPokemon) {
            $moyenneEvolCalcul = $nombreEvolPokemon;
        } else {
            $moyenneEvolCalcul = $nombreEvolBonbon;
        }
        //on calcul les restes
        $tranche = $moyenneEvolCalcul / 25;
        $restePokemon = $nombreEvolPokemon - $moyenneEvolCalcul;
        $resteBonbon = $moyenneEvol['nombreBonbon'] - ($moyenneEvolCalcul * 24);
        foreach ($petiteEvolTab as $petiteEvol) {
            if ($typeBonbon == $petiteEvol['typeBonbon']) {
                $resteBonbon = $petiteEvol['reste'] - ($moyenneEvolCalcul * 24);
            }
        }
        if ($tranche > 1 && $restePokemon >= $tranche) {
            $moyenneEvolCalcul = $moyenneEvolCalcul + intval($tranche);
        }
        $resultatMoyenne[] = $moyenneEvolCalcul;
        $moyenneEvolTab[] = array('nom' => $nomPokemon, 'typeBonbon' => $typeBonbon, 'calcul' => $moyenneEvolCalcul, 'reste' => $resteBonbon);
    }
    //Boucle pour le calcul des grandes évolutions
    foreach ($grandeEvolArray as $grandeEvol) {
        $nombreEvolBonbon = intval($grandeEvol['nombreBonbon'] / 50);
        $nombreEvolPokemon = intval($grandeEvol['nombrePokemon']);
        $nomPokemon = $grandeEvol['nom'];
        $typeBonbon = $grandeEvol['typeBonbon'];

        //on boucle pour voir s'il ne reste pas des bonbons des petites évolutions   
        foreach ($petiteEvolTab as $petiteEvol) {
            if ($typeBonbon == $petiteEvol['typeBonbon']) {
                $nombreEvolBonbon = intval($petiteEvol['reste'] / 50);
            }
        }
        //on boucle pour voir s'il ne reste pas des bonbons des moyennes évolutions
        foreach ($moyenneEvolTab as $moyenneEvol) {
            if ($typeBonbon == $moyenneEvol['typeBonbon']) {
                $nombreEvolBonbon = intval($moyenneEvol['reste'] / 50);
            }
        }
        //on calcul les nombre d'évolutions possible
        if ($nombreEvolBonbon > $nombreEvolPokemon) {
            $grandeEvolCalcul = $nombreEvolPokemon;
        } else {
            $grandeEvolCalcul = $nombreEvolBonbon;
        }

        $tranche = $grandeEvolCalcul / 50;
        $restePokemon = $nombreEvolPokemon - $grandeEvolCalcul;
        $resteBonbon = $grandeEvol['nombreBonbon'] - ($grandeEvolCalcul * 49);
        foreach ($petiteEvolTab as $petiteEvol) {
            if ($typeBonbon == $petiteEvol['typeBonbon']) {

                $resteBonbon = $petiteEvol['reste'] - ($grandeEvolCalcul * 49);
            }
        }
        foreach ($moyenneEvolTab as $moyenneEvol) {
            if ($typeBonbon == $moyenneEvol['typeBonbon']) {
                $resteBonbon = $moyenneEvol['reste'] - ($grandeEvolCalcul * 49);
            }
        }
        if ($tranche > 1 && $restePokemon >= $tranche) {
            $grandeEvolCalcul = $grandeEvolCalcul + intval($tranche);
        }
        $resultatGrande[] = $grandeEvolCalcul;
        $grandeEvolTab[] = array('nom' => $nomPokemon, 'typeBonbon' => $typeBonbon, 'calcul' => $grandeEvolCalcul, 'reste' => $resteBonbon);
    }

    //Boucle pour le calcul des immenses évolutions
    foreach ($immenseEvolArray as $immenseEvol) {
        $nombreEvolBonbon = intval($immenseEvol['nombreBonbon'] / 100);
        $nombreEvolPokemon = intval($immenseEvol['nombrePokemon']);
        $nomPokemon = $immenseEvol['nom'];
        $typeBonbon = $immenseEvol['typeBonbon'];
        //on boucle pour voir s'il ne reste pas des bonbons des petites évolutions   
        foreach ($petiteEvolTab as $petiteEvol) {
            if ($typeBonbon == $petiteEvol['typeBonbon']) {
                $nombreEvolBonbon = intval($petiteEvol['reste'] / 100);
            }
        }
        //on boucle pour voir s'il ne reste pas des bonbons des moyennes évolutions
        foreach ($moyenneEvolTab as $moyenneEvol) {
            if ($typeBonbon == $moyenneEvol['typeBonbon']) {
                $nombreEvolBonbon = intval($moyenneEvol['reste'] / 100);
            }
        }
        //on boucle pour voir s'il ne reste pas des bonbons des grande évolutions
        foreach ($grandeEvolTab as $grandeEvol) {
            if ($typeBonbon == $grandeEvol['typeBonbon']) {
                $nombreEvolBonbon = intval($grandeEvol['reste'] / 100);
            }
        }
        if ($nombreEvolBonbon > $nombreEvolPokemon) {
            $immenseEvolCalcul = $nombreEvolPokemon;
        } else {
            $immenseEvolCalcul = $nombreEvolBonbon;
        }
        $tranche = $immenseEvolCalcul / 100;
        $restePokemon = $nombreEvolPokemon - $immenseEvolCalcul;
        $resteBonbon = $immenseEvol['nombreBonbon'] - ($immenseEvolCalcul * 99);
        foreach ($petiteEvolTab as $petiteEvol) {
            if ($typeBonbon == $petiteEvol['typeBonbon']) {

                $resteBonbon = $petiteEvol['reste'] - ($immenseEvolCalcul * 99);
            }
        }
        foreach ($moyenneEvolTab as $moyenneEvol) {
            if ($typeBonbon == $moyenneEvol['typeBonbon']) {
                $resteBonbon = $moyenneEvol['reste'] - ($immenseEvolCalcul * 99);
            }
        }
        foreach ($grandeEvolTab as $grandeEvol) {
            if ($typeBonbon == $grandeEvol['typeBonbon']) {
                $resteBonbon = $grandeEvol['reste'] - ($immenseEvolCalcul * 99);
            }
        }
        if ($tranche > 1 && $restePokemon >= $tranche) {
            $immenseEvolCalcul = $immenseEvolCalcul + intval($tranche);
        }
        $resultatImmense[] = $immenseEvolCalcul;
        $immenseEvolTab[] = array('nom' => $nomPokemon, 'typeBonbon' => $typeBonbon, 'calcul' => $immenseEvolCalcul, 'reste' => $resteBonbon);
    }
    //Boucle pour le calcul des évolutions légendaires
    foreach ($legendaireEvolArray as $legendaireEvol) {
        $nombreEvolBonbon = intval($legendaireEvol['nombreBonbon'] / 400);
        $nombreEvolPokemon = intval($legendaireEvol['nombrePokemon']);
        $nomPokemon = $legendaireEvol['nom'];
        $typeBonbon = $legendaireEvol['typeBonbon'];
        //on boucle pour voir s'il ne reste pas des bonbons des petites évolutions   
        foreach ($petiteEvolTab as $petiteEvol) {
            if ($typeBonbon == $petiteEvol['typeBonbon']) {
                $nombreEvolBonbon = intval($petiteEvol['reste'] / 400);
            }
        }
        //on boucle pour voir s'il ne reste pas des bonbons des moyennes évolutions
        foreach ($moyenneEvolTab as $moyenneEvol) {
            if ($typeBonbon == $moyenneEvol['typeBonbon']) {
                $nombreEvolBonbon = intval($moyenneEvol['reste'] / 400);
            }
        }
        //on boucle pour voir s'il ne reste pas des bonbons des grande évolutions
        foreach ($grandeEvolTab as $grandeEvol) {
            if ($typeBonbon == $grandeEvol['typeBonbon']) {
                $nombreEvolBonbon = intval($grandeEvol['reste'] / 400);
            }
        }
        //on boucle pour voir s'il ne reste pas des bonbons des immense évolutions
        foreach ($immenseEvolTab as $immenseEvol) {
            if ($typeBonbon == $immenseEvol['typeBonbon']) {
                $nombreEvolBonbon = intval($immenseEvol['reste'] / 400);
            }
        }
        if ($nombreEvolBonbon > $nombreEvolPokemon) {
            $legendaireEvolCalcul = $nombreEvolPokemon;
        } else {
            $legendaireEvolCalcul = $nombreEvolBonbon;
        }
        $tranche = $legendaireEvolCalcul / 400;
        $restePokemon = $nombreEvolPokemon - $legendaireEvolCalcul;
        $resteBonbon = $legendaireEvol['nombreBonbon'] - ($legendaireEvolCalcul * 399);
        foreach ($petiteEvolTab as $petiteEvol) {
            if ($typeBonbon == $petiteEvol['typeBonbon']) {

                $resteBonbon = $petiteEvol['reste'] - ($legendaireEvolCalcul * 399);
            }
        }
        foreach ($moyenneEvolTab as $moyenneEvol) {
            if ($typeBonbon == $moyenneEvol['typeBonbon']) {
                $resteBonbon = $moyenneEvol['reste'] - ($legendaireEvolCalcul * 399);
            }
        }
        foreach ($grandeEvolTab as $grandeEvol) {
            if ($typeBonbon == $grandeEvol['typeBonbon']) {
                $resteBonbon = $grandeEvol['reste'] - ($legendaireEvolCalcul * 399);
            }
        }
        foreach ($immenseEvolTab as $immenseEvol) {
            if ($typeBonbon == $immenseEvol['typeBonbon']) {
                $resteBonbon = $immenseEvol['reste'] - ($legendaireEvolCalcul * 399);
            }
        }
        if ($tranche > 1 && $restePokemon >= $tranche) {
            $legendaireEvolCalcul = $legendaireEvolCalcul + intval($tranche);
        }
        $legendaireEvolTab[] = array('nom' => $nomPokemon, 'typeBonbon' => $typeBonbon, 'calcul' => $legendaireEvolCalcul, 'reste' => $resteBonbon);
        
        $resultatLegendaire[] = $legendaireEvolCalcul;
    }
    foreach ($petiteEvolTab as $petiteEvol){
        
            if($petiteEvol['calcul'] > 0){
                $petiteEvolResultTab[]=$petiteEvol;
    
            }
    }
    
    foreach ($moyenneEvolTab as $moyenneEvol){
            if($moyenneEvol['calcul']>0){
                $moyenneEvolResultTab[]=$moyenneEvol;
            }
    }
    foreach ($grandeEvolTab as $grandeEvol){
            if($grandeEvol['calcul']>0){
                $grandeEvolResultTab[]=$grandeEvol;
            }
    }
    foreach ($immenseEvolTab as $immenseEvol){
            if($immenseEvol['calcul']>0){
                $immenseEvolResultTab[]=$immenseEvol;
            }
    }
    foreach ($legendaireEvolTab as $legendaireEvol){
            if($legendaireEvol['calcul']>0){
                $legendaireEvolResultTab[]=$legendaireEvol;
            }
    }

    $evolCalcul = array_sum($resultatLegendaire) + array_sum($resultatImmense) + array_sum($resultatGrande) + array_sum($resultatMoyenne) + array_sum($resultatPetite);
    $evolTab = array('petiteEvolTab' => $petiteEvolResultTab, 'moyenneEvolTab' => $moyenneEvolResultTab, 'grandeEvolTab' => $grandeEvolResultTab, 'immenseEvolTab' => $immenseEvolResultTab, 'legendaireEvolTab' => $legendaireEvolResultTab, 'resultat' => $evolCalcul);
    
    return $evolTab;
}
