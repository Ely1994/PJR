<!--
Cette page M2Ldeconnexion.php est ulilisée quand un utilisateur connecté appuie sur le bouton déconnexion,
qui se situe dans le bandeau. Cette page annule alors la valeur des variables de session (2 pour l'instant).
Donc comme ça, l'utilisateur est déconnectée.
-->
<?php
// Session start
session_start();
// include
include_once "../dataacces/M2Lformation.lib.php";
// appel redirection
if(!isset($_SESSION['pseudo']) && !isset($_SESSION['code'])) {
    redirection('http://localhost/pjr/vues/M2Lconnexion.php');
} else {
    $_SESSION['pseudo'] = null;
    $_SESSION['code'] = null;
}

?>

<?xml version="1.0" encoding="ISO-8859-1"?>
<!DOCTYPEhtml>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../style/M2Lstyle.css" />
    <script type="text/javascript" src="../javascript/lib.js"></script>    
    <title>M2L - Déconnexion</title>
</head>
<body>
    <?php
    header('Location:M2Lconnexion.php', false);
    ?>
</html>