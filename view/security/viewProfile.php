<?php

$user = $result["data"]['profile'];

if($result["data"]['nbre_messages'] != false){

    $nbre_messages = $result["data"]['nbre_messages']['nbre_messages'];
}

else{

    $nbre_messages = 0;
}

?>

<h1><?=$user?></h1>

<table>
    <th>Email</th>
    <th>Date d'inscription</th>
    <th>Role</th>
    <th>Banni</th>
    <th>Nombre de messages</th>
        <tr>
            <td><?=$user->getEmail()?></td>
            <td><?=$user->getInscription()?></td>
            <td><?=$user->getRole()?></td>
<?php
         if($user->getBanni() == 0){

            echo "<td>NON</td>";
         }

         else{

            echo "<td>OUI</td>";
         }
?>
            <td><?=$nbre_messages?></td>
        </tr>
</table>

<?php
    if(App\Session::isAdmin()){
    ?>
        <a href="index.php?ctrl=security&action=bannir&id=<?=$user->getId()?>">Bannir/Amnistier</a>
                          
<?php
    }
?>

