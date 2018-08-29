<?php

	class Connexion extends Database {
		private $mail;
		private $mdp;

		public function session_connexion() {
			if ($this->mail !== "" && $this->mdp !== "") {
				$db = $this->connect();
				$query = "select * from users where mail like ?";
				$exec = $db->prepare($query);
				$exec->execute(array($this->mail));
				$res = $exec->fetch();
			}
			if ($res && password_verify($this->mdp, $res["mdp"]) &&
				(!$res["deleted"] || $res["deleted"] === "")) {
				session_start();
				$_SESSION["id"] = $res["id_user"];
				$_SESSION["recherche"] = $res["recherche"];
				$_SESSION["pseudo"] = $res["pseudo"];
				$_SESSION["sexe"] = $res["sexe"];
				$_SESSION["nom"] = $res["nom"];
				$_SESSION["prenom"] = $res["prenom"];
				$_SESSION["mail"] = $res["mail"];
				$_SESSION["date_naissance"] = $res["date_naissance"];
				$_SESSION["mdp"] = $this->mdp;
				header("Location: mon_compte.php");
			}
			else {
				?><h4>Une erreur s'est produite lors de la connexion! Veuillez réessayer</h4><?php
			}
		}



		public function __construct() {
			if (isset($_POST["connexion"])) {
				$this->mail = $_POST["mail_connexion"];
				$this->mdp = $_POST["mdp_connexion"];
			} elseif (isset($_POST["inscription"])) {
				$this->mail = $_POST["mail"];
				$this->mdp = $_POST["mdp"];
			} elseif (isset($_POST["deconnexion"])) {
				if (session_destroy()) {
					header("Location: index.php");
				}
			}
		}
	}

?>