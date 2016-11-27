<?php include("top.html"); ?>

<?php
$userName= $_GET["name"];
$infoUsers = file("singles.txt");
$usersNumber = count($infoUsers);
$infoUser = NULL;
$userRow = 0;
foreach ($infoUsers as $line) {
    $userRow++;
    list($searchName)=explode(",", $line);
        if (strcmp($searchName,$userName)==0) {            
            $infoUser = $line;            
            break;
        }        
}
if(!isset($infoUser)){
    ?><h1>ERRORE: Nome utente inserito non valido</h1>
    <?php
    exit();
}
list(,$userGender,$userAge,$userPType,$userFavoriteOS,$userMinAge,$userMaxAge)=explode(",", $infoUser);

for($i=0;$i<$usersNumber;$i++){
    list($name,$gender,$age,$pType,$favoriteOS,$minAge,$maxAge)=explode(",", $infoUsers[$i]);
    if(($gender!=$userGender)&&($age>=$userMinAge)&&($age<=$userMaxAge)&&($favoriteOS==$userFavoriteOS)){ 
        for($c=0;$c<4;$c++){
            if(strcmp($pType[$c],$userPType[$c])==0){
                $c=4; //trovato almeno un carattere nella stessa posizione
            }
        }
        if($c==4)unset($infoUsers[$i]);
    }
    else{
        unset($infoUsers[$i]); // remove item at index 0        
    }
}   
$infoUsers = array_values($infoUsers); // 'reindex' array
?>


<h1>Matches for <?= $userName ?></h1>

<div class="match">
    <?php
    for($i=0;$i<count($infoUsers);$i++){
        list($name,$gender,$age,$pType,$favoriteOS,$minAge,$maxAge)=explode(",", $infoUsers[$i])
    ?>
    <p><img src="http://www.cs.washington.edu/education/courses/cse190m/12sp/homework/4/user.jpg"/> <?=$name?></p>    
    <ul>
        <li><strong>gender:</strong><?=$gender?></li>
        <li><strong>age:</strong><?=$age?></li>
        <li><strong>type:</strong><?=$pType?></li>
        <li><strong>os:</strong><?=$favoriteOS?></li>
    </ul>
    <hr>
    <?php 
    } ?>
</div>

<?php include("bottom.html"); ?>

