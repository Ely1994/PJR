

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
            if(isset($_SESSION['pseudo']) && (isset($_SESSION['code']))) {
            ?>
                <a href="M2Ldeconnexion.php"><input type="button" value="Déconnexion"></a> 
            <?php
            } else {

            }
            ?>
        </div>
    </div>
    
</div>