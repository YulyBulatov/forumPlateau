<?php
if(isset($result["data"]['sujets'])){
  $topics = $result["data"]['sujets'];
  $titre_categorie = $topics->current()->getCategorie();
  $categorie_id = $topics->current()->getCategorie()->getId();
}
elseif($result["data"]['categorie']){
  $categorie = $result["data"]['categorie'];
  $categorie_id = $categorie->getId();
  $titre_categorie = $categorie;
}
    
?>

<h1><?=$titre_categorie?></h1>

<?php
  if(isset($topics)){
    foreach($topics as $topic ){


        $id_sujet = $topic->getId();

        ?>
        <p><a href="index.php?ctrl=forum&action=messagesDuSujet&id=<?=$id_sujet?>"><?=$topic->getTitre()?></a></p>
        <?php
}}?>

  <form action="index.php?ctrl=forum&action=addNouveauSujet" method="post" class="form-container">
    <h1>Nouveau sujet</h1>

    <label for="titre"><b>Titre du sujet</b></label>
    <input type="text" placeholder="Entrer titre du sujet" name="titre" required>

    <label for="texte"><b>Premier message</b></label>
    <textarea name="texte" required></textarea>

    <input type="hidden" name="utilisateur_id" value="<?=$_SESSION['user']->getId()?>">
    
    <input type="hidden" name="categorie_id" value="<?=$categorie_id?>">

    <button type="submit" name="submit" class="btn">Créer</button>

  </form>


  
