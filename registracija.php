<?php
		include_once 'glava.php'; //vključimo kodo s datoteke glava.php
	?>
	
	<div id ="vs">
		<h2 id="naslov_prijava">Prijavi se v svoj račun</h2><br />
        <table>
        <form action="registracija_baza.php" method="post">
			<tr><td><label for="ime"><b id="tekst_prijava">Vnesi ime: </b></label></td>
			<td><input type="text" placeholder="Vnesi ime" name="ime" required></td></tr>

			<tr><td><label for="priimek"><b id="tekst_prijava">Vnesi priimek: </b></label></td>
			<td><input type="text" placeholder="Vnesi priimek" name="priimek" required></td></tr>

            <tr><td><label for="email"><b id="tekst_prijava">Vnesi email račun: </b></label></td>
			<td><input type="text" placeholder="Vnesi Email" name="email" required></td></tr>

            <tr><td><label for="psw"><b id="tekst_prijava">Vnesi geslo: </b></label></td>
			<td><input type="password" placeholder="Vnesi geslo" name="psw" required></td></tr>

            <tr><td><label for="psw-repeat"><b id="tekst_prijava">Ponovi geslo:</b></label></td>
			<td><input type="password" placeholder="Ponovi geslo" name="psw-repeat" required></td></tr>

			<!--<tr><td><label for="rang"><b id="tekst_prijava">Vnesi rang:</b></label></td>
			<td><input type="text" placeholder="Vnesi rang" name="rang" required></td></tr>-->
            
			<tr><td></td><td><input type="submit" value="Registracija"/>
			
            <input type="reset" value="Ponastavi"/></td></tr>
		</form>
        </table>
        <br><br>

		<a id="tekst_pod_registracija" href="prijava.php"> Vrni se na prijavo </a> 

        <br><br>
	</div>
	
	<?php
		require 'noga.php'; //vključimo kodo s datoteke noga.php
	?>