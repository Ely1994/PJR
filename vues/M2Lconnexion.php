<?php
// Session start
session_start();
// include
include_once("../dataacces/M2Lformation.lib.php");
// gestion de la connexion
if(isset($_POST['pseud']) && isset($_POST['cod'])) {
    $_SESSION['pseudo'] = $_POST['pseud'];
    $_SESSION['code'] = $_POST['cod'];
    $_POST['pseud'] = null;
    $_POST['cod'] = null;
}
// incrémentation cookie (DARK)
if(isset($_COOKIE['darkcookie'])==TRUE) { // On s'occupe du dark cookie
    setcookie('darkcookie', ($_COOKIE['darkcookie']+1));
} else {
    setcookie('darkcookie', 1);
} // Fin du programme malveillant dark cookie
?>

<?xml version="1.0" encoding="ISO-8859-1"?>
<!DOCTYPEhtml>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../style/M2Lstyle.css" />
    <script type="text/javascript" src="../javascript/lib.js"></script>    
    <title>M2L - Page de connexion</title>
</head>
<body>
    <div id="conteneur">
        <?php include'M2Lbandeau.inc.php'; ?>
        <?php include'M2Lliens.inc.php'; ?>
        <section>
        <?php
        if(isset($_SESSION['pseudo']) || isset($_SESSION['code'])) { // SI connecté
            ?>
            <p>Salut mon ami <?php echo $_SESSION['pseudo']; ?>, ton code est : <?php echo $_SESSION['code']; ?></p>
            <?php           
        } else { // SI pas connecté
        ?>
            <label>Connectez-vous :</label>
            <form method="post" action="M2Lconnexion.php">
                <label for="pseud">Pseudo : </label><input type="text" id="pseud" name="pseud" size="25" placeholder="Pseudo..." maxlength="30" />
		    	<br><label for="cod">Mot de passe : </label><input type="password" id="cod" name="cod" size="25" maxlength="25" />
                <br><input type="submit" name="envoyer" value=" CONNEXION ">   
            </form>
        <?php
        }
        ?>
        </section>
        <?php include 'M2Lfooter.inc.php'; ?>
    </div>
</body>
</html>
<?php ?>