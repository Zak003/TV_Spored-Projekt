<?php include_once 'seja.php'; ?>
<!DOCTYPE html>
<html>
  <head>
   <title> TV Spored </title>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="zgled.css">

  </head>

  <body>
	<?php
		
	?>
    <div id="leva_slika">
        <img src="slike/stranska-slika.jpg">
    </div>

	<div id="main">
	
	<div id="gl">

        <a href="index.php"><img id="logo" src="slike/tv-spored.png"></a>
        <?php
        if(isset($_SESSION['imeu']))
        {
            echo '<a href="seznam_priljubljenih.php"><button class="seznam_button"><span>Seznam priljubljenih oddaj</span></button></a>';
        }
        ?>

        <p id="napis_prijavljeni"> 
            <?php 
                if(isset($_SESSION['imeu']))
                {
                    $iu=$_SESSION['imeu'];  //tukaj dobimo ime uporabnika
                    $pu=$_SESSION['priu'];  //tukaj dobimo priimek uporabnika 
                    echo "Prijavljeni ste kot: ".$iu." ".$pu." "; 
                }
            ?>
        </p>

        <ul>
        <li>
            <a href="index.php"><button class="button"><span>Domov</span></button></a>
        </li>

        <li>
            <a href="cel_spored.php"><button class="button"><span>Tv spored</span></button></a>
        </li>

        <li>
            <a href="kontakt.php"><button class="button"><span>Kontakt</span></button></a>
        </li>    

        <?php 
        //preverimo če dobimo podatke s prijave, torej če je uporabnik prijavljen
		if(isset($_SESSION['imeu']))
		{
			echo '<a href="odjava.php"><button class="button"><span>Odjava</span></button></a>';
		}
		else
		{
			echo '<a href="prijava.php"><button class="button"><span>Prijava</span></button></a>';
		}
		?>
        </ul>

	</div>