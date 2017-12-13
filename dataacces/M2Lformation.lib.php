<?php
include_once("M2Lconnexion.lib.php");

function descriptionFormationsPartielles() { // FONCTION : afichage partiel de "formation" OUTDATED
    $tab = M2LgetTableformation();
    $num = 0;
    foreach($tab as $line) { 
        // $num = $line['id']; echo "ecris".$num."()"; ?>
        <section> <h2>Formation : 
        <?php //echo $line['id']; ?>
        <!-- de -->
        <?php echo $line['nom']; ?>
        </h2><p>
        <?php echo $line['description']; ?>
        </p>
        <input type="button" value=" details " onclick="descriptionOneFormationComplete(<?php echo $line['id']; ?>)" /><br/>
        
        </section>
        <?php
    }
}
function descriptionFormationsCompletes() { // FONCTION : affichage complet de "formation"
    $tab = M2LgetTableformation();
    foreach($tab as $line) { 
        ?>
        <section><p>Formation n°
        <?php echo $line['id']; ?>
         : <strong>
        <?php echo $line['nom']; ?>
        </strong> - 
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
        <section><p>Formation : <strong>
        <?php echo $line['nom']; ?>
        </strong> - 
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

function descMain($requete) {
    $dbh = connexion();
    $values = $dbh->query($requete);
    $tableau = $values->fetchAll();
    ?>
    <section>
        <form action="M2Laccueil.php" method="post">
        <p><label>Clique ici </label>
        <input type="submit" name="envoyer" value="Voir les Détails">
        <label> pour voir les détails des formations que tu as coché.</label></p>
        <p><label>Si tu veux voir toutes les formations même celles qui sont déjà finies, valide_moi ça : </label>
        <select name="viewold">
            <option value="0"> </option>
            <option value="1">Je veux voir tous les anciennes formations !</option>
		</select>
        </p>
    </section>
    <?php
    foreach($tableau as $line) {
        $date = date("d-m-Y"); 
        if(strtotime($line['date']) >= strtotime($date)) {
            // echo "Valide";
            ?>
            <section><p>Formation : <strong>
            <?php echo $line['nom']; ?>
            </strong>. 
            <?php echo $line['description']; ?>
            </p>
            <label>Je veux les details : </label><input type="checkbox" name="checkbox[]" value="<?php echo $line['id']; ?>">
            <?php
               
            ?>
            </section>
            <?php
        } else {
            // echo "Date dépassée";

        }
    }
    ?> </select> </form> <?php
}

function redirection($cible) { //fonction de redirection sur une page 
    header('Location:'.$cible, false);
}

function ladate() {
    $date = date("d-m-Y");
    echo "Nous sommes le $date";
}

function lheure() {
    $heure = date("H:i");
    echo "il est $heure";
}
    
?>