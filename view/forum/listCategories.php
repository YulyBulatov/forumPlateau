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