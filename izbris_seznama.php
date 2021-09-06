<?php
		include_once 'glava.php'; //vključimo kodo s datoteke glava.php
	?>

<?php
//ker dostopamo do baze moramo vključiti povezava.php
	require 'povezava.php';
	include_once 'seja.php';

    echo '<p id="naslov_vnosa"> Uspešno izbrisano s seznama priljubljenih!</p>';
	
	$idv=$_GET['izbris_ajdi'];

	//zapis SQL stavka 
	$sql="DELETE FROM seznami WHERE id=$idv"; //ali pa naredimo tako da "id", shranimo v spremenljivko -> $i
			
	//sprožimo poizvedbo
	$result=mysqli_query($link, $sql);


	//prevrimo kateri id smo dobli, in glede id potem odstanimo podatek s tabele
	/*foreach (array_keys($_SESSION['bookmarks'], $id_vrstica) as $key) 
	{
		unset($_SESSION['bookmarks'][$key]);	//unset je funkcija za odstranitev podatkov s tabel
	}*/

	header("Refresh:1 url=seznam_priljubljenih.php");	//povemo kam naj nas pošlje
	
?>

<?php
		require 'noga.php'; //vključimo kodo s datoteke noga.php
	?>