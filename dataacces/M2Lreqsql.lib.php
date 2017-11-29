<?php

function getForm1() {
    return "SELECT id, nom, description, date, duree_jour, duree_heure, lieu, prerequis, DATE_ADD(date, INTERVAL (duree_jour - 1) DAY) as date_fin FROM formation ORDER BY id DESC;";
}

?>