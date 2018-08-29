<?php
	class Search extends Database {

		public function search_set_inputs() {
			if (isset($_POST["ville"])) {
				$_POST["ville"] = trim(preg_replace("/[[:space:]]+/",
					" ", $_POST["ville"]));
			}
			if (isset($_POST["region"])) {
				$_POST["region"] = trim(preg_replace("/[[:space:]]+/",
					" ", $_POST["region"]));
			}
		}

		public function search_sex_helper(&$query) {
			if (isset($_POST["homme"])) {
				$query .= "sexe = 'homme'";
				if (isset($_POST["femme"]) || isset($_POST["troll"])) {
					$query .= " or ";
				} else if (isset($_POST["18+"]) || isset($_POST["25+"]) ||
					isset($_POST["35+"]) || isset($_POST["45+"]) ||
					$_POST["ville"] !== "" || $_POST["region"] !== "") {
					$query .= ") and (";
				}
			}
			if (isset($_POST["femme"])) {
				$query .= "sexe = 'femme'";
				if (isset($_POST["troll"])) {
					$query .= " or ";
				} else if (isset($_POST["18+"]) || isset($_POST["25+"]) ||
					isset($_POST["35+"]) || isset($_POST["45+"]) ||
					$_POST["ville"] !== "" || $_POST["region"] !== "") {
					$query .= ") and (";
				}
			}
		}

		public function search_young_helper(&$query) {
			if (isset($_POST["18+"])) {
				$query .= "age between 18 and 25";
				if (isset($_POST["25+"]) || isset($_POST["35+"]) ||
					isset($_POST["45+"]) || $_POST["ville"] !== "" ||
					$_POST["region"] !== "") {
					$query .= " or ";
				}
			}
			if (isset($_POST["25+"])) {
				$query .= "age between 25 and 35";
				if (isset($_POST["35+"]) || isset($_POST["45+"]) ||
					$_POST["ville"] !== "" || $_POST["region"] !== "") {
					$query .= " or ";
				}
			}
		}

		public function search_old_helper(&$query) {
			if (isset($_POST["35+"])) {
				$query .= "age between 35 and 45";
				if (isset($_POST["45+"]) || $_POST["ville"] !== "" ||
					$_POST["region"] !== "") {
					$query .= " or ";
				}
			}
			if (isset($_POST["45+"])) {
				$query .= "age >= 45";
				if ($_POST["ville"] !== "" || $_POST["region"] !== "") {
					$query .= " or ";
				}
			}
		}

		public function search_ville_helper(&$query, &$exec_tab, &$j) {
			if ($_POST["ville"] !== "") {
				$i = 0;
				$ville_tab = explode(", ", trim($_POST["ville"]));
				foreach ($ville_tab as $value) {
					if ($value != "") {
						$query .= "upper(ville) = upper(?)";
						$exec_tab[$j] = $value;
						$j++;
						if (isset($ville_tab[$i + 1]) &&
							$ville_tab[$i + 1] !== "") {
							$query .= " or ";
						}
					}
					$i++;
				}
				if ($_POST["region"] !== "") {
					$query .= " or ";
				}
			}
		}

		public function search_region_helper(&$query, &$exec_tab, &$j) {
			if ($_POST["region"] !== "") {
				$i = 0;
				$j = ($j > 0 ? $j : 0);
				$region_tab = explode(", ", $_POST["region"]);
				foreach ($region_tab as $value) {
					if ($value != "") {
						$query .= "upper(region) = upper(?)";
						$exec_tab[$j] = $value;
						$j++;
						if (isset($region_tab[$i + 1]) &&
							$region_tab[$i + 1] !== "") {
							$query .= " or ";
						}
					}
					$i++;
				}
			}
		}

		public function search_query_generator(&$query) {
			$exec_tab = array();
			$query = "select sexe, age, ville, region, id_user, ";
			$query .= "pseudo from users where (";
			$j = 0;
			if (isset($_POST["rechercher"])) {
				$this->search_set_inputs();
				$this->search_sex_helper($query);
				if (isset($_POST["troll"])) {
					$query .= "sexe = 'troll'";
					if (isset($_POST["18+"]) || isset($_POST["25+"]) ||
						isset($_POST["35+"]) || isset($_POST["45+"]) ||
						$_POST["ville"] !== "" || $_POST["region"] !== "") {
						$query .= ") and (";
					}
				}
				$this->search_young_helper($query);
				$this->search_old_helper($query);
				$this->search_ville_helper($query, $exec_tab, $j);
				$this->search_region_helper($query, $exec_tab, $j);
				$query .= ")";
				return $exec_tab;
			}
		}

		public function search_html_generator($res) { 
			$i = 0; ?>
			<button id="previous" class="btn btn-secondary">&lt;&lt;</button>
			<button id="next" class="btn btn-secondary">>></button> <?php
			foreach ($res as $key => $value) {
				if ($res[$key]["id_user"] !== $_SESSION["id"]) { ?>
					<div class="carousel_item" id=<?="\"carousel_item" 
						. $i . "\""?>>
						<p>Pseudo : <?=$res[$key]["pseudo"]?></p>
						<p>Sexe : <?=$res[$key]["sexe"]?></p>
						<p>Age : <?=$res[$key]["age"]?></p>
						<p>Ville : <?=$res[$key]["ville"]?></p>
						<p>Région : <?=$res[$key]["region"]?></p>
					</div> <?php
					$i++;
				}
			} ?>
			<h4><?= $i ?> Résultat(s) trouvé(s)!</h4><?php

		}
	}
?>