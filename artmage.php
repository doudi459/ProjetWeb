<?php

 
                            try {
                    $bdd = new PDO('mysql:host=localhost;dbname=cmsbdd' , 'root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                                        }
                                    catch (Exception $e)
                                        {
                                    die('Erreur : ' . $e->getMessage());
                                        }

if(isset($_POST['urlmg']) and isset($_POST['art']) )
{
$requete=$bdd->prepare("SELECT Num,contenu From article where titre =? and nomAuteur =? and dateRedaction =?");
$requete->execute($_POST['art']);
$donner=$requete->fetch();
$urle ="./Modelutilisateur/bibliotheque/" . sha1_file($_POST['urlmg']) . ".jpg";
copy($_POST['urlmg'],$urle);
$requete=$bdd->prepare(" INSERT INTO `articleimage` (`NumArticle`,`pathImage`) VALUES (?,?);");
$requete->execute(array($donner['Num'],$urle));
$json_Dat = array();
$json_Dat[$_POST["Article"]] = array();
array_push($json_Dat[$_POST["Article"]],$donner["contenu"]);
array_push($json_Dat[$_POST["Article"]],$urle);
$fichierjson='<?php echo ' .  json_encode($json_Dat,JSON_PRETTY_PRINT) . '?>';




$session = fopen("Modelutilisateur/test.php","w+");
fputs($session,$fichierjson);
fclose($session);


}


?>