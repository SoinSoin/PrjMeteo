// on initialise les variables qui vont nous servir pour vérifier la validité du mail
 var reg;
 var email;

// cette première fonction vérifie la validité du mail
function test_adresse_email(email)
{	
	/*on récupère les données entrées dans le champ mail*/
	email = document.getElementById("email").value;
    /* Fonction récupérée sur internet, elle permet de vérifier manuellement la validité 
	de l'adresse mail (si elle a le format email pas si c'est un email validé par la bdd) 
	en javascript ATTENTION SI LE JS EST DESACTIVE SUR LE NAVIGATEUR CELA NE FONCTIONNERA 
	PLUS IL FAUT FAIRE UNE VERIF EN PHP A COTE*/
    reg = /^(([^<()[\]\\.,;:\s@\]+(\.[^<()[\]\\.,;:\s@\]+)*)|(.+))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/.test(email);
}


function redirection(email)
{
/* Je récupère la valeur de ma fonction appelée dans une variable pour 
m'en servir comme condition pour savoir si la redirection s'effectue ou non ,
le ! devant reg sert a inverser sa valeur car la fonction if (reg) s'effectuera si jamais reg a la
valeur TRUE or ici on l'inverse afin d'afficher l'alert avant la redirection*/
	if (!reg)
	{
		alert("Adresse mail invalide !");
	}
/* ici la redirection s'effectuera si reg est TRUE donc si le format est valide*/
	else 
	{
	document.location.href="index.html";
	}
}


function confirme_ajout(){
	var mail = document.getElementById('mai_l');
	console.log(mail);
	if (confirm("Etes-vous sur de vouloir ajouter " + mail.value + " ?")){
}
}
