<?php

	class Change extends Database {
		private $session_id;
		private $new_sexe;
		private $new_recherche;
		private $new_ville;
		private $new_region;
		private $new_mail;
		private $new_pseudo;
		private $new_mdp;

		public function __construct() {
			if (isset($_SESSION) && isset($_POST["modifier"])) {
				$this->session_id = $_SESSION["id"];
				if (isset($_POST["sexe"])) {
					$this->new_sexe = $_POST["sexe"];
				}
				if (isset($_POST["recherche"])) {
					$this->new_recherche = $_POST["recherche"];
				}
				$this->new_ville = $_POST["ville"];
				$this->new_region = $_POST["region"];
				$this->new_mail = $_POST["mail"];
				$this->new_pseudo = $_POST["pseudo"];
				$this->new_mdp = $_POST["mdp"];
			}
		}

		public function change_declarations(&$str_tab, &$num_tab) {
			$str_tab = array(
				"sexe" => $this->new_sexe,
				"recherche" => $this->new_recherche,
				"ville" => $this->new_ville,
				"region" => $this->new_region,
				"mail" => $this->new_mail,
				"pseudo" => $this->new_pseudo,
				"mdp" => $this->new_mdp,
			);
			$num_tab = array(
				0 => $this->new_sexe,
				1 => $this->new_recherche,
				2 => $this->new_ville,
				3 => $this->new_region,
				4 => $this->new_mail,
				5 => $this->new_pseudo,
				6 => $this->new_mdp,
			);
		}

		public function change_query_generator(&$query) {
			$query = "update users set ";
			$str_tab = array();
			$num_tab = array();
			$exec_tab = array();
			$this->change_declarations($str_tab, $num_tab);
			$i = 0;
			foreach ($str_tab as $key => $value) {
				if ($value !== null && $value !== "" && $i < count($num_tab) &&
					$key !== "id_user") {
					$query .= $key . " = :" . $key;
					$exec_tab[$key] = $value;
				}
				if (isset($num_tab[$i + 1]) && $num_tab[$i + 1] !== "" &&
					$value !== null && $value !== "")
				{
						$query .= ", ";
				}
				$i++;
			}
			$query .= " where id_user like :id_user";
			$exec_tab["id_user"] = $_SESSION["id"];
			return $exec_tab;
		}

		public function change_checks($exec_tab) {
			$db = $this->connect();
			$exec = $db->prepare("select * from users where mail like ?");
			$exec->execute(array($this->new_mail));
			$mail_res = $exec->fetchAll();
			$exec = $db->prepare("select * from users where pseudo like ?");
			$exec->execute(array($this->new_pseudo));
			$pseudo_res = $exec->fetchAll();
			if (count($exec_tab) > 1 && count($pseudo_res) === 0 &&
				(preg_match("/[^([:space:]|[:digit:])]+/",
					$this->new_ville) === 1 || $this->new_ville === "") &&
				(preg_match("/[^([:space:]|[:digit:])]+/",
					$this->new_region) === 1 || $this->new_region === "")
				 && $this->new_mdp === $_POST["mdp_confirm"] &&
				count($mail_res) === 0) {
				return true;
			}
			return false;
		}

		public function change_execute() {
			$query = "";
			$exec_tab = $this->change_query_generator($query);
			if ($this->change_checks($exec_tab)) {
				foreach ($exec_tab as $key => $value) {
					if ($key !== "id_user") {
						$_SESSION[$key] = $value;
					}
				}
				$db = $this->connect();
				$exec = $db->prepare($query);
				$exec->execute($exec_tab);
				?><h4>Vos informations ont bien été modifiées!</h4><?php
				return true;
			}
			else {
				?><h4>Une erreur s'est produite, vos informations n'ont
					pas été modifiées</h4><?php
				return false;
			}
		}
	}

?>