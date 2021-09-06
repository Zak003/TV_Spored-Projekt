<?php
	include 'povezava.php';
?>
	
<div id ="vs">
	<h1>Izbris</h1>
	<?php
        //dobimo id od izbrane vrstice
        $i=$_GET['ajdi'];

	    //zapis SQL stavka 
        $sql="DELETE FROM tv_programi WHERE id=$i"; //ali pa naredimo tako da "id", shranimo v spremenljivko -> $i
			
	    //sprožimo poizvedbo
        $result=mysqli_query($link, $sql);
    
        //gremo nazaj na izpis
        header("Location:index.php");
	?>