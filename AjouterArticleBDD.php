<?php
session_start();

                            try {
                    $bdd = new PDO('mysql:host=localhost;dbname=cmsbdd' , 'root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                                        }
                                    catch (Exception $e)
                                        {
                                    die('Erreur : ' . $e->getMessage());
                                        }


					if ((isset($_POST["Text"]) and  $_POST["Text"] != "")) {
						$datetime = date("Y-m-d");
						

					$requete=$bdd->prepare(" INSERT INTO `article` (`nomAuteur`,`dateRedaction`,`titre`,`contenu`) VALUES (?,?,?,?);");
					$repance=$requete->execute(array($_SESSION['nom'] . ' ' . $_SESSION['prenom'],$datetime,$_POST['titr'],$_POST['Text']));
					 $requete= $bdd->prepare('SELECT Num FROM article where nomAuteur = ? and dateRedaction = ? and titre = ? ;');
					 $repance=$requete->execute(array($_SESSION['nom'] . ' ' . $_SESSION['prenom'],$datetime,$_POST['titr']));
					 $valeur = $requete->fetch();
					 	

					if (isset($_POST["liens"]))
					{
						$mytab = $_POST["liens"];
						
						foreach ($mytab as $collection ) {
							
					$requete=$bdd->prepare(" INSERT INTO `lien_article` (NumArticle,lien) VALUES (?,?);");		
					$repance=$requete->execute(array($valeur["Num"],$collection));
						}
					}
					if (isset($_POST["categories"]))
					{
						$mytab = $_POST["categories"];
						
						foreach ($mytab as $collection ) {
							
					$requete=$bdd->prepare(" INSERT INTO `categorie_article` (NumArticle,Categorie) VALUES (?,?);");		
					$repance=$requete->execute(array($valeur["Num"],$collection));
					}
				}
					if (isset($_POST["MotCles"]))
					{
						$mytab = $_POST["MotCles"];
						
						foreach ($mytab as $collection ) {
							
					$requete=$bdd->prepare(" INSERT INTO `motcle_article` (NumArticle,MotCle) VALUES (?,?);");		
					$repance=$requete->execute(array($valeur["Num"],$collection));
						}
					}
					
					}
					











?>