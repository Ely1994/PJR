<?php

function connexion() { // DATAACCES : connexion à la base de données dbpjr
	$host = "localhost";
	$dbname = "dbpjr";
	$utilisateur = "root";
	$mdp = "";
	// la connexion :
	$pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $utilisateur, $mdp,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')) or die ("Prob connexion server");
	return $pdo;
}

function M2LgetTableformation() { // DATAACCES : accession à tout le contenu de formation
    $dbh = connexion();
    $sql = "SELECT id, nom, description, date, duree_jour, duree_heure, lieu, prerequis, DATE_ADD(date, INTERVAL (duree_jour - 1) DAY) as date_fin FROM formation ORDER BY id DESC;";

    $values = $dbh->query($sql);
    $value2 = $values->fetchAll();
	return $value2;
}

function connectmd5() {
    $dbh = connexion();
    $sql = "IN"
}

function M2LreqPrep($id, $nom) { // REQUETE PREPAREE pour TEST, récup id et nom
    $dbh = connexion();
    $sql = "SELECT id, nom FROM formation WHERE :id = id AND :nom = nom;";

    $stmt = $dbh->prepare($sql);

    $stmt->BindValue(':id', $id);
    $stmt->BindValue(':nom', $nom);

    $retour = $stmt->execute();

    // if($retour) {
        $retour = $stmt->fetchAll();
    // }

    $dbh = null;
    print_r($retour);
    return $retour;
}

?>