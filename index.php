<!DOCTYPE HTML>
<!--
        Prism by TEMPLATED
        templated.co @templatedco
        Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<?php
session_start();
require 'kint/Kint.class.php';
include 'connexion/PDO.php';
?>
<html>
    <head>
        <title>PokeEvol</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="assets/css/main.css" />
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    </head>
    <body>

        <!-- Banner -->
        <section id="banner">
            <div class="inner split">
                <section>
                    <h2>Bienvenue sur PokeEvol</h2>
                </section>
                <section>
                    <p>Ce site a été conçu pour calculer le nombre total des évolutions de votre compte. <br/>
                        Pour ce faire remplissez le formulaire ci-dessous. Une fois validé vous saurez le nombre d'évolutions possibles. </p>
                </section>
                 
            </div>
        </section>

        <!-- One -->
        <section id="one" class="wrapper">
            <a href="#two" class='button'>Résultat</a>

            <section>
                <?php include 'vue/modifiePokemon.php'; ?>
            </section>

        </section>

        <!-- Two -->
        <?php if (isset($_SESSION['calcul'])) { ?>    
            <section id="two" class="wrapper style2 alt">


                <div class="content">
                    <?php include 'vue/resultat.php'; ?>
                </div>



            </section>
        <?php } else { ?>
            <section id="two" class="wrapper style2 alt">


                <div class="content">
                    <p>Veuillez d'abord saisir vos pokemons</p>
                </div>



            </section>
            <?php } ?>

        <!-- Footer -->
        <footer id="footer">
            
        </footer>

        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
        <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="assets/js/main.js"></script>

    </body>
</html>