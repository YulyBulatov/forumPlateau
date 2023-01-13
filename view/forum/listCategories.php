<?php

$categories = $result["data"]['categories'];


?>

<h1>Liste de catégories</h1>

<?php

foreach($categories as $categorie){
    
    $id_categorie = $categorie->getId();
    ?>
    <p><a href="index.php?ctrl=forum&action=sujetsDeCategorie&id=<?=$id_categorie?>"><?= $categorie->getTitre()?></a></p>
    <?php
}
if(App\Session::isAdmin()){?>

<form action="index.php?ctrl=forum&action=creerNouvelleCategorie" method="post">

    <label>Titre de la Catégorie
           <input type="text" name="titre" maxlength="100">
    </label>
    <input type="submit" name="submit" value="Créer">

</form>
<?php }?>