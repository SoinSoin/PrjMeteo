<?php

session_start();

$mail = $_COOKIE['e_mail'];

$bd = "host=localhost port=5432 dbname=bdd_meteon user=admin password=admin";

$connect = pg_connect($bd);

$requeteNom = pg_fetch_array(pg_query("SELECT nom, prenom FROM utilisateur WHERE mail = '".$mail."';"));
?>

<!DOCTYPE html>
<html>

<head>
    <title>Page météo</title>
    <meta charset="utf-8">  
    <link rel="stylesheet" type="text/css" href="css/style_apprenants.css">
    <link rel="stylesheet" type="text/css" href="css/style_menu_haut_et_carte.css">
    <script type="text/javascript">
        history.forward();
    </script>
</head>

<body>

    <!-- Début filtre transparent permettant de bloquer l'interraction sur la page web tant que l'humeur n'est pas valider -->

    <div id="humeur">

        <div id="formulaire">
            <form id="formulaire_humeur" method="post" action="traitement.php">
                <p id="texte_humeur">De quelle humeur êtes vous?</p>
                <img src="images/ico_rainbow.png" title="Arc en ciel" class="icones" id="premiere_icone" value="1" onclick="getValueUn();MapIcone()">
                </img>
                <img src="images/ico_soleil.png" title="Soleil" class="icones" value="2" id="deuxieme_icone" onclick="getValueDeux();MapIcone()">
                </img>
                <img src="images/ico_brouillard.png" title="Vent" class="icones" value="3" id="troisieme_icone" onclick="getValueTrois();MapIcone()">
                </img>
                <img src="images/ico_pluie.png" title="Pluie" class="icones" value="4" id="quatrieme_icone" onclick="getValueQuatre();MapIcone()">
                </img>
                <img src="images/ico_vent.png" title="Brouillard" class="icones" value="5" id="cinquieme_icone" onclick="getValueCinq();MapIcone()">
                </img>
                <img src="images/ico_orage.png" title="Orage" class="icones" value="6" id="sizieme_icone" onclick="getValueSix();MapIcone()">
                </img>

                <textarea id="commentaire" placeholder="Commentaire" maxlength="200" value="" onclick="javascript:getComment()"></textarea>

                <input id="valider" type="button" value="Valider" onclick="masquer_div('humeur');MapIcone()" />
            </form>
        </div>
    </div>
    <div id="logo">
        <img src="images/logo_METEON.png" title="logo" class="logo">
        </img>
    </div>
    <div id="diventre"></div>
    <div id="date"></div>
    <div id="n_p">
        <span id="php_np">
            <!-- Requete pour afficher nom et prenom -->
            <?php echo "$requeteNom[1] $requeteNom[0]";?>
        </span>
        <div id="pos_bouton">
            <a href="formulaire_modifications_utilisateur.php" class="redirection"><input type="button" name="boutonmodif" id="bouton_modifier" value="Modifier"></a>
            <a href="php/deco.php" class="redirection"><input type="button" name="boutondeco" id="bouton_deconnexion" value="Déconnexion"></a>
        </div>
    </div>
    <div id="menu_lat_droit">
        <div class="histo_jour">J-4</div>
        <div class="histo_jour">J-3</div>
        <div class="histo_jour">J-2</div>
        <div class="histo_jour">J-1</div>
        <div class="histo_jour">Total des icones</div>
        <div id="humeur_stat">Humeur stat</div>
    </div>
    <div id="carte">
        <img id="img_carte" src="images/map.jpg">
        <div class="wrapper">
            <div class="item1"><img id="ico" title="Je vais bien." src="images/ico_soleil.png">
                <br />
                <span>mon texte</span>
            </div>
            <div class="item2"><img id="ico" src=images/ico_soleil.png>
                <br />
                <span>mon texte</span>
            </div>
            <div class="item3"><img id="ico" src=images/ico_soleil.png>
                <br />
                <span>mon texte</span>
            </div>
            <div class="item4"><img id="ico" src=images/ico_soleil.png>
                <br />
                <span>mon texte</span>
            </div>
            <div class="item5"><img id="ico" src=images/ico_soleil.png>
                <br />
                <span>mon texte</span>
            </div>
            <div class="item6"><img id="ico" src=images/ico_soleil.png>
                <br />
                <span>mon texte</span>
            </div>
            <div class="item7"><img id="ico" src=images/ico_soleil.png>
                <br />
                <span>mon texte</span>
            </div>
            <div class="item8"><img id="ico" src=images/ico_soleil.png>
                <br />
                <span>mon texte</span>
            </div>
            <div class="item9"><img id="ico" src=images/ico_soleil.png>
                <br />
                <span>mon texte</span>
            </div>
            <div class="item10"><img id="ico" src=images/ico_soleil.png>
                <br />
                <span>mon texte</span>
            </div>
            <div class="item11"><img id="ico" src=images/ico_soleil.png>
                <br />
                <span>mon texte</span>
            </div>
            <div class="item12"><img id="ico" src=images/ico_soleil.png>
                <br />
                <span>mon texte</span>
            </div>
            <div class="item13"><img id="ico" src=images/ico_soleil.png>
                <br />
                <span>mon texte</span>
            </div>
            <div class="item14"><img id="ico" src=images/ico_soleil.png>
                <br />
                <span>mon texte</span>
            </div>
            <div class="item15"><img id="ico" src=images/ico_soleil.png>
                <br />
                <span>mon texte</span>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/style.js"></script>
</body>

</html>