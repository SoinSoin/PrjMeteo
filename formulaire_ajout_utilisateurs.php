<!DOCTYPE html>
<html>

<head>
    <title>Ajouter utilisateur</title>
    <link rel="stylesheet" type="text/css" href="css/style_ajout.css">
</head>

<body>
	<div id="tout">
		<h1>Ajouter un nouvel utilisateur</h1>
		<form class="box" action="ajoututil.php" method="post">
			<div class="adresse">
				<p> Adresse Email :
					<input id="mai_l" type="email" name="adresse" required placeholder="nomutilisateur@gmail.com">
				</p>
			</div>
			<label class="statut">
                <p>Statut :
                    <select name="statut">
                        <option>Formateur</option>
                        <option>Apprenant</option>
                    </select>
                </p>
            </label>
            <div class="valider">
                <input class="boutton" type="button" value="Ajouter" onclick="confirme_ajout()">
            </div>
        </form>
    </div>
    <script type="text/javascript" src="js/app.js"></script>
</body>

</html>
