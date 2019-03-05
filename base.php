<?php

session_start();   


                        /*                    

                        verifier l'email
                        telecharger l image dans le server 
                        inserer user dans la base de donné
                        

                        */



		try {
          $bdd = new PDO('mysql:host=localhost;dbname=cmsbdd' , 'root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
         }
    catch (Exception $e)
                                        {
   die('Erreur : ' . $e->getMessage());
        }
        if (isset($_POST['uEmail']) and $_POST['uEmail'] != "" ) {
        	
        
         $rapance= $bdd->query("SELECT * FROM utilisateur where Email = '" . $_POST['uEmail'] . "';" );
          if ($donner = $rapance->fetch())
          {
          	if($donner['nom'] != null)                                                                       /*
                                                                                                            verifier Email
                                                                                                            */
          	{
          		$_SESSION['mailerron'] = True;
          		header('Location: ajouteruser.php');


          	}
          }
      }


	$img = Null;
try {
                                                                                                            /*
                                                                                                            telecharger fichier doc php officiel
                                                                                                            */
    // Undefined | Multiple Files | $_FILES Corruption Attack
    // If this request falls under any of them, treat it invalid.
    if (
        !isset($_FILES['upfile']['error']) ||
        is_array($_FILES['upfile']['error'])
    ) {
        throw new RuntimeException('donner un fichier');
    }

    // Check $_FILES['upfile']['error'] value.
    switch ($_FILES['upfile']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('aucun fichier envoyer');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('vous ariver a la limite du fichier');
        default:
            throw new RuntimeException('erreur inconu');
    }

    // You should also check filesize here. 
    if ($_FILES['upfile']['size'] > 100000000) {
        throw new RuntimeException('fichier trop volumineu.');
    }

    // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
    // Check MIME Type by yourself.
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    if (false === $ext = array_search(
        $finfo->file($_FILES['upfile']['tmp_name']),
        array(
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
        ),
        true
    )) {
        throw new RuntimeException('forma invalide');
    }

    // You should name it uniquely.
    // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
    // On this example, obtain safe unique name from its binary data.
  
   	
   
    if (!move_uploaded_file(
        $_FILES['upfile']['tmp_name'],
        sprintf('./uploads/%s',$_POST['uEmail'])
            
        
    )) {
        throw new RuntimeException('Impossible de deplacer le fichier');
    }
    else
    	$img = "uploads/" . $_POST['uEmail'];


    echo 'fichier telecharger';

} catch (RuntimeException $e) {

    echo $e->getMessage();

}





if (isset($_POST['uName']) and $_POST['uName'] != "" and $_POST['uprn'] != "" and $_POST['uEmail'] != "" and $_POST['selectSm'] != "" and $_POST['upwd'] != "")
{

                                                                /*      inserer user       */
    

        $requette=$bdd->prepare(" INSERT INTO utilisateur (nom,prenom,Email,Fonction,password,img) values (?,?,?,?,?,?); ");
        $requette->execute(array($_POST['uName'],$_POST['uprn'],$_POST['uEmail'],$_POST['selectSm'],$_POST['upwd'],$img));
        $_SESSION['ajouteruser'] =True;
        header('Location: consult.php');

}
else
    header('Location: ajouteruser.php');

?>