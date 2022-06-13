<?php
//Pour afficher les erreur pour debugger( A commenter quand on met en ligne le site)
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


//definition parametre BDD (base de données serveur LOCAL)
define("DB_HOSTNAME", "localhost");
define("DB_DATABASE", "ccxxaa00");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");


// //definition parametre BDD (base de données serveur LOCAL)
// define("DB_HOSTNAME", "localhost");
// define("DB_DATABASE", "ccxxaa00");
// define("DB_USERNAME", "root");
// define("DB_PASSWORD", "");

// fonction de connexion à la base de données
//essaie de se connecter avec le mdp "root", si celui ne marche pas, alors se connecte avec le mdp vide
function dbConnect()
{
	try{
		$db = new PDO('mysql:host='.DB_HOSTNAME.'; dbname='.DB_DATABASE.'; charset=utf8', DB_USERNAME, DB_PASSWORD);
		return $db;
	}
	catch(Exception $e)
	{
		try{
			$db = new PDO('mysql:host='.DB_HOSTNAME.'; dbname='.DB_DATABASE.'; charset=utf8', DB_USERNAME, "");
			return $db;
		}
		catch(Exception $e){
			die('Erreur : '.$e->getMessage());
		}
	}
}


