<?php


                            try {
                    $bdd = new PDO('mysql:host=localhost;dbname=cmsbdd' , 'root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                                        }
                                    catch (Exception $e)
                                        {
                                    die('Erreur : ' . $e->getMessage());
                                        }

if(isset($_POST["elem"]))
{
	 $requete=$bdd->prepare('SELECT contenu FROM article where  titre = ? and nomAuteur = ? and dateRedaction = ? ');
	 $repance=$requete->execute($_POST['elem']); 
     $donner = $requete->fetch();
     echo $donner["contenu"];
           

}

?>