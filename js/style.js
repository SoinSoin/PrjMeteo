
//Cette fonction sert a rendre le reste de la page incliquable (sauf le menu humeur)

function getValueUn() {
    number = 1;
}
function getValueDeux() {
    number = 2;
}
function getValueTrois() {
    number = 3;
}
function getValueQuatre() {
    number = 4;
}
function getValueCinq() {
    number = 5;
}
function getValueSix() {
    number = 6
}

function MapIcone() {

    if (number == 1) {
        document.getElementById("ico").src = "images/ico_rainbow.png";
        document.getElementById("premiere_icone").src = "images/ico_rainbow2.png";
        document.getElementById("deuxieme_icone").src = "images/ico_soleil.png";
        document.getElementById("troisieme_icone").src = "images/ico_brouillard.png";
        document.getElementById("quatrieme_icone").src = "images/ico_pluie.png";
        document.getElementById("cinquieme_icone").src = "images/ico_vent.png";
        document.getElementById("sizieme_icone").src = "images/ico_orage.png";
        //document.getElementById("premiere_icone").src = "images/ico_soleil.png"
    } else if (number == 2) {
        document.getElementById("ico").src = "images/ico_soleil.png"
        document.getElementById("premiere_icone").src = "images/ico_rainbow.png";
        document.getElementById("deuxieme_icone").src = "images/ico_soleil2.png";
        document.getElementById("troisieme_icone").src = "images/ico_brouillard.png";
        document.getElementById("quatrieme_icone").src = "images/ico_pluie.png";
        document.getElementById("cinquieme_icone").src = "images/ico_vent.png";
        document.getElementById("sizieme_icone").src = "images/ico_orage.png";
    } else if (number == 3) {
        document.getElementById("ico").src = "images/ico_brouillard.png"
        document.getElementById("premiere_icone").src = "images/ico_rainbow.png";
        document.getElementById("deuxieme_icone").src = "images/ico_soleil.png";
        document.getElementById("troisieme_icone").src = "images/ico_brouillard2.png";
        document.getElementById("quatrieme_icone").src = "images/ico_pluie.png";
        document.getElementById("cinquieme_icone").src = "images/ico_vent.png";
        document.getElementById("sizieme_icone").src = "images/ico_orage.png";
    } else if (number == 4) {
        document.getElementById("ico").src = "images/ico_pluie.png"
        document.getElementById("premiere_icone").src = "images/ico_rainbow.png";
        document.getElementById("deuxieme_icone").src = "images/ico_soleil.png";
        document.getElementById("troisieme_icone").src = "images/ico_brouillard.png";
        document.getElementById("quatrieme_icone").src = "images/ico_pluie2.png";
        document.getElementById("cinquieme_icone").src = "images/ico_vent.png";
        document.getElementById("sizieme_icone").src = "images/ico_orage.png";
    } else if (number == 5) {
        document.getElementById("ico").src = "images/ico_vent.png"
        document.getElementById("premiere_icone").src = "images/ico_rainbow.png";
        document.getElementById("deuxieme_icone").src = "images/ico_soleil.png";
        document.getElementById("troisieme_icone").src = "images/ico_brouillard.png";
        document.getElementById("quatrieme_icone").src = "images/ico_pluie.png";
        document.getElementById("cinquieme_icone").src = "images/ico_vent2.png";
        document.getElementById("sizieme_icone").src = "images/ico_orage.png";
    } else {
        document.getElementById("ico").src = "images/ico_orage.png"
        document.getElementById("premiere_icone").src = "images/ico_rainbow.png";
        document.getElementById("deuxieme_icone").src = "images/ico_soleil.png";
        document.getElementById("troisieme_icone").src = "images/ico_brouillard.png";
        document.getElementById("quatrieme_icone").src = "images/ico_pluie.png";
        document.getElementById("cinquieme_icone").src = "images/ico_vent.png";
        document.getElementById("sizieme_icone").src = "images/ico_orage2.png";
    }
}

// Fonction pour cacher le formulaire de l'humeur dans la page apprenant

function masquer_div(id) {
    document.getElementById(id).style.display = 'none';
    var comment = document.getElementById("commentaire").value;
    document.getElementById("ico").title = comment;

}

//Cette fonction sert a afficher la date du jour en format jour/mois/année

function myFunction() {
    var d = new Date();
    var weekday = new Array(7);
    //weekday[-2] = "Vendredi ";
    //weekday[-1] = "Samedi ";
    weekday[0] = "Dimanche ";
    weekday[1] = "Lundi ";
    weekday[2] = "Mardi ";
    weekday[3] = "Mercredi ";
    weekday[4] = "Jeudi ";
    weekday[5] = "Vendredi ";
    weekday[6] = "Samedi ";
    var q = new Date();
    var mois = new Array(12);
    mois[0] = "Janvier";
    mois[1] = "Février";
    mois[2] = "Mars";
    mois[3] = "Avril";
    mois[4] = "Mai";
    mois[5] = "Juin";
    mois[6] = "Juillet";
    mois[7] = "Août";
    mois[8] = "Septembre";
    mois[9] = "Octobre";
    mois[10] = "Novembre";
    mois[11] = "Décembre";
    var num = new Date();
    var rest = num.getDate();
    var n = weekday[d.getDay()];
    var m = mois[d.getMonth()];
    document.getElementById("date").innerHTML = n + rest + " " + m;
    //var n2 = weekday[d.getDay()-1];
    //document.getElementById("demo2").innerHTML = n2;
    //var n3 = weekday[d.getDay()-2];
    //document.getElementById("demo3").innerHTML = n3;
}
myFunction()

// Fonction de redirection vers la page pour se connecter

function redirection_index() {
    document.location.href = "index.php";
}

// Fonction de redirection vers la page pour modifier les informations personnelles

function redirection_modif() {
    document.location.href = "formulaire_modifications.php";
}