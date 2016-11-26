<!-- Francesco Pilittu - Tecnologie Web - Lab03-->
<?php 
global $movie;
$movie = $_GET["film"]; 
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>TMNT - Rancid Tomatoes</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="movie.css" type="text/css" rel="stylesheet" />
		<link rel="icon" href="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif" />
	</head>
	<body>
		<div id = "banner">
			<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/banner.png" alt="Rancid Tomatoes" />
		</div>
             <?php /*codice php per salvare il file info.txt in un array e le singole righe in delle varibili. L'ultima riga non mi serve in questo caso e quindi non la seleziono  */
			$movieInfo=file("$movie/info.txt");
             list($movieTitle,$movieYear,$movieRating) =$movieInfo;
            $infoFileRows=count($movieInfo) - 1;       
             ?>                

        <h1 id ="intestazione"> <?=$movieInfo[0]?> (<?=trim($movieInfo[1])?>) </h1>       
		<div id = "film">
		<div id = "partedestra">
        <img src="<?=$movie?>/overview.png" alt="general overview"/>' 
	
			
			<?php /* codice php per salvare le informazioni del file overview.txt e contare le righe del file*/
			$movieOverview=file("$movie/overview.txt");
             list($movieStarring,$movieDirector,$movieProducer,$movieScreenwriter,$movieRating,$movieDate,$movieRuntime,$movieSynopsis,$movieCompany)=$movieOverview;
                $overviewFileRows=count($movieOverview);        ?>                
            <dl>
                    <?php /*codice php per separare le informazioni di ogni riga con il carattere ':' e per stampare queste informazioni nei tag dt e dd di Html  */
                    for($i=0; $i<$overviewFileRows;$i++){  
                        list($dt,$dd)=explode(":", $movieOverview[$i])
                    ?>
			<dt><?=$dt?></dt>
			<dd><?= $dd?></dd>
                        <?php                         
                    }
                    ?>
		   </dl>
			
			
					<ul>
						<li><a href="http://www.ninjaturtles.com/">The Official TMNT Site</a></li>
						<li><a href="http://www.rottentomatoes.com/m/teenage_mutant_ninja_turtles/">RT Review</a></li>
						<li><a href="http://www.rottentomatoes.com/">RT Home</a></li>
						<li><a href="http://www.cs.washington.edu/190m/">CSE 190 M</a></li>
					</ul>
				</dd>
			</dl>
		
		</div>

		<div id = "filmsx">

			  <?php /* codice php per salvare il file info.txt in un array e le singole righe in delle varibili. */
			$movieInfo=file("$movie/info.txt");
             list($movieTitle,$movieYear,$movieRating) =$movieInfo;
            $infoFileRows=count($movieInfo);       
             ?>  
		<div id = "testasx"> 
		    <?php /* codice php per trasformare la stringa del valore rating in un variabile intera e controllare il suo valore se > 60 stampo freshbig.png se minore di 60 stampo rottenbig.png */
		    $valrating = intval($movieRating);
		     if ($valrating < '60') 
                 $ratingimg = "rottenbig.png";
             else
             	$ratingimg = "freshbig.png";

		     	?>
		       <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/<?=$ratingimg?>" alt="Rotten" />

		       
				<?=$movieInfo[2]?>% <br> </div>
			<div id = "colonna">
			<?php /*selezioni tutti i file inizianti con review dalla cartella movie, eseguo un ciclo for da 0 fino a metà numero di review nella cartella movie e per ogni file mi salvo le singole informazioni di ogni riga  */ 
			$f = glob("$movie/review*.txt");
			for($i=0; $i<(sizeof($f)/2);$i++){  
				   $review = file("$f[$i]");
                   list($riga1,$riga2,$riga3,$riga4)= $review;
                   $riga2 = strtolower($riga2);
                    
			?>
				<p class = "box">
					<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/<?=$riga2?>.gif" alt="Rotten" />
					<q><?=$riga1?></q>
				</p>
				<p class ="name">
					<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic" />
					<?=$riga3?> <br />
					<?=$riga4?>
				</p>
				<?php } ?>
			</div>
			<div id ="colonna">
				<?php /*selezioni tutti i file inizianti con review dalla cartella movie, eseguo un ciclo for da metà + 1 numero di review fino al numero totale di file review nella cartella movie e per ogni file mi salvo le singole informazioni di ogni riga  */ 
			$f = glob("$movie/review*.txt");
			for($i = ((sizeof($f)/2) +1); $i<sizeof($f);$i++){  
				   $review = file("$f[$i]");
                   list($riga1,$riga2,$riga3,$riga4)= $review;
                   $riga2 = strtolower($riga2);
                    ?>
				<p class = "box">
					<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/<?=$riga2?>.gif" alt="Rotten" />
					<q><?=$riga1?></q>
				</p>
				<p class ="name">
					<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic" />
					<?=$riga3?> <br />
					<?=$riga4?>
				</p>
				<?php } ?>
			</div>
		</div>
			<div id ="footer"> 
				<p> <?php /* conto il numero di review*.txt presenti nella cartella */
			$f = glob("$movie/review*.txt");
			$size = sizeof($f);
			?>(1-<?=$size?> of 88)</p>
			</div>
	</div>
		<div id = "validatori">
			<a href="ttp://validator.w3.org/check/referer"><img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/w3c-xhtml.png" alt="Validate HTML" /></a> <br />
			<a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!" /></a>
		</div>
	</body>
	
</html>
