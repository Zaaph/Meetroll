<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="front/css/style.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
		<title>Meetroll - Changer mes infos</title>
	</head>
	<body>
		<?php session_start();?>
		<header class="row">
			<div class="col-sm-3">
				<a href="mon_compte.php" id="logo"><img src="http://via.placeholder.com/320x150" alt="logo"></a>
			</div>
			<div class="col-sm-4"></div>
			<div class="col-sm-3">
				<div id="menu">
					<div>
						<button class="btn btn-secondary" id="drop">Menu ⇓</button>
					</div>
					<div class="option">
						<a href="recherche.php" class="btn btn-secondary">Rechercher quelqu'un</a>
					</div>
					<div class="option">
						<a href="mon_compte.php" class="btn btn-secondary">Mon compte</a>
					</div>
					<div class="option">
						<button class="btn btn-secondary">Préférences</button>
					</div>
					<div class="option">
						<form method="post">
							<input type="submit" name="deconnexion" value="Se déconnecter" class="btn btn-danger">
						</form>
					</div>
				</div>
			</div>
		</header>
		<h2>Modifier mes informations</h2>
		<h4>Laissez les champs blancs si vous ne souhaitez pas les modifier</h4>
		<div class="jumbotron">
			<form method="post" class="col-3">
				<div class="form-group">
					<label>Je suis devenu:</label>
					<div class="radio" id="sexe">
						<label class="radio-inline"><input type="radio" name="sexe" value="homme">Un Homme</label>
						<label class="radio-inline"><input type="radio" name="sexe" value="femme">Une Femme</label>
						<label class="radio-inline"><input type="radio" name="sexe" value="troll">Un Troll</label>
					</div>
				</div>
				<div class="form-group">
					<label>Je recherche désormais:</label>
					<div class="radio" id="recherche">
						<label class="radio-inline"><input type="radio" name="recherche" value="homme">Un Homme</label>
						<label class="radio-inline"><input type="radio" name="recherche" value="femme">Une Femme</label>
						<label class="radio-inline"><input type="radio" name="recherche" value="troll">Un Troll</label>
					</div>
				</div>
				<div class="form-group">
					<label for="ville">Nouvelle ville :</label>
					<input type="text" name="ville" id="ville" placeholder="Modifiez votre ville">
				</div>
				<div class="form-group">
					<label for="region">Nouvelle région :</label>
					<input type="text" name="region" id="region" placeholder="Modifiez votre région">
				</div>
				<div class="form-group">
					<label for="mail">Nouvelle adresse email :</label>
					<input type="email" name="mail" id="mail" placeholder="adresse@exemple.com">
				</div>
				<div class="form-group">
					<label for="pseudo">Nouveau pseudo :</label>
					<input type="text" name="pseudo" id="pseudo" placeholder="Modifiez votre pseudo">
				</div>
				<div class="form-group">
					<label for="mdp">Nouveau mot de passe :</label>
					<input type="password" name="mdp" id="mdp" placeholder="Modifiez votre mot de passe">
				</div>
				<div class="form-group">
					<label for="mdp_confirm">Confirmez votre nouveau mot de passe :</label>
					<input type="password" name="mdp_confirm" id="mdp_confirm" placeholder="Confirmez la modification">
				</div>
				<div class="form-group">
					<input class="btn btn-success" type="submit" name="modifier" value="Modifier mes informations">
					<input class="btn btn-warning" type="reset" value="Effacer les champs">
					<a class="btn btn-secondary" href="mon_compte.php">Retour</a>
				</div>
			</form>
		</div>
		<?php
			include 'back/core.php';
			$change = new Core;
			$change->change_info_handler();
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
		<script src="front/js/menu.js"></script>
	</body>
</html>