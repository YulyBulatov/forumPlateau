<?php

$topics = $result["data"]['sujets'];
$categorie_id = $topics->current()->getCategorie()->getId();

    
?>

<h1>liste topics</h1>

<?php
foreach($topics as $topic ){


    $id_sujet = $topic->getId();

    ?>
    <p><a href="index.php?ctrl=forum&action=messagesDuSujet&id=<?=$id_sujet?>"><?=$topic->getTitre()?></a></p>
    <?php
}?>

<script src="public/myScript.js"></script>

<!-- A button to open the popup form -->
<button class="open-button" onclick="openForm()">Créer un nouveau sujet</button>

<!-- The form -->
<div class="form-popup" id="myForm">
  <form action="index.php?ctrl=forum&action=addNouveauSujet" method="post" class="form-container">
    <h1>Nouveau sujet</h1>

    <label for="titre"><b>Titre du sujet</b></label>
    <input type="text" placeholder="Entrer titre du sujet" name="titre" required>

    <label for="texte"><b>Premier message</b></label>
    <textarea name="texte" required></textarea>

    <input type="hidden" name="utilisateur_id" value="<?=$_SESSION['user']->getId()?>">
    
    <input type="hidden" name="categorie_id" value="<?=$categorie_id?>">

    <button type="submit" name="submit" class="btn">Créer</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>


  
