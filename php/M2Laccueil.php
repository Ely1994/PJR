<?php
include_once("M2Lconnexion.lib.php");
include_once("../javascript/formations.js");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="../css/M2Lstyle.css" />
	<title>M2L - Accueil</title>
</head>
<body>
    <div id="conteneur">
        <?php include'M2Lbandeau.inc.php'; ?>
        <?php include'M2Lliens.inc.php'; ?>
        <!-- <form> -->
        <?php // descriptionFormationsCompletes(); ?>
        <?php descriptionFormationsPartielles(); ?>
        <?php // descriptionOneFormationComplete(2); ?>
    </div>
</body>
</html>

<?php 

?>