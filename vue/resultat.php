<?php 
$calcul=$_SESSION['calcul'];
    ?>

    <p>
        Nous y voila enfin le fameux résultat tant attendu :
    </p>
    <?php if ($calcul['resultat'] < 60) { ?>
        Tu peux faire <?php echo($calcul['resultat']); ?> avec ton inventaire actuel.
    <?php } else { ?>
        Félicitation tu as atteind les 60 évolutions recquise pour optimiser ton oeuf chance.
    <?php } ?>

        <h2>Un petit détail avec tout ça ?</h2>
    <p>
        <?php if ($calcul['petiteEvolTab'] != null) { ?>
        <h3>Evolution à 12 bonbons</h3>
        <?php
        foreach ($calcul['petiteEvolTab'] as $petiteEvol) {
            echo("Tu peux faire évoluer " . $petiteEvol['calcul'] . " fois " . $petiteEvol['nom'] . "<br/>");
        }
    }
    ?>
    </p>
    <p>
        <?php if ($calcul['moyenneEvolTab'] != null) { ?>
        <h3>Evolution à 25 bonbons</h3>
        <?php
        foreach ($calcul['moyenneEvolTab'] as $moyenneEvol) {
            echo("Tu peux faire évoluer " . $moyenneEvol['calcul'] . " fois " . $moyenneEvol['nom'] . "<br/>");
        }
    }
    ?>
    </p>
    <p>
        <?php if ($calcul['grandeEvolTab'] != null) { ?>
        <h3>Evolution à 50 bonbons</h3>
        <?php
        foreach ($calcul['grandeEvolTab'] as $grandeEvol) {
            echo("Tu peux faire évoluer " . $grandeEvol['calcul'] . " fois " . $grandeEvol['nom'] . "<br/>");
        }
    }
    ?>
    </p>
    <p>
        <?php if ($calcul['immenseEvolTab'] != null) { ?>
        <h3>Evolution à 100 bonbons</h3>
        <?php
        foreach ($calcul['immenseEvolTab'] as $immenseEvol) {
            echo("Tu peux faire évoluer " . $immenseEvol['calcul'] . " fois " . $immenseEvol['nom'] . "<br/>");
        }
    }
    ?>
    </p>
    <p>
        <?php if ($calcul['legendaireEvolTab'] != null) { ?>
        <h3>Evolution à 400 bonbons</h3>
        <?php
        foreach ($calcul['legendaireEvolTab'] as $legendaireEvol) {
            echo("Tu peux faire évoluer " . $legendaireEvol['calcul'] . " fois " . $legendaireEvol['nom'] . "<br/>");
        }
    }
    ?>
    </p>


    <?php session_destroy()?>










    