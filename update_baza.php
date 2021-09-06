<?php
	//ker dostopamo do baze moramo vključiti povezava.php
	require 'povezava.php';

	$ime_programa=$_POST['ime_programa'];
	$jezik=$_POST['jezik'];
    $omejitev=$_POST['omejitev'];
	//$ime_oddaje=$_POST['ime_oddaje'];
	//$dolzina_oddaje=$_POST['dolzina_oddaje'];
	//$cas_predvajanja_oddaje=$_POST['cas_predvajanja_oddaje'];
	//$datum_predvajanja_oddaje=$_POST['datum_predvajanja_oddaje'];
	$oddaja_id=$_POST['oddaja'];
    $id=$_POST['skrit'];
	
	/* preverimo prenos */
	
	/*echo "$ime_programa".'<br />';
	echo "$jezik".'<br />';
	echo "$omejitev".'<br />'; 
	echo "$oddaja_id".'<br />';*/ 
	
	//zapis SQL stavka 
	if(isset($_POST['sub_programi']))
	{
		$sql="UPDATE tv_programi SET ime='$ime_programa', jezik='$jezik', starostna_omejitev='$omejitev', oddaja_id='$oddaja_id' WHERE id=$id";	//v oklepaj zapišemo vrednosti ki jih želimo vnesti,enojne narekovaje damo zaradi "stringov", če je celo število jih ne rabimo
	}

	/*if(isset($_POST['sub_oddaje']))
	{
		$sql2="UPDATE oddaje SET ime='$ime_oddaje', dolzina='$dolzina_oddaje', cas_predvajanja='$cas_predvajanja_oddaje',datum_predvajanja='$datum_predvajanja_oddaje' WHERE id=$id2";
	}*/
	
	//sprožimo poizvedbo
	if(isset($_POST['sub_programi']))
	{
		$result=mysqli_query($link, $sql);
	}
	
	/*if(isset($_POST['sub_oddaje']))
	{
		$result2=mysqli_query($link, $sql2);
	}*/

	//avtomatska preusmeritev
	header("Location:index.php");	//povemo kam naj nas pošlje
	
?>