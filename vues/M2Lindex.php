<?php
// Session start
session_start();
// include
include_once("../dataacces/M2Lformation.lib.php");
// appel redirection
if(!isset($_SESSION['pseudo']) && !isset($_SESSION['code'])) {
    redirection('http://localhost/pjr/vues/M2Lconnexion.php');
}
// incrementation cookie (LIGHT)
if(isset($_COOKIE['holycookie'])==TRUE) {
    setcookie('holycookie', ($_COOKIE['holycookie']+1));
} else {
    setcookie('holycookie', 1);
}
?>

<?xml version="1.0" encoding="ISO-8859-1"?>
<!DOCTYPEhtml>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../style/M2Lstyle.css" />
    <script type="text/javascript" src="../javascript/lib.js"></script>    
    <title>M2L - Accueil</title>
</head>
<body>
    <div id="conteneur">
        <?php include'M2Lbandeau.inc.php'; ?>
        <?php include'M2Lliens.inc.php'; ?>  
        <section>
            <h2>Petite fonction sur les requetes préparées</h2>
            <?php
            $tabl = M2LreqPrep(3,"cours de Basket", "Cours exceptionnel de Mr. Rodriguez, visant des personnes qui connaissent déjà le sport. ");
            //print_r($tabl);
            foreach($tabl as $line) {
                echo $line['id']." - ".$line['nom'];
            }
            ?>
        </section>
        <section>
            <h2>Exercice de JF sur les nouvelles</h2>
            <?php $tab = array("Le grand méchant loup", "Pizza volante apparue au dessus de la lune", "Un oursil de mer dans mon chausson ?", "comment progresser en gold", "Nouveau mod pour factorio", "la nouvelle extention d'hearstone est nulle", "don't starve together, n'y a-t-il plus personne ?", "vega conflict, le power creep infini ?", "fortnite, la star du momment", "le come-back de world of tanks ?"); ?>
            <?php
            if(isset($_POST['nouvelle'])) {
                echo $_POST['nouvelle'];
            } else {
                foreach($tab as $line) {
                    echo $line;
                }
            }
            ?>
            <form method="post" action="M2Lindex.php">
                <label for="nouvelle">Votre nouvelle préférée : </label>
                <select id="nouv" name="nouvelle" required>
                <?php
                for($i = 4; $i < 9; $i++) {
                ?>
                    <option value="<?php echo $tab[($i+1)]; ?>"><?php echo ($i+1); ?></option>
                <?php
                }
                ?>
		        </select>
                <input type="submit" id="smbt" name="envoyer" value=" ENVOYER "/>
            </form>
        </section>
        <section>
            <h2>Exercice sur les fonctions de hashage</h2>
            <?php 
            $hash = md5("toto");
            echo $hash; 
            ?> <br> <?php
            $hash2 = password_hash("toto", 1);
            echo password_verify("toto",$hash2);
            ?>    
        </section>
        <?php include 'M2Lfooter.inc.php'; ?>
    </div>
</body>
</html>
<?php ?>