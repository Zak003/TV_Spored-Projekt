<?php
		include_once 'glava.php'; //vključimo kodo s datoteke glava.php
        include_once 'seja.php';
	?>


<?php
	//ker dostopamo do baze moramo vključiti povezava.php
	require 'povezava.php';
	
	$i=$_POST['ime'];
	$p=$_POST['priimek'];
	$em=$_POST['email'];
    $pas=$_POST['psw'];
    $pas2=$_POST['psw-repeat'];
    //$r=$_POST['rang'];

    //pogledamo emaile vseh uporabnikov
  	$sql_e = "SELECT * FROM uporabniki WHERE mail='$em'";

    //sprožimo poizvedbo
  	$res_e = mysqli_query($link, $sql_e);
	
	/* preverimo prenos */
	
	/*echo "$i".'<br />';
	echo "$p".'<br />';
	echo "$em".'<br />'; 
    echo "$pas".'<br />'; 
    echo "$pas2".'<br />'; 
    echo "$r".'<br />'; */

    if($pas!=$pas2) //preverimo če sta gesla enaka
    {
        header("Refresh:3 url=registracija.php");
        echo "<div id=tekst_registracija> Gesla se ne ujemata. Pravilno ponovi geslo. </div>";
    }
    else if(mysqli_num_rows($res_e) > 0) //preverimo če je kakšen uporabnik že s takšnim email naslovom
    {
        header("Refresh:2 url=registracija.php");
  	  	echo "<div id=tekst_registracija> Ta email je že uporabljen. Uporabi drugečen email naslov. </div>";	
  	}
	else
    {
		//zapis SQL stavka 
		$sql="INSERT INTO uporabniki VALUES (NULL, '$i', '$p', '$em', '$pas', NULL)";	//v oklepaj zapišemo vrednosti ki jih želimo vnesti
				
		//sprožimo poizvedbo
		$result=mysqli_query($link, $sql);

		header("Refresh:3 url=prijava.php");
		echo "<div id=tekst_registracija> Registracija je uspešna. Nadaljujte s prijavo. </div>";
    }

?>

<?php
		require 'noga.php'; //vključimo kodo s datoteke noga.php
	?>