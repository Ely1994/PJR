<?php
// Session start
session_start();
// include
include_once "../dataacces/M2Lformation.lib.php";
// appel redirection
if(!isset($_SESSION['pseudo']) && !isset($_SESSION['code'])) {
    redirection('http://localhost/pjr/vues/M2Lconnexion.php');
}
// incrémentation cookie (DARK)
if(isset($_COOKIE['darkcookie'])==TRUE) { // On s'occupe du dark cookie
    setcookie('darkcookie', ($_COOKIE['darkcookie']+1), time()+3600*24*365);
} else {
    setcookie('darkcookie', 1, time()+3600*24*365);
} // Fin du programme malveillant dark cookie
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
        
        <?php // Là on s'occupe de l'affichage des formations.
        if(!isset($_POST['checkbox'])) { // Si le mec a coché des cases, les affiches de façon complète
            if(isset($_POST['toutAfficher'])) {
                //if($_POST['toutA'] == "1") {
                    descriptionFormationsPartiellesAnciennes();
                //}
            } else {
                descriptionFormationsPartielles();
            } 
        } else { // Sinon, affiche toutes les formations de façon partielle.
            if(isset($_POST['viewold'])) {
                if($_POST['viewold'] == "1") {
                    foreach($_POST['checkbox'] as $line) {
                        descriptionOneFormationComplete($line);
                    }
                } else if ($_POST['viewold'] == "0") {
                    foreach($_POST['checkbox'] as $line) {
                        descriptionOneFormationComplete($line);
                    }
                } else {

                }
            } 
        }
        ?>
        <?php // descriptionFormationsCompletes(); ?>
        <?php //descriptionFormationsPartielles(); ?>
        <?php include 'M2Lfooter.inc.php'; ?>
    </div>
</body>
</html>
<?php ?>