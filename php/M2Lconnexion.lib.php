<?php
include_once("../dataacces/M2Lreqsql.lib.php");


function connexion() { // DATAACCES : connexion à la base de données dbpjr
	$host = "localhost";
	$dbname = "dbpjr";
	$utilisateur = "root";
	$mdp = "";
	// la connexion :
	$pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $utilisateur, $mdp) or die ("Prob connexion server");
	return $pdo;
}

function M2LgetTableformation() { // DATAACCES : accession à tout le contenu de formation
    $dbh = connexion();
    $sql = getForm1();
    $values = $dbh->query($sql);
	return $values;
}

function descriptionFormationsPartielles() { // FONCTION : afichage partiel de "formation"
    $tab = M2LgetTableformation();
    foreach($tab as $line) { 
        ?>
        <section> <h2>Formation n°
        <?php echo $line['id']; ?>
        de 
        <?php echo $line['nom']; ?>
        </h2><p>
        <?php echo $line['description']; ?>
        </p></section>
        <?php
    }
}
function descriptionFormationsCompletes() { // FONCTION : affichage complet de "formation"
    $tab = M2LgetTableformation();
    foreach($tab as $line) { 
        ?>
        <section>Détails de la <h2>Formation n°
        <?php echo $line['id']; ?>
        de 
        <?php echo $line['nom']; ?>
        </h2><p>
        <?php echo $line['description']; ?>
        <br>L'endroit de rendez-vous est :<br>
        <?php echo $line['lieu']; ?>
        <br><strong>Dates : </strong>Début de la formation le 
        <?php echo $line['date']; ?>
        et fin de la formation le 
        <?php echo $line['date_fin']; ?>
        avec pour durée totale
        <?php echo $line['duree_jour']; ?>
         jours. Il y a  
        <?php echo $line['duree_heure']; ?>
         heures de formation par jour.
        <br><strong>Prérequis : </strong>
        <?php echo $line['prerequis']; ?>
        </p></section>
        <?php
    }
}
function descriptionOneFormationComplete($i) { // FONCTION : affichage complet d'UNE ligne de "formation"
    $tab = M2LgetTableformation();
    foreach($tab as $ittm) {
        if($ittm['id'] == $i) { $line = $ittm; }
    }
    ?>
        <section>Détails de la <h2>Formation n°
        <?php echo $line['id']; ?>
        de 
        <?php echo $line['nom']; ?>
        </h2><p>
        <?php echo $line['description']; ?>
        <br>L'endroit de rendez-vous est :<br>
        <?php echo $line['lieu']; ?>
        <br><strong>Dates : </strong>Début de la formation le 
        <?php echo $line['date']; ?>
        et fin de la formation le 
        <?php echo $line['date_fin']; ?>
        avec pour durée totale
        <?php echo $line['duree_jour']; ?>
         jours. Il y a  
        <?php echo $line['duree_heure']; ?>
         heures de formation par jour.
        <br><strong>Prérequis : </strong>
        <?php echo $line['prerequis']; ?>
        </p></section>
        <?php
}

?>