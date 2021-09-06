<?php
session_start();    //ustvari sejo ali nadaljuje trenutno
session_destroy();  //uniči vse podatke, povezane s trenutno sejo.  
header("Location:prijava.php");