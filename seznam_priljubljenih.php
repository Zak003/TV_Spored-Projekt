<?php
		include_once 'glava.php'; //vključimo kodo s datoteke glava.php
		require 'povezava.php';
		include_once 'seja.php';
	?>
	
	<div id ="vs">
        <h2 id="naslov_prijava">Vaš seznam priljubljenih oddaj</h2><br />
		<?php
				//if(isset($_SESSION['imeu']) && isset($_SESSION['id_seznam']))
					//$idv=$_SESSION['id_seznam'];
					$uid=$_SESSION['idu'];
				
					echo '<table class="tabela_sporeda"> <tr><td>Ime programa</td> <td>Ura</td> <td>Datum predvajanja</td> <td>Oddaja</td>'; //tu naredimo tabelo, ustvarimo prvo vrstico tabele

					$sql="SELECT tp.ime AS ime_programa, o.cas_predvajanja AS cas_predvajanja, o.ime AS oddaja_ime, o.datum_predvajanja AS datum_predvajanja,o.datum_predvajanja AS datum_predvajanja_oddaje, s.id AS seznam_id
					FROM tv_programi tp INNER JOIN oddaje o ON tp.oddaja_id=o.id INNER JOIN seznami s ON o.id=s.oddaja_id INNER JOIN uporabniki u ON u.id=s.uporabnik_id
					WHERE s.uporabnik_id = $uid
					ORDER BY datum_predvajanja ASC";

					$result=mysqli_query($link, $sql);
					
					while($row = mysqli_fetch_array($result)) //v oklepaje damo ustrezno spremenljivko, ki smo jo prej omenili, v $row se nam shranijo podatki
					{
						$date = strtotime($row['datum_predvajanja_oddaje']); //datum oddaje shranimo v spremenljivko

						//napolnimo tabelo s podatki
						echo '<tr>'
							.'<td>'.$row['ime_programa'].'</td>'
							.'<td>'.$row['cas_predvajanja'].'</td>'
							.'<td>'.date('d/m/y', $date).'</td>' //kličemo spremenljvko v katero smo shranili datum oddaje
							.'<td>'.$row['oddaja_ime'].'</td>' 		
							.'<td>'.'<a href="izbris_seznama.php?izbris_ajdi='.$row['seznam_id'].'"> Izbriši s seznama </a></td>'//z ? pošljemo neke podatke.
							.'</tr>';
					}
					echo '</table>';

		?>

		<br><br>
	</div>
	
	<?php
		require 'noga.php'; //vključimo kodo s datoteke noga.php
	?>