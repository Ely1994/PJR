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
        
        <?php // - - - - - - - - - - - - - - - - - - - - - - - - - Là on s'occupe de l'affichage des formations. - - - - - - - - - - - - - - - - - - - - - - - - - 
        if(!isset($_POST['checkbox'])) { // Checkbox n'existe PAS. Rien n'est coché.
            if(isset($_POST['toutAfficher'])) { // Rien n'est coché, bouton "voir les détails" appuyé => affichage de base.
                descriptionFormationsPartiellesAnciennes();
            } elseif (isset($_POST['envoyer'])) { // Rien n'est coché, bouton "envoyer" appuyé => rien ne se passe.
                ?> <section><strong>> Vous avez cliqué sur "Voir les détails" sans cocher de cases. Vous avez été redirigé.</strong></section> <?php
                descriptionFormationsPartielles();
            } else { // Rien n'est coché, aucun bouton n'a été appuyé => affichage de base.
                descriptionFormationsPartielles();
            }
        } else { // Checkbox existe. Il y a donc des valeurs cochés sous forme de tableau, obtenues grâce à la variable $_POTS['checkbox'].
            if(isset($_POST['toutAfficher'])) {
                descriptionFormationsPartiellesAnciennes();
            } elseif(isset($_POST['envoyer'])) {
                foreach($_POST['checkbox'] as $line) {
                    descriptionOneFormationComplete($line);
                }
            } else {
                ?> <section>Si ce message s'affiche, c'est qu'il y a une possibilité qui n'a pas été envisagée.</section> <?php
            }
            /*
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
            } */
        }
        ?>
        <?php // descriptionFormationsCompletes(); ?>
        <?php //descriptionFormationsPartielles(); ?>
        <?php include 'M2Lfooter.inc.php'; ?>
    </div>
</body>
</html>
<?php ?>