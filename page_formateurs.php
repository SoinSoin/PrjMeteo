<?php 

session_start();

$mail = $_COOKIE['e_mail'];

$bd = "host=localhost port=5432 dbname=bdd_meteon user=admin password=admin";

$connect = pg_connect($bd);

$requeteNom = pg_fetch_array(pg_query("SELECT nom, prenom FROM utilisateur WHERE mail = '".$mail."';"));

// Afficher la date du jour et des jours précédents

$dateJour =  date("Y-m-d");
$dateJmoins1 =  strftime("%y-%m-%d", mktime(0, 0, 0, date('m'), date('d')-1, date('y'))); 
$dateJmoins2 =  strftime("%y-%m-%d", mktime(0, 0, 0, date('m'), date('d')-2, date('y'))); 
$dateJmoins3 =  strftime("%y-%m-%d", mktime(0, 0, 0, date('m'), date('d')-3, date('y'))); 

//Afficher le nombre d'icones sur les trois derniers jours

//Requete SQL : les types d'icones sont rangés par ordre croissant, pour afficher leur décompte il faut sélectionner la ligne qui leur correspond dans le tableau

$humeurMoins1 = pg_fetch_all_columns(pg_query("SELECT COUNT(fk_idhumeur) FROM meteodujour INNER JOIN date ON meteodujour.fk_iddate = date.iddate WHERE date.datejour = '".$dateJmoins1."' GROUP BY (fk_idhumeur) ORDER BY (fk_idhumeur);"));

$humeurMoins2 = pg_fetch_all_columns(pg_query("SELECT COUNT(fk_idhumeur) FROM meteodujour INNER JOIN date ON meteodujour.fk_iddate = date.iddate WHERE date.datejour = '".$dateJmoins2."' GROUP BY (fk_idhumeur) ORDER BY (fk_idhumeur);"));

$humeurMoins3 = pg_fetch_all_columns(pg_query("SELECT COUNT(fk_idhumeur) FROM meteodujour INNER JOIN date ON meteodujour.fk_iddate = date.iddate WHERE date.datejour = '".$dateJmoins3."' GROUP BY (fk_idhumeur) ORDER BY (fk_idhumeur);"));

//Afficher le nombre total d'icones depuis le début de la formation

