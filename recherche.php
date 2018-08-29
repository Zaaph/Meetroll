<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="front/css/style.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
		<title>Meetroll - Rechercher quelqu'un</title>
	</head>
	<body>
		<?php session_start();?>
		<header class="row">
			<div class="col-sm-3">
				<a href="mon_compte.php" id="logo"><img src="http://via.placeholder.com/320x150"  alt="logo"></a>
			</div>
			<div class="col-sm-4"></div>
			<div class="col-sm-3">
				<div id="menu">
					<div>
						<button class="btn btn-secondary" id="drop">Menu ⇓</button>
					</div>
					<div class="option">
						<a href="mon_compte.php" class="btn btn-secondary">Mon compte</a>
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
		<h2>Rechercher quelqu'un</h2>
		<div class="jumbotron">
			<form method="post">
				<div class="form-check">
					<label>Rechercher :</label>
					<div id="sexe">
						<label><input type="checkbox" name="homme">Un Homme</label>
						<label><input type="checkbox" name="femme">Une Femme</label>
						<label><input type="checkbox" name="troll">Un Troll</label>
					</div>
				</div>
				<div class="form-check">
					<label>Tranche d'âge :</label>
					<div id="age">
						<label><input type="checkbox" name="18+">18/25 ans</label>
						<label><input type="checkbox" name="25+">25/35 ans</label>
						<label><input type="checkbox" name="35+">35/45 ans</label>
						<label><input type="checkbox" name="45+">45 ans et plus</label>
					</div>
				</div>
				<div class="form-group">
					<label for="ville">Rechercher par ville :</label>
					<input type="text" name="ville" id="ville" placeholder="Exemple: lyon, paris">
				</div>
				<div class="form-group">
					<label for="region">Rechercher par région :</label>
					<input type="text" name="region" id="region" placeholder="Exemple: idf, normandie">
				</div>
				<div class="form-group">
					<input type="submit" name="rechercher" class="btn btn-success" value="Rechercher">
					</div>
			</form>
		</div>
		<?php
			include 'back/core.php';;
			if (isset($_POST["deconnexion"])) {
				$deconnect = new Connexion;
			}
			$test = new Core;
			$test->search_people();
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
		<script src="front/js/carousel.js"></script>
	</body>
</html>