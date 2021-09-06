<?php
		include_once 'glava.php'; //vključimo kodo s datoteke glava.php
		require 'povezava.php';

		if(isset($_SESSION['rang']))
		{
			$rang=$_SESSION['rang'];
		}
	?>
	
	<div id ="vs">
		<br><br>
		<form id="iskalnik" action="isci_izpis.php" method="post">
		<input class="textbox" type="text" name="isci_program" placeholder="Išči programe po sporedu">
		<input type="submit" name="sub" value="Išči">
		</form> 

		<form id="dropdown" action="izpis_kategorija.php" method="post">
		<label id="kategorija_napis" for="kategorija">Izberi kategorijo: &nbsp;</label>

		<select id="dropdown" name="kategorija">
		<option>-- vse kategorije --</option>
		<option value="film">Film</option>
		<option value="sport">Šport</option>
		<option value="otroski_programi">Otroški programi</option>
		<option value="dokumentrani_programi">Izobraževalni programi</option>
		<option value="glasba">Glasba</option>
		<option value="ostalo">Ostalo</option>
		</select> 
		<input type="submit" name="submit_kategorija" value="Išči">
		</form>
		
		<br><br>

		<h2 id="naslov_spored"> Trenutno na sporedu </h2>
		

		<div id="casovna_ureditev">
			<ul>
				<li> <a href="danes.php"><button class="button"><span>Danes</span></button></a> </li>
				<li> <a href="jutri.php"><button class="button"><span>Jutri</span></button></a> </li>
				<li> <a href="pojutrisnjem.php"><button class="button"><span>Pojutrišnjem</span></button></a> </li>
			</ul>
		</div>

		<?php
            //preverimo če se je kaj poslalo s obrazca za iskanje v textbox-u
            if(isset($_POST['sub']))
            {
                $rezultat=$_POST['isci_program'];
                echo '<p class="iskanje_kategorija_napis"> Rezultati iskanja za '.$rezultat.': </p>';
                $sql = "SELECT tp.id AS id, tp.ime AS ime_programa, o.cas_predvajanja AS cas_predvajanja, o.ime AS oddaja_ime, o.datum_predvajanja AS datum_predvajanja, o.id AS oddaja_id
                FROM tv_programi tp INNER JOIN oddaje o ON tp.oddaja_id=o.id
                WHERE (DAY(CURRENT_TIMESTAMP)) <= (DAY(datum_predvajanja)) AND (tp.ime LIKE '$rezultat')
                ORDER BY cas_predvajanja ASC
                LIMIT 5";
            }
            else
            {
                $sql = "SELECT tp.id AS id, tp.ime AS ime_programa, o.cas_predvajanja AS cas_predvajanja, o.ime AS oddaja_ime, o.datum_predvajanja AS datum_predvajanja, o.id AS oddaja_id
                FROM tv_programi tp INNER JOIN oddaje o ON tp.oddaja_id=o.id
                WHERE (DAY(CURRENT_TIMESTAMP)) = (DAY(datum_predvajanja))
                ORDER BY cas_predvajanja ASC
                LIMIT 5";
            }

			//sprožimo poizvedbo
			$result=mysqli_query($link, $sql);
			
			//uporaba rezultatov poizvedbe
			echo '<table class="tabela_sporeda"> <tr><td>Ime programa</td> <td>Ura</td> <td>Oddaja</td>'; //tu naredimo tabelo, ustvarimo prvo vrstico tabele
			
			while($row = mysqli_fetch_array($result)) //v oklepaje damo ustrezno spremenljivko, ki smo jo prej omenili, v $row se nam shranijo podatki
			{
					if(isset($_SESSION['rang']) && ($rang==1)) //preverimo če je oseba prijavljena kot admin, torej je rang 1
					{
						//napolnimo tabelo s podatki
							echo '<tr>'
						.'<td>'.$row['ime_programa'].'</td>'
						.'<td>'.$row['cas_predvajanja'].'</td>'
						.'<td>'.$row['oddaja_ime'].'</td>' 		
						.'<td>'.'<a href="izbris.php?ajdi='.$row['id'].'"> Briši </a></td>'//z ? pošljemo neke podatke.
						.'<td>'.'<a href="update.php?ajdi='.$row['id'].'"> Posodobi </a></td>'
						.'<td>'.'<a href="dodaj_seznam.php?ajdi='.$row['oddaja_id'].'"> Dodaj na seznam priljubljenih </a></td>'
						.'</tr>';	
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
						.'<td>'.$row['oddaja_ime'].'</td>' 		//prosotor za oddajo
						//.'<td>'.'<a href="dodaj_seznam.php?ajdi='.$row['oddaja_id'].'"> Dodaj na seznam priljubljenih </a></td>'
						.'</tr>';	
					}
			}
			echo '</table>';
		?>

		<br>
		<a id="vec_sporedov" href="cel_spored.php"><button>Več TV sporedov</button></a>
		<?php
			if(isset($_SESSION['rang']) && ($rang==1))
			{
				echo '<a id="vec_sporedov" href="vnos.php"><button>Dodaj program ali oddajo</button></a>';
			}
		?>

		<br><br>
	</div>
	
	<?php
		require 'noga.php'; //vključimo kodo s datoteke noga.php
	?>