<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" lang="fr">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="front/css/style.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
		<title>Meetroll - Bienvenue!</title>
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
							<a href="change_info.php" class="btn btn-secondary">Changer mes infos</a>
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
		<h2>Bonjour, <?= $_SESSION["pseudo"]?>!</h2>
		<div class="jumbotron">
			<div class="row col-12">
				<div class="col-3"></div>
				<div class="col-2">
					<p>Nom : <?= $_SESSION["nom"]?></p>
					<p>Prénom : <?= $_SESSION["prenom"]?></p>
				</div>
				<div class="col-2">
					<p>Date de naissance : <?= $_SESSION["date_naissance"]?></p>
					<p>Email : <?= $_SESSION["mail"]?></p>
				</div>
				<div class="col-2">
					<p>Sexe : <?= $_SESSION["sexe"]?></p>
					<p>Mot de passe : <?= $_SESSION["mdp"]?></p>
				</div>
				<div class="col-3"></div>
			</div>
			<div class="row">
				<form method="post">
					<div class="col-4">
						<a href="change_info.php" class="btn btn-outline-dark">Changer mes informations</a>
					</div>
					<div class="col-4">
						<input id="delete" name="delete" type="submit" class="btn btn-outline-danger" value="Supprimer mon compte">
					</div>
				</form>
			</div>
		</div>
		<?php
			include 'back/core.php';
			$compte = new Core;
			$compte->mon_compte_handler();
		?>
		<footer class="footer">
			<div class="row">
				<div class="col-sm-6">
					<a href="">Contact</a>
				</div>
				<div class="col-sm-6">
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