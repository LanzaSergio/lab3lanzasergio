<!DOCTYPE html>
<!--
Autore: Sergio Lanza

-->
<html>
	<head>
		<title>TMNT - Rancid Tomatoes</title>
                <link href="http://courses.cs.washington.edu/courses/cse190m/11sp/homework/2/rotten.gif" type="image/gif" rel="icon">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link href="movie.css" type="text/css" rel="stylesheet">
	</head>
	  <body>
			<form method="GET">
				<input type="text" name="Nome">
				<input type="submit">
			</form>
		<?php
#Ho creato un form, poichè non sono riuscito a implementare il codice come richesto dal testo
			$Film= $_GET['Nome'];
			list($Nome,$Data,$Rating)=file("$Film/info.txt");
			$Locandina="$Film/overview.png";
			?>

          	<div id = "banner">
				<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/banner.png" alt="Rancid Tomatoes">
            </div>

						<h1><?= $Nome; ?> (<?= $Data ?>)</h1>
				<div id = "main"> <!-- il div "main" e' stato aggiunto per contenere
											sia la componente sinistra e destra del layout -->
					<div id = "right">
						<div>
							<img src=<?=$Locandina ?> alt="general overview">
						</div>
							<dl>
								<?php
								#Separto dal testo overview il titolo e il testo vero e prorio,
								#seprato a livello HTML dai tag dt e dd
								foreach (	file("$Film/overview.txt")  as $Overv) {
									list($Dt,$Dd)=explode(":",$Overv);


										?>
										<dt><?= $Dt ?></dt>

										<dd><?= $Dd ?> </dd>
							<?php
								}
							?>


							</dl>
					</div><!--Chiusura right -->
					<div id=left>
						<div id ="left-top">
									<?php
									#In base a livello del RATING si inserisce un immagine rispetto ad un altra 
										if($Rating>60){
													$imm="freshbig";
												}
												else{
													$imm="rottenbig";
												}

									?>
									<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/<?=$imm?>.png" alt=<?=$imm ?>>
									<span class="evaluation"><?=$Rating ?>%</span>
							</div>
							<div id="columns">
								<?php
												$count=0;
												$folder = $Film;
											$poems=glob("$folder/review*.txt");
												foreach ($poems as $filename) {
													$count++;
												?>
												<?php
												}
												if($count%2==0){


													$CommSinistra=$count/2;
												}
												else{
													if($count==1){

														$CommSinistra=1;
													}
													else{

														$CommSinistra=(($count+1)/2);

													}
												}
										?>


									<div id="leftcolumn">
							<?php


														for($i=1;$i<=$CommSinistra;$i++){
															if($count>10 and $i<10){
																list($Testo,$Immag,$Auotore,$Info)=	file("$Film/review0$i.txt")  ;
															}
															else{
																list($Testo,$Immag,$Auotore,$Info)=	file("$Film/review$i.txt")  ;
															}
															$Immag=strtolower($Immag);

																?>
																<p class="quotes">
																	<span >
																		<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/<?=$Immag?>.gif" alt=<?=$Immag?>>
																		<q><?=$Testo?></q>
																	</span>
																	</p>
															<p class="reviewers">
																<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic">
																	<?=$Auotore?> <br>
																						<span class="publications"><?=$Info?></span>
															</p>
														<?php } ?>
														</div><!-- Chiusura rightcolumn  -->
											  <div id = "rightcolumn">
													<?php
																				for($i=$CommSinistra+1;$i<=$count;$i++){
																					if($count>10 and $i<10){
																						list($Testo,$Immag,$Auotore,$Info)=	file("$Film/review0$i.txt")  ;
																					}
																					else{
																						list($Testo,$Immag,$Auotore,$Info)=	file("$Film/review$i.txt")  ;
																					}
																					$Immag=strtolower($Immag);
																						?>
																						<p class="quotes">
																							<span >
																								<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/<?=$Immag?>.gif" alt=<?=$Immag?>>
																								<q><?=$Testo?></q>
																							</span>
																							</p>
																					<p class="reviewers">
																						<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic">
																							<?=$Auotore?> <br>
																												<span class="publications"><?=$Info?></span>
																					</p>
																				<?php } ?>



							</div> <!-- Chiusura leftcolumn -->
						</div> <!-- Chiusura columns -->
					</div><!--Chiusura left -->
					<p id="bottom">(1-<?= $count?>)</p>
			</div><!--Chiusura main -->
			<div id="validators">
				<a href="http://validator.w3.org/check/referer">
       <img src="http://webster.cs.washington.edu/w3c-html.png" alt="Validate"></a> 			<br>
				<a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!"></a>
			</div> <!-- chiusura div "validators" -->


			</body>
</html>
