<?php

$users = $result["data"]["users"];

?>

<table>
    <th>Email</th>
    <th>Pseudonyme</th>
    <th>Date d'inscription</th>
    <th>Role</th>
    <th>Banni</th>
    <?php
foreach($users as $user){
    echo "<tr>";
    echo "<td>".$user->getEmail()."</td>",
         "<td><a href=index.php?ctrl=security&action=viewProfile&id=".$user->getId().">".$user->getPseudonyme()."</a></td>",
         "<td>".$user->getInscription()."</td>",
         "<td>".$user->getRole()."</td>";

         if($user->getBanni() == 0){

            echo "<td>NON</td>";
         }

         else{

            echo "<td>OUI</td>";
         }
    echo "</tr>";
}?>
</table>
