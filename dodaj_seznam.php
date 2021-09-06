<?php
		include_once 'glava.php'; //vključimo kodo s datoteke glava.php
	?>

<?php
	//ker dostopamo do baze moramo vključiti povezava.php
	require 'povezava.php';
	include_once 'seja.php';	//ker uporabljamo $_SESSION potem moramo vključiti seja.php

    echo '<p id="naslov_vnosa"> Uspešno dodano na seznam priljubljenih!</p>';
	
	$id_vrstica=$_GET['ajdi'];

	//echo "$id_program_vrstica";

	//$_SESSION['id_seznam'] = $id_vrstica;

	$uid=$_SESSION['idu'];

	$sql="INSERT INTO seznami VALUES(NULL, '$id_vrstica', '$uid')";
	$result=mysqli_query($link, $sql);
	
	/* preverimo prenos */
	/*echo "$id_vrstica".'<br />';
	echo "$uid".'<br />';*/
	
	header("Refresh:1 url=index.php");	//povemo kam naj nas pošlje, tista 1 nam pove da se po 1 sekundi vrnemo na index.php
?>

<?php
		require 'noga.php'; //vključimo kodo s datoteke noga.php
	?>