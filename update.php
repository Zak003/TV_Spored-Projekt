<?php
		include_once 'glava.php'; //vključimo kodo s datoteke glava.php
		require 'povezava.php';

		$id=$_GET['ajdi']; //dobimo id od vrstice obrazca s katerega pošilamo podatke

		//zapišemo sql stavek
		$sql="SELECT tp.ime AS ime_programa, tp.jezik AS jezik_programa, tp.starostna_omejitev AS starostna_omejitev, tp.oddaja_id AS oddaja_id,
		o.ime AS ime_oddaje, o.dolzina AS dolzina_oddaje, o.cas_predvajanja AS cas_predvajanja, o.datum_predvajanja AS datum_predvajanja
		FROM tv_programi tp INNER JOIN oddaje o ON tp.oddaja_id=o.id
		WHERE tp.id=$id";

		//sprožimo poizvedbo
		$result=mysqli_query($link, $sql);

		$row=mysqli_fetch_array($result);

		$ime_programa= $row['ime_programa'];
		$jezik_programa = $row['jezik_programa'];
		$starostna_omejitev = $row['starostna_omejitev'];
		$oddaja_id = $row['oddaja_id'];
		$ime_oddaje = $row['ime_oddaje'];
		$dolzina_oddaje = $row['dolzina_oddaje'];
		$cas_predvajanja = $row['cas_predvajanja'];

	?>
	
	<div id ="vs">
		<h2 id="naslov_vnosa">Posodabljanje programa</h2>
		<table>
		<form action="update_baza.php" method="post">
			<tr><td><label for="ime_programa"><b id="tekst_prijava">Vnesi ime programa: </b></label></td>
			<td><input type="text" placeholder="Vnesi ime programa" value="<?php echo "$ime_programa"; ?>" name="ime_programa"></td></tr>

			<tr><td><label for="jezik"><b id="tekst_prijava">Vnesi jezik programa: </b></label></td>
			<td><input type="text" placeholder="Vnesi jezik programa" value="<?php echo "$jezik_programa"; ?>" name="jezik"></td></tr>

			<tr><td><label for="omejitev"><b id="tekst_prijava">Vnesi starostno omejitev: </b></label></td>
			<td><input type="text" placeholder="Vnesi starostno omejitev" value="<?php echo "$starostna_omejitev"; ?>" name="omejitev"></td></tr>

			<tr><td><label for="oddaja"><b id="tekst_prijava">Izberi oddajo: </b></label></td>
			<td>
			
			<?php
			require 'povezava.php';

			//zapišemo sql stavek
			$sql2="SELECT * FROM oddaje";

			//sprožimo poizvedbo
			$rezultat=mysqli_query($link,$sql2);
			?>
			<select class="" name="oddaja">

			<?php
				while ($row2=mysqli_fetch_array($rezultat)) 
				{
			?>

			<option value="<?= $row2['id'] ?>" <?php if($row2['id']==$oddaja_id){echo "selected";} ?> >
				<?=$row2['ime']?>
			</option>
				<?php
			}
				?>
					</select>
			</td></tr>

			<tr><td><input type="hidden" name="skrit" value="<?php echo $_GET['ajdi']; ?>"/></td></tr>	<!-- hidden pomeni da se ne prikaže v form -->

			<tr><td></td><td><input type="submit" name="sub_programi" value="Posodobi"/></td></tr>
		</form>
		</table>
		
	</div>
	
	<?php
		require 'noga.php'; //vključimo kodo s datoteke glava.php
	?>