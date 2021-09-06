<?php
		include_once 'glava.php'; //vključimo kodo s datoteke glava.php

	?>
	
	<div id ="vs">
		<h2 id="naslov_vnosa">Dodajanje programa</h2>
		<table>
		<form action="vnos_baza.php" method="post">
			<tr><td><label for="ime_programa"><b id="tekst_prijava">Vnesi ime programa: </b></label></td>
			<td><input type="text" placeholder="Vnesi ime programa" name="ime_programa"></td></tr>

			<tr><td><label for="jezik"><b id="tekst_prijava">Vnesi jezik programa: </b></label></td>
			<td><input type="text" placeholder="Vnesi jezik programa" name="jezik"></td></tr>

			<tr><td><label for="omejitev"><b id="tekst_prijava">Vnesi starostno omejitev: </b></label></td>
			<td><input type="text" placeholder="Vnesi starostno omejitev" name="omejitev"></td></tr>

			<tr><td><label for="oddaja"><b id="tekst_prijava">Izberi oddajo: </b></label></td>
			<td>
			
			<?php
			require 'povezava.php';

			//zapišemo sql stavek
			$sql="SELECT * FROM oddaje";

			//sprožimo poizvedbo
			$rezultat=mysqli_query($link,$sql);

			?>

			<select class="" name="oddaja">


			<?php
				while ($row=mysqli_fetch_array($rezultat)) 
				{
			?>

			<option value="<?= $row['id'] ?>">
				<?=$row['ime']?>
			</option>
				<?php
			}
				?>
					</select>
			</td></tr>

			<tr><td></td><td><input type="submit" name="sub_programi" value="Vstavi"/> <input type="reset" value="Ponastavi"/></td></tr>
		</form>
		</table>
		
	</div>
	
	<?php
		require 'noga.php'; //vključimo kodo s datoteke glava.php
	?>