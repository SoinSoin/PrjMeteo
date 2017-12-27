function redirection(email) {
    /* Je récupère la valeur de ma fonction appelée dans une variable pour 
    m'en servir comme condition pour savoir si la redirection s'effectue ou non ,
    le ! devant reg sert a inverser sa valeur car la fonction if (reg) s'effectuera si jamais reg a la
    valeur TRUE or ici on l'inverse afin d'afficher l'alert avant la redirection*/
    if (!reg) {
        alert("Adresse mail invalide !");
    }
    /* ici la redirection s'effectuera si reg est TRUE donc si le format est valide*/
    else {
        document.location.href = "index.html";
    }
}

function confirme_ajout() {
    var mail = document.getElementById('mai_l');
    console.log(mail);
    if (confirm("Etes-vous sur de vouloir ajouter " + mail.value + " ?")) {

    }
}