<?php
include_once("../dataacces/M2Lformation.lib.php");
// include_once("../javascript/formations.js");

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
            <?php
            $tabl = M2LreqPrep(3,"cours de Basket");
            //print_r($tabl);
            foreach($tabl as $line) {

                echo $line['id']."nvjzeovnejzk".$line['nom'];
            }
            // cours, fonctions de hashages
            ?> <br> <?php 
            $hash = md5("toto");
            echo $hash; 
            ?> <br> <?php
            
            $hash2 = password_hash("toto", 1);
            echo password_verify("toto",$hash2);
            ?>
            
        </section>
    </div>
</body>
</html>
<?php ?>