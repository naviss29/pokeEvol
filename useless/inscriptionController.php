<?php
include '../connexion/pdo.php';
if(filter_input_array(INPUT_POST)){
    //initialisation des variable
    $enregistrement = true;
    $erreurNom=0;
    $erreurMdp=0;
    $erreurMail=0;
    $erreurConfirmation=0;
    $erreurConfiramtionMail=0;
    
    $nom= trim(filter_input(INPUT_POST, "nom"));
    $mdp=md5(trim(filter_input(INPUT_POST, "mdp")));
    $mail=trim(filter_input(INPUT_POST, "mail"));
    $confirmationMail=trim(filter_input(INPUT_POST, "confirmationMail"));
   
    if($nom==""){
        $erreurNom=1;
        $enregistrement= false;
    }
    if($mdp=="d41d8cd98f00b204e9800998ecf8427e"){
        $erreurMdp=1;
        $enregistrement= false;
    }
    if($mail==""){
        $erreurMail=1;
        $enregistrement= false;
    }
    if($confirmationMail==""){
        $erreurConfiramtionMail=1;
        $enregistrement= false;
    }
    if($erreurMail==0 && $confirmationMail==0 && $mail!=$confirmationMail){
        $erreurConfirmation=1;
        $enregistrement= false;
    }
    
    if($enregistrement == true){
        $req = $pdo->query("INSERT INTO `utilisateur`( id,`Nom`, `MotDePasse`, `Mail`) VALUES (null,'".$nom."','".$mdp."','".$mail."')");

        header("Location: ../index.php?inscrit=OK");
    }
    else{
        header("Location: ../vue/inscription.php?Nom=".$erreurNom."&Mdp=".$erreurMdp."&Mail=".$erreurMail."&ConfirmeMail=".$erreurConfiramtionMail."&Confirmer=".$erreurConfirmation);
    }

}    




