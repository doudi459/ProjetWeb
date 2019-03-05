<?php

                            try {
                    $bdd = new PDO('mysql:host=sql105.epizy.com;dbname=epiz_22036246_CMS_BDD' , 'epiz_22036246','KNYrcBfNYin5', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                                        }
                                    catch (Exception $e)
                                        {
                                    die('Erreur : ' . $e->getMessage());
                                        }


try {
                                                                                                            /*
                                                                                                            telecharger fichier doc php officiel
                                                                                                            */
   

    if (
        !isset($_FILES['upfile']['error']) ||
        is_array($_FILES['upfile']['error'])
    ) {
        throw new RuntimeException('donner un fichier');
    }

   
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

    
    if ($_FILES['upfile']['size'] > 100000000) {
        throw new RuntimeException('fichier trop volumineu.');
    }

    
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
    
    $nomimg = sha1_file($_FILES['upfile']['tmp_name']);
   
    if (!move_uploaded_file(
        $_FILES['upfile']['tmp_name'],
        sprintf('./Bibliotheque/%s.%s',
            $nomimg,
            $ext    
        )
    )) {
        throw new RuntimeException('Impossible de deplacer le fichier');
    }
    else
    	
    $img = "Bibliotheque/" . $nomimg;

    echo 'fichier telecharger';

} catch (RuntimeException $e) {

    echo $e->getMessage();

}
		$requette=$bdd->prepare(" INSERT INTO multimedia (path,Type) values (?,?); ");
        $requette->execute(array($img,"Image"));
        header('Location: bibliotheque.php');

?>