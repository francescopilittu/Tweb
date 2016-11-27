<?php include("top.html"); ?>


<strong>Thank you!</strong>
<p>Welcome to NerdLuv <?= $_POST["name"]?>!</p>
<p>Now <a href="matches.php">log in to see your matches!</a></p>
<?php 

$arrInfo = array($_POST["name"],$_POST["gender"],$_POST["age"],$_POST["pType"],$_POST["favoriteOS"],$_POST["minAge"],$_POST["maxAge"]);


file_put_contents("singles.txt", implode(",", $arrInfo)."\n", FILE_APPEND)
?>

<?php include("bottom.html"); ?>

