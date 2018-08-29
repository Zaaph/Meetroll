<?php

	class Database {
		function connect() {
			try {
				$database = new PDO("mysql:host=localhost;dbname=my_meetic;charset=UTF8",
					"yourusername", "yourpassword");
				$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $error) {
				echo "La connexion à la base a échoué : " . $error->getMessage();
			}
			return $database;
		}
	}

?>