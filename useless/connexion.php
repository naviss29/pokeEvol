<form method="POST" action="../controller/connexionController.php">
    <p><?php
        if (filter_input(INPUT_GET, "fail")) {
            echo("Mauvais identifiants de connexion");
        }
        ?></p>
    <p><?php
        if (filter_input(INPUT_GET, "vide")) {
            echo("Veuillez remplir tout les champs. Merci");
        }
        ?>
    </p>
    <p>
        <label>Votre nom de dresseur</label>
        <input type="text" name="nom">
    </p>
    <p>  
        <label>Votre mot de passe</label>
        <input type="password" name="mdp">
    </p>
    <input type="submit" name="connexion">

</form>


