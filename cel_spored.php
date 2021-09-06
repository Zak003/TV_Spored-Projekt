<?php
		include_once 'glava.php'; //vključimo kodo s datoteke glava.php
        require 'povezava.php';

		//preverimo če dobimo rang s tabele uporabniki
		if(isset($_SESSION['rang']))
		{
			$rang=$_SESSION['rang'];	//rang shranimo v spremenljivko
		}
	?>

<!--skripta za printanje tv sporeda -->
<script>
function printDiv(divName)
{
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}
</script>

	<div id ="vs"> 
    <br><br>
    <h2 id="naslov_spored"> Celoten TV spored </h2>

    <div id="casovna_ureditev">
			<ul>
				<li> <a href="danes.php"><button class="button"><span>Danes</span></button></a> </li>
				<li> <a href="jutri.php"><button class="button"><span>Jutri</span></button></a> </li>
				<li> <a href="pojutrisnjem.php"><button class="button"><span>Pojutrišnjem</span></button></a> </li>
			</ul>
		</div>

    <div><button id="gumb_za_print" onClick="printDiv('vs')">Natisni tv spored</button></div>

        <?php
			//zapis SQL stavka 
			$sql="SELECT tp.id AS id, tp.ime AS ime_programa, o.cas_predvajanja AS cas_predvajanja, o.ime AS oddaja_ime, o.datum_predvajanja AS datum_predvajanja_oddaje, o.id AS oddaja_id
			FROM tv_programi tp INNER JOIN oddaje o ON tp.oddaja_id=o.id
			ORDER BY datum_predvajanja_oddaje ASC";

			
			//sprožimo poizvedbo
			$result=mysqli_query($link, $sql);
			
			//uporaba rezultatov poizvedbe
			echo '<table class="tabela_sporeda"> <tr><td>Ime programa</td> <td>Ura</td> <td>Datum predvajanja</td> <td>Oddaja</td>'; //tu naredimo tabelo, ustvarimo prvo vrstico tabele
			
			while($row = mysqli_fetch_array($result)) //v oklepaje damo ustrezno spremenljivko, ki smo jo prej omenili, v $row se nam shranijo podatki
			{
					$date = strtotime($row['datum_predvajanja_oddaje']); //datum oddaje shranimo v spremenljivko

					if(isset($_SESSION['rang']) && ($rang==1)) //preverimo če je oseba prijavljena kot admin, torej je rang 1
					{
						//napolnimo tabelo s podatki
							echo '<tr>'
						.'<td>'.$row['ime_programa'].'</td>'
						.'<td>'.$row['cas_predvajanja'].'</td>'
						.'<td>'.date('d/m/y', $date).'</td>' //kličemo spremenljvko v katero smo shranili datum oddaje
						.'<td>'.$row['oddaja_ime'].'</td>' 
						.'<td>'.'<a href="izbris.php?ajdi='.$row['id'].'"> Briši </a></td>'//z ? pošljemo neke podatke.
						.'<td>'.'<a href="update.php?ajdi='.$row['id'].'"> Posodobi </a></td>'
						.'<td>'.'<a href="dodaj_seznam.php?ajdi='.$row['oddaja_id'].'"> Dodaj na seznam priljubljenih </a></td>'
						.'</tr>';	//napolnimo tabelo s podatki
					}
					else if(isset($_SESSION['imeu']))
					{
						//napolnimo tabelo s podatki
						echo '<tr>'
						.'<td>'.$row['ime_programa'].'</td>'
						.'<td>'.$row['cas_predvajanja'].'</td>'
						.'<td>'.$row['oddaja_ime'].'</td>' 		//prosotor za oddajo
						.'<td>'.'<a href="dodaj_seznam.php?ajdi='.$row['oddaja_id'].'"> Dodaj na seznam priljubljenih </a></td>'
						.'</tr>';	
					}
					else	//če rang ni 1 imamo samo možnost pogleda sporeda
					{
						//napolnimo tabelo s podatki
							echo '<tr>'
						.'<td>'.$row['ime_programa'].'</td>'
						.'<td>'.$row['cas_predvajanja'].'</td>'
						.'<td>'.date('d/m/y', $date).'</td>' //kličemo spremenljvko v katero smo shranili datum oddaje
						.'<td>'.$row['oddaja_ime'].'</td>' 
						//.'<td>'.'<a href="dodaj_seznam.php?ajdi='.$row['id'].'"> Dodaj na seznam priljubljenih </a></td>'
						.'</tr>';
					}
			}
			echo '</table>';
		?>
        <br><br>

		<?php
			//spet preverimo če ima uporabnik ustrezen rang za adimina
			/*if(isset($_SESSION['rang']) && ($rang==1))
			{
				echo '<a id="vec_sporedov" href="vnos.php"><button>Dodaj program ali oddajo</button></a>';
			}*/
		?>

		<br><br>

	</div>
	
	<?php
		require 'noga.php'; //vključimo kodo s datoteke noga.php
	?>