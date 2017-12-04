<?php
include_once("../dataacces/M2Lformation.lib.php");
// include_once("../javascript/formations.js");

setcookie('moncookie', 8);

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
        <?php // descriptionFormationsCompletes(); ?>
        <?php descriptionFormationsPartielles(); ?>
        <?php // descriptionOneFormationComplete(2); ?>
        <section>
            <h2>Crois-tu aux cookies du côté obscur ?</h2>
            <?php if(isset($_COOKIE['moncookie'])==TRUE) {
                echo "Le cookie existe".$_COOKIE['moncookie'];
            } else {
                echo "oh non pas de cookie";
            }  ?>
        </section>
    </div>
</body>
</html>
<?php ?>