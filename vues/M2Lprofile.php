<?php
// Session start
session_start();
// include
include_once "../dataacces/M2Lformation.lib.php";
// appel redirection
if(!isset($_SESSION['pseudo']) && !isset($_SESSION['code'])) {
    redirection('http://localhost/pjr/vues/M2Lconnexion.php');
}
// incrementation cookie (LIGHT)
if(isset($_COOKIE['holycookie'])==TRUE) {
    setcookie('holycookie', ($_COOKIE['holycookie']+1), time()+3600*24*365);
} else {
    setcookie('holycookie', 1, time()+3600*24*365);
} // Fin du programme bienveillant light cookie
?>

<?xml version="1.0" encoding="ISO-8859-1"?>
<!DOCTYPEhtml>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../style/M2Lstyle.css" />
    <script type="text/javascript" src="../javascript/lib.js"></script>    
    <title>M2L - Profil</title>
</head>
<body>
    <div id="conteneur">
        <?php include'M2Lbandeau.inc.php'; ?>
        <?php include'M2Lliens.inc.php'; ?>
        <section>
            <h2>Bienvenue sur ta page de profil <?php echo $_SESSION['pseudo']; ?>.</h2>
        </section>
        <section>
            <p>Tu en as marre de tes cookies ? clique 
            <input type="button" value="ici" onclick="alerte()">
             pour donner tout tes cookies à Darth Jar Jar Binks.</p>
        </section>
        <?php include 'M2Lfooter.inc.php'; ?>
    </div>
</body>
</html>
<?php ?>