$humeurAnnee = pg_fetch_all_columns(pg_query("SELECT COUNT(fk_idhumeur) FROM meteodujour INNER JOIN date ON meteodujour.fk_iddate = date.iddate WHERE date.datejour <= '".$dateJour."' GROUP BY (fk_idhumeur) ORDER BY (fk_idhumeur);"));

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

    <div id="logo">
        <img src="images/logo_METEON.png" title="logo" class="logo"></img>
    </div>
    <div id="diventre"></div>
    <div id="date">  </div>
    <div id="n_p">
        <span id="php_np">
            <?php echo "$requeteNom[1] $requeteNom[0]";?>
        </span>
    </div>
        <div id="pos_bouton">
            <a href="formulaire_modifications_utilisateur.php" class="redirection"><input type="button" name="boutonmodif" id="bouton_modifier" value="Modifier"></a>
            <a href="php/deco.php" class="redirection"><input type="button" name="boutondeco" id="bouton_deconnexion" value="Déconnexion"></a>
        </div>
    </div>
    <div id="menu_lat_droit">
        <div id="icone_1">
            <img src="images/ico_rainbow.png">
        </div>
        <div> <p> <?php echo "$humeurAnnee[0]"; ?> </p> </div>
        <div id="icone_2">
            <img src="images/ico_soleil.png">
        </div>
        <div> <p> <?php echo "$humeurAnnee[1]"; ?> </p> </div>

        <div id="icone_3">
            <img src="images/ico_brouillard.png">
        </div>
        <div> <p> <?php echo "$humeurAnnee[2]"; ?> </p> </div>

        <div id="icone_4">
            <img src="images/ico_pluie.png">
        </div>
        <div> <p> <?php echo "$humeurAnnee[3]"; ?> </p> </div>

        <div id="icone_5">
            <img src="images/ico_vent.png">
        </div>
        <div> <p> <?php echo "$humeurAnnee[4]"; ?> </p> </div>

        <div id="icone_6">
            <img src="images/ico_orage.png">
        </div>
        <div> <p> <?php echo "$humeurAnnee[5]"; ?> </p> </div>

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
        <div class="jour">
            <p><?php echo "$dateJmoins3"; ?></p>       
            <div class="conteneurColonne">
                <div><img src="images/ico_rainbow.png"></div>
                <div> <p> <?php echo "$humeurMoins3[0]"; ?> </p> </div>
            </div>
            <div class="conteneurColonne">
                <div><img src="images/ico_soleil.png"></div>
                <div> <p> <?php echo "$humeurMoins3[1]"; ?> </p> </div>
            </div>
            <div class="conteneurColonne">
                <div><img src="images/ico_brouillard.png"></div>
                <div> <p> <?php echo "$humeurMoins3[2]"; ?> </p> </div>
            </div>
            <div class="conteneurColonne">
                <div><img src="images/ico_pluie.png"></div>
                <div> <p> <?php echo "$humeurMoins3[3]"; ?> </p> </div>
            </div>
            <div class="conteneurColonne">
                <div><img src="images/ico_vent.png"></div>
                <div> <p> <?php echo "$humeurMoins3[4]"; ?> </p> </div>
            </div>
            <div class="conteneurColonne">
                <div><img src="images/ico_orage.png"></div>
                <div> <p> <?php echo "$humeurMoins3[5]"; ?> </p> </div>
            </div>
        </div>

        <div class="jour">
            <p> <?php echo "$dateJmoins2"; ?> </p>
            <div class="conteneurColonne">
                <div><img src="images/ico_rainbow.png"></div>
                <div> <p> <?php echo "$humeurMoins2[0]"; ?> </p> </div>
            </div>
            <div class="conteneurColonne">
                <div><img src="images/ico_soleil.png"></div>
                <div> <p> <?php echo "$humeurMoins2[1]"; ?> </p> </div>
            </div>
            <div class="conteneurColonne">
                <div><img src="images/ico_brouillard.png"></div>
                <div> <p> <?php echo "$humeurMoins2[2]"; ?> </p> </div>
            </div>
            <div class="conteneurColonne">
                <div><img src="images/ico_pluie.png"></div>
                <div> <p> <?php echo "$humeurMoins2[3]"; ?> </p> </div>
            </div>
            <div class="conteneurColonne">
                <div><img src="images/ico_vent.png"></div>
                <div> <p> <?php echo "$humeurMoins2[4]"; ?> </p> </div>
            </div>
            <div class="conteneurColonne">
                <div><img src="images/ico_orage.png"></div>
                <div> <p> <?php echo "$humeurMoins2[5]"; ?> </p> </div>
            </div>
        </div> 

        <div class="jour">
            <p><?php echo "$dateJmoins1"; ?></p>
            <div class="conteneurColonne">
                <div><img src="images/ico_rainbow.png"></div>
                <div> <p> <?php echo "$humeurMoins1[0]"; ?> </p> </div>
            </div>
            <div class="conteneurColonne">
                <div><img src="images/ico_soleil.png"></div>
                <div> <p> <?php echo "$humeurMoins1[1]"; ?> </p> </div>
            </div>
            <div class="conteneurColonne">
                <div><img src="images/ico_brouillard.png"></div>
                <div> <p> <?php echo "$humeurMoins1[2]"; ?> </p> </div>
            </div>
            <div class="conteneurColonne">
                <div><img src="images/ico_pluie.png"></div>
                <div> <p> <?php echo "$humeurMoins1[3]";?> </p> </div>
            </div>
            <div class="conteneurColonne">
                <div><img src="images/ico_vent.png"></div>
                <div> <p> <?php echo "$humeurMoins1[4]"; ?> </p> </div>
            </div>
            <div class="conteneurColonne">
                <div><img src="images/ico_orage.png"></div>
                <div> <p> <?php echo "$humeurMoins1[5]"; ?> </p> </div>
            </div>
        </div>          
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