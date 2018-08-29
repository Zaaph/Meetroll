<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" lang="fr">
		<title>Inscription - Meetroll</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="front/css/style.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">

	</head>
	<body>
		<header class="row">
			<div class="col-sm-3">
				<a href="index.php" id="logo"><img src="http://via.placeholder.com/320x150" alt="logo"></a>
			</div>
			<div class="col-sm-1"></div>
			<div class="col-sm-1"></div>
			<div class="col-sm-4">
				<form method="post">
					<p>Déjà inscrit ?</p>
					<input type="email" name="mail_connexion" placeholder="Adresse Email">
					<input type="password" name="mdp_connexion" placeholder="Mot de passe">
					<input class="btn btn-success" type="submit" name="connexion" value="Connexion">
				</form>
			</div>
		</header>
		<?php
			include 'back/core.php';
			$index = new Core;
			$index->index_connexion();
		?>
		<h2>Inscription</h2>
		<div class="jumbotron">
			<form method="post" class="col-3">
				<div class="form-group">
					<label>Je suis :</label>
					<div class="radio" id="sexe">
						<label class="radio-inline"><input type="radio" name="sexe" value="homme">Un Homme</label>
						<label class="radio-inline"><input type="radio" name="sexe" value="femme">Une Femme</label>
						<label class="radio-inline"><input type="radio" name="sexe" value="troll">Un Troll</label>
					</div>
				</div>
				<div class="form-group">
					<label>Je recherche :</label>
					<div class="radio" id="recherche">
						<label class="radio-inline"><input type="radio" name="recherche" value="homme">Un Homme</label>
						<label class="radio-inline"><input type="radio" name="recherche" value="femme">Une Femme</label>
						<label class="radio-inline"><input type="radio" name="recherche" value="troll">Un Troll</label>
					</div>
				</div>
				<div class="form-group">
					<label for="nom">Nom :</label>
					<input type="text" name="nom" id="nom" placeholder="Entrez votre nom">
				</div>
				<div class="form-group">
					<label for="prenom">Prénom :</label>
					<input type="text" name="prenom" id="prenom" placeholder="Entrez votre prénom">
				</div>
				<div class="form-group">
					<label for="date_naissance">Date de naissance :</label>
					<input type="date" name="date_naissance" id="date_naissance">
				</div>
				<div class="form-group">
					<label for="ville">Ville :</label>
					<input type="text" name="ville" id="ville" placeholder="Entrez votre ville">
				</div>
				<div class="form-group">
					<label for="region">Région :</label>
					<input type="text" name="region" id="region" placeholder="Entrez votre région">
				</div>
				<div class="form-group">
					<label for="mail">Adresse email :</label>
					<input type="email" name="mail" id="mail" placeholder="adresse@exemple.com">
				</div>
				<div class="form-group">
					<label for="pseudo">Pseudo :</label>
					<input type="text" name="pseudo" id="pseudo" placeholder="Choisissez votre pseudo">
				</div>
				<div class="form-group">
					<label for="mdp">Mot de passe :</label>
					<input type="password" name="mdp" id="mdp" placeholder="Choisissez votre mot de passe">
				</div>
				<div class="form-group">
					<label for="mdp_confirm">Confirmez votre mot de passe :</label>
					<input type="password" name="mdp_confirm" id="mdp_confirm" placeholder="Confirmez votre mot de passe">
				</div>
				<div class="form-group">
					<input class="btn btn-success" type="submit" name="inscription" value="S'inscrire">
					<input class="btn btn-warning" type="reset" value="Effacer les champs">
				</div>
			</form>
			<img src="front/src/trolls.jpg" class="col-6" alt="trolls">
		</div>
		<?php
			$index->index_inscription();
		?>
		<footer class="footer">
			<div class="row">
				<div class="col-6">
					<a href="">Contact</a>
				</div>
				<div class="col-6">
					<p>Copyright Meetroll - 2018</p>
				</div>
			</div>
		</footer>
		<script
			src="https://code.jquery.com/jquery-3.3.1.min.js"
			integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			crossorigin="anonymous">
		</script>
	</body>
</html>