<?php
		include_once 'glava.php'; //vključimo kodo s datoteke glava.php
	?>
	
	<div id ="vs">
		<h2 id="naslov_prijava">Prijavi se v svoj račun</h2><br />
        <table>
        <form action="preveri_prijava.php" method="post"> 
            <tr><td><label for="mail"><b id="tekst_prijava">Vnesi email račun:</b></label></td>
			<td><input type="email" name="mail" placeholder="vnesi email"/> </td></tr>

            <tr><td><label for="pasw"><b id="tekst_prijava">Vnesi geslo:</b></label></td>
			<td><input type="password" name="pasw" placeholder="vnesi geslo"/> </td></tr>
            
			<tr><td></td><td><input type="submit" value="Prijava"/>
			
            <input type="reset" value="Ponastavi"/></td></tr>
		</form>
        </table>
			
		<br>
		<p id="tekst_pod_prijava"> Če se nimate računa, potem kliknite <a href="registracija.php"> tukaj. </a> </p>

	</div>
	
	<?php
		require 'noga.php'; //vključimo kodo s datoteke noga.php
	?>