
<?php
session_start();


if (isset($_POST["Email"]) and $_POST["Email"] != "" and isset($_POST["comment"]) and $_POST["comment"] != "" )
{
	try 
	{
     $bdd = new PDO('mysql:host=localhost;dbname=cmsbdd' , 'root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
 	{
    die('Erreur : ' . $e->getMessage());
	}
	$requette=$bdd->prepare(" INSERT INTO message (Emaildistinataire,Nom,Prenom,img,contenuemail) values (?,?,?,?,?); ");
	$requette->execute(array($_POST["Email"],$_SESSION['nom'],$_SESSION['prenom'],$_SESSION['img'],$_POST["comment"]));
	header('Location: consult.php');
}                           
?>