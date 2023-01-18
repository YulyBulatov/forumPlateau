<?php
$messages = $result["data"]['messages'];
$titre = $messages->current()->getTitreSujet();

if($messages->current()->getIdSujet()){
    $id_sujet = $messages->current()->getIdSujet();
}
    
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
?>
<form action="index.php?ctrl=forum&action=sendNewMessage" method="post">
    <label>Votre message:
        <textarea name="texte"></textarea>
    </label> 
     <input type="hidden" name="sujet_id" value="<?=$id_sujet?>">
     <input type="hidden" name="utilisateur_id" value="<?=$_SESSION['user']->getId()?>">
     <input type="submit" name="submit" value = "Envoyer">

</form>
