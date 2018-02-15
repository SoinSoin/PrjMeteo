<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style_form_inscription.css">
    <title>METEON - Inscription</title>
</head>

<body>
    <h1>Formulaire d'inscription</h1>
    <form id="formulaire" method="post" action="php/inscription.php">
        <p>
            <label>Votre nom</label> :
            <br>
            <br>
            <input type="text" name="nom" placeholder="Ex : Dupont" required/>
        </p>
        <p>
            <label>Votre prénom</label> :
            <br>
            <br>
            <input type="text" name="prenom" placeholder="Ex : Alexandre" required/>
        </p>
        <p>
            <label>Adresse e-mail</label> :
            <br>
            <br>
            <input type="email" name="mail" placeholder="Ex : exemple@domaine.com" value="" required/>

        </p>
        <p>
            <label>Votre mot de passe</label> :
            <br>
            <br>
            <input class="input" type="password" name="motdepasse" placeholder="mot de passe" required/>
        </p>
        <p>
            <label>Confirmer votre mot de passe</label> :
            <br>
            <br>
            <input type="password" name="motdepasse2" placeholder="mot de passe" required/>
        </p>
        <p>
            <label>Nom de la région</label> :
            <br>
            <br>
            <input type="text " name="nomderegion" placeholder="Ex : Fantasia" required/>
        </p>
        <input type="submit" name="envoyer" id="bouton">
    </form>
</body>

</html>