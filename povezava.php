<?php
/*Povezava na strežnik*/

$host="localhost";
$user="root";
$password="";
$database="tv_spored-projekt";

//samo strežnik(najprej dostopamo do strežnika)
$link = mysqli_connect($host, $user, $password)
		or die("Ne morem do strežnika.");
	
		
//do baze(potem še dostopamo do baze)
mysqli_select_db($link, $database)
		or die("Ne morem do baze.");	//če se ne moremo povezati do baze potem dobimo to opozorilo


/*Izbira kodiranja - pomembno za šumnike*/
mysqli_set_charset($link, "utf8"); // $link je zaradi tega ker smo "mysqli_connect" shranili v to spremenljivko

?>

<!-- celotna datoteka za povezavo na bazo in strežnik-->