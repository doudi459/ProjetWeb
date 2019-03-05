<?php


if(isset($_POST['dat']))
{
	 $session = fopen("Modelutilisateur/" . $_POST['nompg'] ,"w+");
    fputs($session,$_POST['dat']);
    fclose($session);

}



?>