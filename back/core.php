<?php

	include 'database.php';
	include 'inscription.php';
	include 'connexion.php';
	include 'change_info_back.php';
	include 'search_generator.php';

	class Core {
		public function index_connexion() {
			if (isset($_POST["connexion"])) {
				$test = new Connexion();
				$test->session_connexion();
			}
		}

		public function index_inscription() {
			if (isset($_POST["inscription"])) {
				$inscr = new Inscription;
				$db = $inscr->connect();
				$query = "";
				$tab = $inscr->addUser($query);
				$exec = $db->prepare($query);
				if ($tab) {
					$exec->execute($tab);
					$test = new Connexion;
					$test->session_connexion();
				} 
			}
		}

		public function mon_compte_handler() {
			if (isset($_POST["delete"])) {
				$test = new Database;
				$db = $test->connect();
				$query = "update users set deleted='yes' where id_user=?";
				$exec = $db->prepare($query);
				$exec->execute(array($_SESSION["id"]));
				session_destroy();
				header("Location: index.php");
			} elseif(isset($_POST["deconnexion"])) {
				$deconnect = new Connexion;
			}
		}

		public function change_info_handler() {
			if (isset($_POST["modifier"])) {
				$test = new Change;
				$test->change_execute();
			} else if (isset($_POST["deconnexion"])) {
				$deconnect = new Connexion;
			}
		}

		public function search_people() {
			if (isset($_POST["rechercher"])) {
				$query = "";
				$search = new Search;
				$exec_tab = $search->search_query_generator($query);
				$db = $search->connect();
				$exec = $db->prepare($query);
				$check = "select sexe, age, ville, region, id_user, ";
				$check .= "pseudo from users where ()";
				if ($query !== $check) {
					$exec->execute($exec_tab);
					$res = $exec->fetchAll();
					if (count($res) > 0) {
						$search->search_html_generator($res);
					} else { ?>
						<h4>Aucun résultat trouvé pour cette recherche!</h4>
					<?php }
				}
			} else if (isset($_POST["deconnexion"])) {
				$deconnect = new Connexion;
			}
		}
	}

?>