<?php
var_dump($result);
var_dump($result["data"]);
$messages = $result["data"]['messages'];

    
?>

<h1><?=$message->getTitre()?></h1>

<?php
foreach($messages as $message ){

    ?>
    <p><?=$message->getTexte()?></p>
    <p><?=$message->getPseudonyme()?></p>
    <p><?=$message->getEcriture()?></p>
    <?php
}
