<?php

	class Inscription extends Database {
		private $id;
		private $sexe;
		private $recherche;
		private $nom;
		private $prenom;
		private $date_naissance;
		private $ville;
		private $region;
		private $mail;
		private $pseudo;
		private $mdp;
		private $age;

		public function __construct() {
			if (isset($_POST["inscription"]) && isset($_POST["sexe"]) &&
				isset($_POST["recherche"])) {
				$this->sexe = $_POST["sexe"];
				$this->recherche = $_POST["recherche"];
				$this->nom = $_POST["nom"];
				$this->prenom = $_POST["prenom"];
				$this->date_naissance = $_POST["date_naissance"];
				$this->ville = $_POST["ville"];
				$this->region = $_POST["region"];
				$this->mail = $_POST["mail"];
				$this->pseudo = $_POST["pseudo"];
				$this->mdp = $_POST["mdp"];
				$age_tab = explode("-", $this->date_naissance);
				if (isset($age_tab[2]) &&
					date("md", date("U", mktime(0, 0, 0, $age_tab[2],
					$age_tab[1], $age_tab[0]))) > date("md")) {
					$this->age = (date("Y") - $age_tab[0]) - 1;
				} else if (isset($age_tab[2])) {
					$this->age = (date("Y") - $age_tab[0]);
				} else {
					$this->age = 0;
				}
			}
		}

		public function inscription_checks(&$query) {
			$db = $this->connect();
			$query = "select * from users where mail like ?";
			$exec = $db->prepare($query);
			$exec->execute(array($this->mail));
			$mail_res = $exec->fetchAll();
			$query = "select * from users where pseudo like ?";
			$exec = $db->prepare($query);
			$exec->execute(array($this->pseudo));
			$pseudo_res = $exec->fetchAll();
			if (count($pseudo_res) === 0 && count($mail_res) === 0 &&
				$this->age >= 18 && $this->mdp === $_POST["mdp_confirm"] &&
				preg_match("/[^([:space:]|[:digit:])]+/", $this->nom) === 1 &&
				preg_match("/[^([:space:]|[:digit:])]+/",
					$this->prenom) === 1 &&
				preg_match("/[^([:space:]|[:digit:])]+/",
					$this->ville) === 1 &&
				preg_match("/[^([:space:]|[:digit:])]+/", $this->region) === 1
				&& preg_match("/.+\@.+\..+/", $this->mail) === 1 && 
				$this->date_naissance !== "") {
				return true;
			}
			return false;
		}

		public function inscription_declaration() {
			$exec_arr = array(":sexe" => $this->sexe,
			":recherche" => $this->recherche, 
			":nom" => $this->nom,
			":prenom" => $this->prenom,
			":date_naissance" => $this->date_naissance,
			":ville" => $this->ville,
			":region" => $this->region,
			":mail" => $this->mail,
			":pseudo" => $this->pseudo,
			":mdp" => password_hash($this->mdp, PASSWORD_BCRYPT),
			":deleted" => "",
			":age" => $this->age);
			return $exec_arr;
		}

		public function addUser(&$query = null) {
			$exec_arr = $this->inscription_declaration();
			foreach ($exec_arr as $value) {
				if ($value === null || $value === "") {
					$query = "";
				}
			}
			if ($this->inscription_checks($query)) {
				$query = "insert into users (sexe, recherche, nom, prenom, ";
				$query .= "date_naissance, ville, region, mail, pseudo, mdp, ";
				$query .= "deleted, age) values (:sexe, :recherche, :nom, ";
				$query .= ":prenom, :date_naissance, :ville, :region, :mail, ";
				$query .= ":pseudo, :mdp, :deleted, :age)";
				return $exec_arr;
			}
			else {
				?><h4>Une erreur s'est produite lors de l'inscription! Veuillez
					réessayer</h4><?php
				return false;
			}
		}
	}

?>