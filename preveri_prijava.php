<?php
include_once 'seja.php';
require 'povezava.php';

//uporaba filtra
/*$em=filter_input(INPUT_POST, 'mail'); //primer za filtriranje, če uporabimo filter ni opozorila
$pa=$_POST['pasw'];*/

//osnovno delovanje
$em=$_POST['mail']; //imena v enojnih narekovajih se morajo ujemati s imeni v obrazcih na prijava.php
$pa=$_POST['pasw'];

//preverimo prenos
/*echo "$em".'<br /';
echo "$pa".'<br /';*/

//zapis SQL stavka
$sql="SELECT * FROM uporabniki WHERE mail='$em' AND pas='$pa';";

//sprožimo poizvedbo
$result=mysqli_query($link, $sql);

//koliko jih je (uporabnikov)?
$st= mysqli_num_rows($result);

//preverimo rezultat, ki ga dobimo
if($st === 1) //tri enačaje -> === uporabimo ker mora dati rezultat 1 in mora biti celo število
{
    $row= mysqli_fetch_array($result);
    $_SESSION['imeu']=$row['ime'];  //to je asociativna tabela, v kateri s oglatim oklepajem določimo celico
    $_SESSION['priu']=$row['priimek'];  //v drugih oglatih oklepajih je ime kot ga imamamo v bazi
    $_SESSION['idu']=$row['id'];
    $_SESSION['rang']=$row['rang'];
    header("Location: index.php");
}
else
{
    echo'Uporabniško ime ali geslo ni pravilno';
    header("Refresh: 3 prijava.php"); //nas po 3 sekundah vrže nazaj na prijava.php
}

?>