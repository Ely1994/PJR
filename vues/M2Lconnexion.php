<?php
session_start();
if(isset($_POST['ps']) && isset($_POST['mp'])) {
    $_SESSION['pseudo'] = $_POST['ps'];
    $_SESSION['code'] = $_POST['mp'];
} else { 
    
}

include_once("../dataacces/M2Lformation.lib.php");

if(isset($_COOKIE['darkcookie'])==TRUE) {
    setcookie('darkcookie', ($_COOKIE['darkcookie']+1));
} else {
    setcookie('darkcookie', 1);
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
            
        </section>
        <?php include 'M2Lfooter.inc.php'; ?>
    </div>
</body>
</html>
<?php ?>