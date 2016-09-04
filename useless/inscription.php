<form method="POST" action="../controller/inscriptionController.php">
    <label>Nom de dresseur</label>
    <input type="text" name='nom' >
    <?php if(filter_input(INPUT_GET, "Nom")){echo("Veuillez saisir votre nom de dresseur");} ?>
    <label>Mot de passe</label>
    <input type="password" name="mdp">
    <?php if(filter_input(INPUT_GET, "Mdp")){echo("Veuillez saisir le mot un mot de passe");} ?>
    <label>Email</label>
    <input type="email" name="mail">
    <?php if(filter_input(INPUT_GET, "Mail")){echo("Veuillez saisir votre email");} ?>
    <label>Confirme ton Email</label>
    <input type="email" name='confirmationMail'>
    <?php if(filter_input(INPUT_GET, "Mail")){echo("Veuillez saisir une nouvelle fois votre email");} ?>
    <?php if(filter_input(INPUT_GET, "Confirmer")){echo("Vos email ne correspondent pas");} ?>
    <input type="submit" name="Valider" >
</form>



