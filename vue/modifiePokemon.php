<?php
    $req = $pdo->query("SELECT * FROM pokemon WHERE NbBonbonEvol > 0 ");
    if ($req->fetch() == false) {
        echo("Vous devez d'abord enregistrer vos pokemons");
    } else {
        ?>
        <p>
            Rempli la liste de pokemons.<br/>
            Et lance le calcul d'évolution.
        </p>
        <form method="POST" action="../controller/modifiePokemonController.php">
            <table>
                <?php
                $req = $pdo->query("SELECT * FROM pokemon WHERE NbBonbonEvol > 0");
                while ($data = $req->fetch()) {

                    if (strlen($data['numeroPokedex']) == 1) {
                        $data['numeroPokedex'] = "00" . $data['numeroPokedex'];
                    }
                    if (strlen($data['numeroPokedex']) == 2) {
                        $data['numeroPokedex'] = "0" . $data['numeroPokedex'];
                    }
                    ?>
                    <tr>
                        <td><img class="size" title="<?php echo($data['NomPokemon']); ?>" src="../image/<?php echo($data['numeroPokedex']); ?>.png" alt="<?php $data['Nom']; ?>"/></td>
                        <td><?php echo($data['NomPokemon']); ?></td>
                        <td><label>Nombre de pokemons</label><input type="text" name="nbPokemon<?php echo($data['NomPokemon']); ?>" value="0" > </td>
                        <td><label>Nombre de bonbons</label><input type="text" name="nbBonbon<?php echo($data['NomPokemon']); ?>" value="0" ></td>
                        <td><input type="hidden" name="nomBonbon<?php echo($data['NomPokemon']); ?>" value="<?php echo($data['NomBonbonEvol']); ?>" /></td>
                        
                    
                    </tr> 
                    
                <?php } ?>

            </table>
            <input type="submit" name="modifie">
        </form>


    <?php }



        