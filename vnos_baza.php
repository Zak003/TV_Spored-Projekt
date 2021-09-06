<?php
	//ker dostopamo do baze moramo vključiti povezava.php
	require 'povezava.php';
	
	$ime_programa=$_POST['ime_programa'];
	$jezik=$_POST['jezik'];
    $omejitev=$_POST['omejitev'];
	$oddaja_id=$_POST['oddaja'];
	
	/* preverimo prenos */
	
	/*echo "$ime_programa".'<br />';
	echo "$jezik".'<br />';
	echo "$omejitev".'<br />'; 
	echo "$oddaja_id".'<br />';*/
	
	//zapis SQL stavka 
	if(isset($_POST['sub_programi']))
	{
		$sql="INSERT INTO tv_programi VALUES (NULL, '$ime_programa', NULL, '$jezik', NULL, '$omejitev', NULL, '$oddaja_id', NULL)";	//v oklepaj zapišemo vrednosti ki jih želimo vnesti
		$result=mysqli_query($link, $sql);
		header("Location: 3 vnos.php");
	}
	else
	{
		header("Refresh: 3 index.php");
	}

	//sprožimo poizvedbo
	/*if(isset($_POST['sub_programi']))
	{
		$result=mysqli_query($link, $sql);
	}*/
	
	header("Location:index.php");	//povemo kam naj nas pošlje
	
?>