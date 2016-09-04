<?php session_start();
if(!isset($_SESSION['nom']) && !isset($_SESSION['mdp'])){
    header("Location: ../vue/connexion.php");
}
else{?>
    
<h2>Bienvenue cher dresseur</h2>

<p>Quel service veux tu utiliser?</p>

<a href='../controller/ajoutPokemonController.php'>Créer ton inventaire </a><br/>
<a href='modifiePokemon.php'>Liste de tes pokemons </a><br/>
<a href="../controller/deconnexionController.php">Déconnexion</a><br/>
<?php } 



