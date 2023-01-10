<?php
var_dump($result);
$topics = $result["data"]['sujets'];

    
?>

<h1>liste topics</h1>

<?php
foreach($topics as $topic ){

    var_dump($topic);

    $id_sujet = $topic->getId();

    ?>
    <p><a href="index.php?ctrl=forum&action=messagesDuSujet&id=<?=$id_sujet?>"><?=$topic->getTitre()?></a></p>
    <?php
}


  
