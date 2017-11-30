<?php
include_once("requetes.lib.php");


function connexion() {
	$host = "localhost";
	$dbname = "dbpjr";
	$utilisateur = "root";
	$mdp = "";
	// la connexion :
	$pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $utilisateur, $mdp) or die ("Prob connexion server");
	return $pdo;
}

function sendToDB($text) {
	$dbh = connexion(); // On met dans la variable dbh la connexion ci dessus
	$sql = requete1($_POST['message']); // requête SQL dans dataacces/requetes.php
	$insert = $dbh->exec($sql);
	if($insert === FALSE) {
		echo "Problème d'insertion de donées";
	}
}

function showFromDB() {
	$dbh = connexion(); // On met dans la variable dbh la connexion ci dessus
	$sql = requete2(); // requête SQL
	$values = $dbh->query($sql);
	return $values;
}

function connecteOupa($pseudo, $code) { // fonction utilisé our la vérification du pseudo+identifiant
	$dbh = connexion();
	$sql = requete3($pseudo, $code); // requete SQL qui renvoie la liste de personnes avec pseudo et code identique.
	$connecte = $dbh->query($sql); // $connecte renvoie le tableau associatif de la table 'personnes' avec 
	
	
	$prepare($sql);
	$stmt->BindValue(':pseudo', $pseudo);
	$stmt->BindValue(':code', $code);
	$stmt->execute();
	
	$connecte2 = $connecte->fetchAll();
	//echo count($connecte2);
	//print_r($connecte2);
	//foreach($connecte2 as $e) {
	//	echo $e['pseudo'];
	//}
	if(count($connecte2) > 0) {
		return TRUE;
	} else {
		return FALSE; }
}
?>