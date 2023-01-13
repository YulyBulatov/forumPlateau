<?php
$messages = $result["data"]['messages'];
$titre = $messages->current()->getTitreSujet();

    
?>

<h1><?=$titre?></h1>

<?php
foreach($messages as $message ){
    ?><fieldset>
    <p><?=$message->getTexte()?></p>
    <p><?=$message->getPseudonymeUtilisateur()?></p>
    <p><?=$message->getEcriture()?></p>
    </fieldset>
    <?php
    
}
