<?php

/*Questa funzione cerca l'id dell'attore con cognome $lastname e con nome che comincia con $firstname, che risulti recitare in più film. */
function show_id($db,$firstname,$lastname){
    $firstname=$db->quote($firstname  .  "%");
    $lastname =$db->quote($lastname);
    $subquery ="SELECT actor_id, count(*) as howManyMovies
                FROM roles
                WHERE actor_id in 
                                (SELECT id 
                                 FROM actors
                                 WHERE first_name LIKE $firstname
                                 and last_name = $lastname)
                GROUP BY actor_id";
    $films =$db->query("SELECT actor_id
                        FROM ($subquery) as sub1
                        WHERE howManyMovies = 
                                             (SELECT MAX(howManyMovies)
                                              FROM ($subquery) as sub2)");
    $row =$films->fetch();
    return $row[0];
}
?>
<?php
/*Questa funzione crea una tabella con i risultati della query di ricerca */
function show_films($films){
?>
<table>
<tr>
    <th>#</th>
    <th>Title</th>
    <th>Year</th>
</tr>
<?php
    foreach($films as $row){
?>
<tr>
    <td><?= $row[0] ?></td>
    <td><?= $row[1] ?></td>
    <td><?= $row[2] ?></td>
</tr>
<?php
    }
?>
</table>
<?php
}
?>
