<?php
var_dump($result);
var_dump($result["data"]['topics']);
$topics = $result["data"]['topics'];
    
?>

<h1>liste topics</h1>

<?php
foreach($topics as $topic ){

    ?>
    <p><?=$topic->getTitre();
    var_dump($topic)?></p>
    <?php
}


  
