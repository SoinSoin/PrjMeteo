<?php 

session_start();

$iduser = $_COOKIE['e_mail'];

$bd = "host=localhost port=5432 dbname=bdd_meteon user=admin password=admin";

$connect = pg_connect($bd);

$requete = pg_query("SELECT nom, prenom FROM utilisateur WHERE mail = '".$iduser."';");

//$oui= pg_query('SELECT "fk_idutilisateur", "fk_idhumeur", "fk_iddate" FROM meteodujour WHERE "fk_idutilisateur"= 7 AND "fk_iddate" BETWEEN 5 AND 16;');

// $result=pg_fetch_array($oui);
// print_r($result);

$resultat = pg_fetch_array($requete);


?>
<!DOCTYPE html>
<html>

<head>
    <title>Page météo</title>
    <meta charset="utf-8">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style_formateurs.css">
    <link rel="stylesheet" type="text/css" href="css/style_menu_haut_et_carte.css">
    <script type="text/javascript">
        history.forward();
    </script>
</head>

<body>

    <!-- Début menu du haut -->

    <div id="logo">
        <img src="images/logo_METEON.png" title="logo" class="logo"></img>
    </div>
    <div id="diventre"></div>
    <div id="date"></div>
    <div id="n_p">
        <span id="php_np">
            <?php echo "$resultat[1] $resultat[0]";?>
        </span>
    </div>
        <div id="pos_bouton">
            <a href="formulaire_modifications.php" class="redirection"><input type="button" name="boutonmodif" id="bouton_modifier" value="Modifier"></a>
            <a href="deco.php" class="redirection"><input type="button" name="boutondeco" id="bouton_deconnexion" value="Déconnexion"></a>
        </div>
    </div>
    <div id="menu_lat_droit">
        <div id="icone_1">
            <img src="images/ico_rainbow.png">
        </div>
        <div id="icone_2">
            <img src="images/ico_soleil.png">
        </div>
        <div id="icone_3">
            <img src="images/ico_brouillard.png">
        </div>
        <div id="icone_4">
            <img src="images/ico_pluie.png">
        </div>
        <div id="icone_5">
            <img src="images/ico_vent.png">
        </div>
        <div id="icone_6">
            <img src="images/ico_orage.png">
        </div>
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
    <div id="review">
        <div class="jour">J-3</div>
        <div class="jour">J-2</div>
        <div class="jour">J-1</div>
    </div>
    <div id="menu_lat_droit_stat">
        <form>
            <br>
            <br>
            <br>
            <span>De :</span>
            <br>
            <input type="date" name="debut">
            <br>
            <br>
            <span>A :</span>
            <br>
            <input type="date" name="arriver">
            <br>
            <br>
            <br>
            <select name="liste_duree" style="width: 150px">
                <option>Semaine en cours</option>
                <option>Mois en cours</option>
                <option>Année en cours</option>
            </select>
            <br>
            <br>
            <br>
            <br>
            <br>
            <select name="liste_nombre" style="width: 100px">
                <option>Groupe</option>
                <option>Personne</option>
            </select>
            <br>
            <br>
            <br>
            <br>
            <input type="submit" name="">
        </form>
    </div>
    <div id="affichage_stat" style="width: 700px; height: 500px">
    <?php
    $chainevaleur="";
    $oui=pg_query('SELECT "fk_idutilisateur", "fk_idhumeur", "fk_iddate" FROM meteodujour WHERE "fk_idutilisateur"= 7 AND "fk_iddate" BETWEEN 5 AND 16;');
    while($result=pg_fetch_array($oui) ){ 
        $chainevaleur.=  $result[1];
    }
    ?> 
       <input id="donnees" type="hidden" value='<?php echo $chainevaleur; ?>'>

   
    </div>
    <script type="text/javascript" src="js/style.js"></script>
    <script type="text/javascript" src="js/stats.js"></script>

</body>

</html>