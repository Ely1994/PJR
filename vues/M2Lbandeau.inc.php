

<div id="bandeau">
    <div id="miseEnPage">
        <div class="mep">
            <img id="logo" src="../image/445.jpg" alt="logo" width="200px">
        </div>
        <div class="mep">
            <h1>Le titre du bandeau</h1>
            <p>Un petit paragraphe pour la route</p>
        </div>
        <div class="mep">
            <?php
            if(isset($_SESSION['pseudo']) || isset($_SESSION['mdp'])) {
                echo "Salut ".$_SESSION['pseudo'].".\nComment vas-tu ?";
            } else {
            ?>
                <p>Connectez-vous :</p>
                <form method="post" action="M2Laccueil.php">
                    <label for="pseudo">Pseudo : </label><input type="text" id="ps" name="ps" size="25" placeholder="Pseudo..." maxlength="30" />
			    	<br><label for="code">Mot de passe : </label><input type="password" id="mp" name="mp" size="25" maxlength="25" />
		    		<br><input type="submit" name="envoyer" value=" CONNEXION ">   
                </form>
            <?php
            }
            ?>
        </div>
    </div>
    
</div>