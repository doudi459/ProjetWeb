
<?php
session_start();

                     
                            try {
                    $bdd = new PDO('mysql:host=sql105.epizy.com;dbname=epiz_22036246_CMS_BDD' , 'epiz_22036246','KNYrcBfNYin5', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                                        }
                                    catch (Exception $e)
                                        {
                                    die('Erreur : ' . $e->getMessage());
                                        }

                     $resulta=$bdd->query("SELECT * FROM multimedia;");
                     $requet = $bdd->query("SELECT * FROM article;");
?>




<!DOCTYPE html>
<html ><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
     <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link rel="stylesheet" href="css/lib/html5-editor/bootstrap-wysihtml5.css" />
    <title>Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->

   
    <link href="css/style.css" rel="stylesheet">
    <link href="doudi.css" rel="stylesheet">

    <!-- internal css -->
    <style type="text/css">
    .modal{
    	display: none;
    	width: 100%;
    	height: 100%;
    	position: fixed;
    	margin:auto;
    	overflow: auto;
    }

    .modal-content{
    	margin:15% auto;
    	padding: 20px;
    	width: 80%;

    }
    .griser{
border-style: solid;
border-color: #AAAAAA;
border-width: 2px;
background-color: rgb(127,127,127);
    }

    </style>
    <script type="text/javascript">
        
n =0;
section = [];
imgSelect = null;
function imageselect(obj){
 var idLigne=obj.id;
 obj.className="selectionimg";
if (imgSelect!=null)
 {
    imgSelect.className = "defautimg";
    imgSelect = obj;
                                                        // Selectionner un ligne et charger photo
 }
 else
 {
    imgSelect = obj;
 }
}
ObjSelec = null;
encien =null;
function SelectArticle(obj)
{
 var ajout_article = document.getElementById("AjoutArticleboutton");
 ajout_article.innerHTML ='<button type="button" class="btn btn-danger btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="fa fa-trash"></i>supprimer</button>  <button type="button" id = "bntAdd" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5" onclick="choisireArticle();"><i class="fa fa-plus"></i>Ajouter Article</button>';

 var idLigne=obj.id;
 obj.className="selection";
if (ObjSelec!=null)
 {
    ObjSelec.className = "defaut";
    encien = ObjSelec;
    ObjSelec = obj;
                                                        // Selectionner un ligne et charger photo
 }
 else
 {
    encien = ObjSelec;
    ObjSelec = obj;
 }
}

var PageSelected = null;

function Activation(obj)
      {
        var section = $('#listSection');
        switch (obj.id) {
        case "page1":
if (PageSelected != null) {
    articleSelec = [false,false,false,false];
    Swal({
  title: 'Vous ete sur le point d\'activer une autre page continuer ?',
  text: 'Vous les vous sauvgarder les modification sur la page actuele',
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Oui ,je veux',
  cancelButtonText: 'No, Mercie'
}).then((result) => {
  if (result.value) {
PageSelected = "Modele1.html" ;
    
    $.post('Activerpage.php',{request:"ActiverPage1",page1:"Modele2.html",page2:"Modele3.html"},function(data){
    Swal(
      'Activation de la page !',
      'Page 1 activé. ',
      'success'
    ); 
    });
  // For more information about handling dismissals please visit
  // https://sweetalert2.github.io/#handling-dismissals
  } else if (result.dismiss === Swal.DismissReason.cancel) {
    PageSelected = "Modele1.html" ;
    
    $.post('Activerpage.php',{request:"ActiverPage1",page1:"Modele2.html",page2:"Modele3.html"},function(data){
    Swal(
      'Activation de la page !',
      'Page 1 activé. ',
      'success'
    ); 
    });
  }
})
    }
    else{
  PageSelected = "Modele1.html" ;
    
    $.post('Activerpage.php',{request:"ActiverPage1",page1:"Modele2.html",page2:"Modele3.html"},function(data){
    Swal(
      'Activation de la page !',
      'Page 1 activé. ',
      'success'
    ); 
    });
    }

    
                break;
        case "page2":
if (PageSelected != null) {
    articleSelec = [false,false,false,false];
    Swal({
  title: 'Vous ete sur le point d\'activer une autre page continuer ?',
  text: 'Vous les vous sauvgarder les modification sur la page actuele',
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Oui ,je veux',
  cancelButtonText: 'No, Mercie'
}).then((result) => {
  if (result.value) {
    PageSelected = "Modele2.html"
 $.post('Activerpage.php',{request:"ActiverPage1",page1:"Modele1.html",page2:"Modele3.html"},function(data){
    Swal(
      'Activation de la page !',
      'Page 2 activé. ',
      'success'
    ); 
    });
  // For more information about handling dismissals please visit
  // https://sweetalert2.github.io/#handling-dismissals
  } else if (result.dismiss === Swal.DismissReason.cancel) {
    PageSelected = "Modele2.html"
 $.post('Activerpage.php',{request:"ActiverPage1",page1:"Modele1.html",page2:"Modele3.html"},function(data){
    Swal(
      'Activation de la page !',
      'Page 2 activé. ',
      'success'
    ); 
    });
  }
})
    }
    else{
         PageSelected = "Modele2.html"
 $.post('Activerpage.php',{request:"ActiverPage1",page1:"Modele1.html",page2:"Modele3.html"},function(data){
    Swal(
      'Activation de la page !',
      'Page 2 activé. ',
      'success'
    ); 
    });
    }

                break;
        case "page3":
        if (PageSelected != null) {
    articleSelec = [false,false,false,false];
    Swal({
  title: 'Vous ete sur le point d\'activer une autre page continuer ?',
  text: 'Vous les vous sauvgarder les modification sur la page actuele',
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Oui ,je veux',
  cancelButtonText: 'No, Mercie'
}).then((result) => {
  if (result.value) {
     PageSelected = "Modele3.html"
 $.post('Activerpage.php',{request:"ActiverPage1",page1:"Modele2.html",page2:"Modele1.html"},function(data){
    Swal(
      'Activation de la page !',
      'Page 3 activé. ',
      'success'
    ); 
    });
  // For more information about handling dismissals please visit
  // https://sweetalert2.github.io/#handling-dismissals
  } else if (result.dismiss === Swal.DismissReason.cancel) {
    PageSelected = "Modele3.html"
 $.post('Activerpage.php',{request:"ActiverPage1",page1:"Modele2.html",page2:"Modele1.html"},function(data){
    Swal(
      'Activation de la page !',
      'Page 3 activé. ',
      'success'
    ); 
    });
  }
})
    }
    else{
    PageSelected = "Modele3.html"
 $.post('Activerpage.php',{request:"ActiverPage1",page1:"Modele2.html",page2:"Modele1.html"},function(data){
    Swal(
      'Activation de la page !',
      'Page 3 activé. ',
      'success'
    ); 
    });

    }

           
                break;


        }
      }


function SelectLigne(obj)
{
var ajout_article = document.getElementById("AjoutArticleboutton");
ajout_article.innerHTML="";
 var idLigne=obj.id;
 obj.className="selection";
    switch (PageSelected) {
        case "Modele1.html":
        case "Modele2.html":

                                        switch (obj.id) {

                                                case "Section1":
                                                
                                               var article= document.getElementById('listArticle');
                                            
                                            
                                            if(articleSelec[0] == true){
                                                article.innerHTML = '<tr onclick="" id="sec1art1" class ="griser"><th scope="row">1</th><td>Article 1</td></tr> ';
                                                if(articleSelec[1] == true)
                                                {
                                                article.innerHTML += '<tr onclick="" id="sec1art2" class ="griser"><th scope="row">2</th><td>Article 2</td></tr>'
                                                }
                                                else
                                                {
                                                article.innerHTML += '<tr onclick="SelectArticle(this);" id="sec1art2"><th scope="row">2</th><td>Article 2</td></tr>';  
                                                }
                                            }
                                            else{
                                            article.innerHTML = '<tr onclick="SelectArticle(this)" id="sec1art1"><th scope="row">1</th><td>Article 1</td></tr>';
                                            if(articleSelec[1] == true)
                                                {
                                                article.innerHTML += '<tr onclick="" id="sec1art2" class ="griser"><th scope="row">2</th><td>Article 2</td></tr>'
                                                }
                                                else
                                                {
                                                article.innerHTML += '<tr onclick="SelectArticle(this);" id="sec1art2"><th scope="row">2</th><td>Article 2</td></tr>';  
                                                }
                                        }
                                            
                                               
                                                    
                                                        break;
                                                case "Section2":
                                                var article = document.getElementById('listArticle');
                                                if(articleSelec[2] == true){
                                                article.innerHTML = '<tr onclick="" id="sec2art1" class ="griser"><th scope="row">1</th><td>Article 3</td></tr> ';
                                            }
                                            else
                                            {
                                              article.innerHTML = '<tr onclick="SelectArticle(this);" id="sec2art1"><th scope="row">1</th><td>Article 3</td></tr>';
                                          }
                                                
                                            
                                                        break;
                                                case "Section3":
                                                var article = document.getElementById('listArticle');
                                                if(articleSelec[3] == true){
                                                article.innerHTML = '<tr onclick="" id="sec3art1" class ="griser"><th scope="row">1</th><td>Article 4</td></tr> ';
                                            }
                                            else
                                            {

                                                article.innerHTML = '<tr onclick="SelectArticle(this);" id="sec3art1"><th scope="row">1</th><td>Article 4</td></tr>';
                                            }   
                                            
                                                        break;
                                        }
        break;
        

    
         
        case "Modele3.html":

                                    switch (obj.id) 
                                    {
                                   case "Section1":
                                                var article = document.getElementById('listArticle');
                                                if(articleSelec[0] == true){
                                                article.innerHTML = '<tr onclick="" id="sec1art1" class ="griser"><th scope="row">1</th><td>Article 1</td></tr> ';
                                            }
                                            else
                                            {
                                              article.innerHTML = '<tr onclick="SelectArticle(this);" id="sec1art1"><th scope="row">1</th><td>Article 1</td></tr>';
                                          }
                                                
                                            break;
                                    case "Section2":
                                                var article = document.getElementById('listArticle');
                                                if(articleSelec[1] == true){
                                                article.innerHTML = '<tr onclick="" id="sec2art1" class ="griser"><th scope="row">1</th><td>Article 2</td></tr> ';
                                            }
                                            else
                                            {
                                              article.innerHTML = '<tr onclick="SelectArticle(this);" id="sec2art1"><th scope="row">1</th><td>Article 2</td></tr>';
                                          }
                                                
                                            break;
                                    case "Section3":
                                                var article = document.getElementById('listArticle');
                                                if(articleSelec[2] == true){
                                                article.innerHTML = '<tr onclick="" id="sec3art1" class ="griser"><th scope="row">1</th><td>Article 3</td></tr> ';
                                            }
                                            else
                                            {
                                              article.innerHTML = '<tr onclick="SelectArticle(this);" id="sec3art1"><th scope="row">1</th><td>Article 3</td></tr>';
                                          }
                                                
                                 
                                            break;
                                    }
     
                break;
 }
 if (ObjSelec!=null)
 {
    ObjSelec.className = "defaut";
    ObjSelec = obj;
                                                        // Selectionner un ligne et charger photo
 }
 else
 {
    ObjSelec = obj;
 }
 }


    </script>
<style type="text/css" media="screen">
.defaut{
border-color: #AAAAAA;
border-width: 2px;
}
.selection{
border-style: solid;
border-color: #AAAAAA;
border-width: 2px;
background-color: #8888DD;
}
.defautimg{
    border: 5px solid #AAAAAA;
    height: 150px;
    width: 150px;
} 
.selectionimg{
    border: 5px solid #8888DD;
    height: 150px;
    width: 150px;
} 
td{
cursor: pointer;
}
</style>
</head>

<body class="fix-header fix-sidebar mini-sidebar"  style="background-color: black;">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader" style="display: none;">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle> </svg>
    </div>
    <!-- Main wrapper  -->
      <div id="main-wrapper">
        <!-- header header  -->
        <div class="header" >
            <nav class="navbar top-navbar navbar-expand-md " style="background-color: #0a0a0a;height: 56px;" >
                <!-- Logo -->
                <div class="navbar-header" style="height: 100%;background-color:#000000;" >
                    <a class="navbar-brand">
                        <b>
                        <img src="images/users/cms.jpg" alt="homepage" class="dark-logo"
                        style="height: 50px;float: left;">
                        </b>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
            
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">

                    <!-- Comment -->
                        <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/users/cloche.bmp" alt="user" class="profile-pic"></a>
                            
                             <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">VOS MESSAGE</div>
                                    </li>
                                    <li style="overflow: visible;">
                                        <div class="slimScrollDiv" style="position: relative; overflow-x: visible; overflow-y: hidden; width: auto; height: 250px;"><div class="message-center" style="overflow: hidden; width: auto; height: 250px;">
                                            <!-- Message -->
                                            <?php
                                        $requete = $bdd->prepare('SELECT * From message where Emaildistinataire = ?');
                                        $repance=$requete->execute(array($_SESSION['email']));
                                        while($valeur = $requete->fetch())
                                        {
                                            if ($valeur != null ) {
                                                
                                            
                                            ?>
                                 <a href="#">
                                <div class="user-img"> <img src=<?php if($valeur["img"] != NULL ) echo $valeur["img"]; else echo "images/users/5.jpg" ; ?> alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                                
                                <div class="mail-contnet">
                                <h5><?php echo $valeur["Nom"] . " " . $valeur["Prenom"];?></h5> <span class="mail-desc"><?php echo $valeur["contenuemail"] ?></span> 
                                </div>
                                 </a>
                            <?php 
                                       }  
                                         }
                        ?>
                                            <!-- Message -->
                                            
                                        </div><div class="slimScrollBar" style="background: rgb(220, 220, 220); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>

                        </li>
                        <!-- End Comment -->
                        <!-- Messages -->
                        <li class="nav-item dropdown">
                           
                        <a class="nav-link dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/users/message.bmp" alt="user" class="profile-pic"></a>
                        
                        <div class="dropdown-menu  dropdown-menu-right mailbox animated zoomIn" style="height: 450px ;width: 450px;" aria-labelledby="2">
                        <div class="card">
                            
                            <div class="drop-title text-center font-weight-bold">Send Message</div>    
                                
                                
                                <form method="post" action="Email.php">
                                   <div class="form-group">
                                    
                                    <input type="email" class="form-control input-rounded border border-primary " placeholder="Entrez Email" name="Email">
                                     </div>

                                    <div class="form-group">
                                    <label for="comment">Contenu:</label>
                                    <textarea class="textarea_editor form-control rounded border border-primary " rows="15" style="height: 200px;" id="comment" name="comment"></textarea>
                                    </div>
                                    
                                    <div style="float: right;margin-top: 15px;">
                                        <input type="submit" class= "btn btn-outline-primary" value="Send" name="Envoi">
                                    </div>
                                </form>
                            </div>  
                         </div>  
                        </li>
                        <!-- End Messages -->
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src=<?php if($_SESSION['img'] != NULL) echo $_SESSION['img']; else echo "images/users/gh.bmp" ;?> alt="user" class="profile-pic"></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn" style="width: 250px;">
                                <ul class="dropdown-user">
                                    <li><a href="#"><i class="ti-user"></i> <?php echo " nom : " . $_SESSION['nom'];?></a></li>
                                    <li><a href="#"><i class="ti-wallet"></i> <?php echo " prenom : " . $_SESSION['prenom']; ?></a></li>
                                    <li><a href="#"><i class="ti-email"></i> <?php echo $_SESSION['email']; ?></a></li>
                                    <li><a href="#"><i class="ti-settings"></i> <?php echo $_SESSION['fonction']; ?></a></li>
                                    <li><a href="login.php"><i class="fa fa-power-off"></i> Déconnection </a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar" style="overflow: visible;background-color: #0a0a0a">
            <!-- Sidebar scroll-->
            <div class="slimScrollDiv" style="position: relative; overflow: visible; width: auto; height: 100%;">
                <div class="scroll-sidebar" style="overflow-x: visible; overflow-y: hidden; width: auto; height: 100%;">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav active" style="padding-top: 12px;background-color: #0a0a0a">
                    <ul id="sidebarnav">
                     
                        <li> <a href="accueil.php" style= "background-color: #0a0a0a"; ><i class="fa fa-tachometer" style=""></i><span style="font-size: 15px; "><b> Dashboard </b> </span></a>
                        </li>
                        
                        
                        <li class="nav-label">Edition</li>
                        <li class="nav-devider"></li>
                        <?php 
                        if($_SESSION["fonction"] == "Administrateur" || $_SESSION["fonction"] == "Publicateur")
                        {
                            ?>
                        <li> <a class="has-arrow " href="#" aria-expanded="false" style="background-color: #0a0a0a;" ><i class="fa fa-file"></i><span class="hide-menu">Pages</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="page.php">Toutes les pages</a></li>
                                <li><a href="ajouterpage.php">Ajouter nouvelle</a></li>
                           
                            </ul>
                        </li>
                        <?php 
                    }
                    if($_SESSION["fonction"] == "Administrateur" || $_SESSION["fonction"] == "Publicateur" || $_SESSION["fonction"] == "Editeur" )
                    {
                        ?>

                        <li> <a class="has-arrow "  href="#" aria-expanded="false" style="background-color: #0a0a0a;" ><i class="fa fa-edit"></i><span class="hide-menu">Article</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="article.php">Tous les articles</a></li>
                                <li><a href="ajouterarticle.php">Ajouter nouveau</a></li>

                               
                            </ul>
                        </li>
                             <?php 
                    }

                    ?>
                        
                        <li> <a class="has-arrow  " href="#" aria-expanded="false" style="background-color: #0a0a0a;" ><i class="fa fa-camera"></i><span class="hide-menu">Multimédia</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="bibliotheque.php">Bibliothèque</a></li>
                                <li><a href="nouveauContenu.php">Ajouter nouveau contenu</a></li>
                               
                            </ul>
                        </li>
                        
                        <li class="nav-label">Application</li>
                        <li class="nav-devider"></li>                   
                        <?php
                         if($_SESSION["fonction"] == "Administrateur")
                    {
                        ?>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false" style="background-color: #0a0a0a;"><i class="fa fa-users"></i><span class="hide-menu">Users</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="consult.php">Tous les users</a></li>
                                <li><a href="ajouteruser.php">Ajouter nouveau user</a></li>
                               
                            </ul>
                        </li>
                        <?php
                    }
                    ?>

                        <li> <a class="has-arrow  " href="#" aria-expanded="false" style="background-color: #0a0a0a;"><i class="fa fa-cog"></i><span class="hide-menu">Parametres</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#">Generale</a></li>
                                <li><a href="#">Edition</a></li>
                                <li><a href="#">Multimedia</a></li>
                            </ul>
                        </li>  

                   </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>

 
                <div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; left: 1px;"></div></div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper" style="min-height: 591px;background-color: rgb(30,30,30); ">
            <!-- Bread crumb -->
            <div class="row page-titles" style="background-color: rgb(20,20,20);height: 40px;">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Nouvelle Page</h3> </div>
            </div>
            <!-- End Bread crumb -->
            
            <div class="container-fluid" style="background-color: rgb(30,30,30);">
                <!-- Start Page Content -->
                <div class="row" >
                    <div class="col-lg-8 col-sm-8">
                        <input type="text" class="form-control input-rounded input-sm" placeholder="Entrez le Nom ici">
                        
                    </div>

                </div>
                
                <div class="row " style="margin-top: 8px;">
                     <div class="col-lg-8 col-sm-8">
                        <input type="text" class="form-control input-rounded " placeholder="Entrez le titre ici">  
                      </div>

                    <div class="col-lg-4 col-sm-4">
                        <div style="float:right">
                        <button type="button" class="btn btn-success btn-rounded m-b-10 m-l-5">Prévoir</button>
                        <button type="button" id="publier" onclick="enregistrePage()" class="btn btn-info btn-rounded m-b-10 m-l-5">Publier</button>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">     
                    <div class="card">
                        <div class="card-body">
                            <h4 style="color: gray;border-bottom: 1px solid gray">Modèle de page :</h4>
                            <div class="row">
                                <div class="col-md-4 col-sm-6">
                                    <img src="images/Page1.JPG" alt="Card image cap" style="border: 3px solid gray;height: 90%;width: 100%;">
                                    <div class="m-t-4" style="float: right;">
                                    <a href="ModelesPages/Modele1.html" onclick="window.open(this.href); return false;">
                                    <button type="button" class="btn btn-outline-secondary btn-sm">Prévoir</button></a>
                                    <button type="button" id="page1" class="btn btn-outline-info btn-sm" onclick="Activation(this)">Activer</button>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-6">
                                    <img src="images/Page2.JPG" alt="Card image cap" style="border: 3px solid gray;height: 90%;width: 100%;">
                                    <div class="m-t-4" style="float: right;">
                                    <a href="ModelesPages/Modele2.html" onclick="window.open(this.href); return false;">
                                    <button type="button" class="btn btn-outline-secondary btn-sm">Prévoir</button></a>
                                    <button type="button" id="page2"  class="btn btn-outline-info btn-sm" onclick="Activation(this)">Activer</button>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <img src="images/Page3.JPG" alt="Card image cap" style="border: 3px solid gray;height: 90%;width: 100%;">
                                    <div class="m-t-4" style="float: right;">
                                    <a href="ModelesPages/Modele3.html" onclick="window.open(this.href); return false;">
                                    <button type="button" class="btn btn-outline-secondary btn-sm">Prévoir</button></a>
                                    <button type="button" id="page3" class="btn btn-outline-info btn-sm" onclick="Activation(this)">Activer</button>
                                    </div>
                                </div>                             
                            </div>
                        </div>
                        
                    </div>
                
                </div>

                </div>

                <div class="row">
                <dir class="col-lg-4 col-sm-6 ">
                        <div class="card ">
                            <div class="card-body">
                                <h4 style="color: gray;border-bottom: 1px solid gray">Sections :</h4>
                            <table class="table " >
                              <thead style="background-color: #f0f0f0">
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Titre</th>

                                </tr>
                              </thead>
                              <tbody id="listSection">
                                <tr onclick="SelectLigne(this);" id="Section1">
                                  <th scope="row">1</th>
                                  <td>Section 1</td>
             
                                </tr>
                                <tr onclick="SelectLigne(this);" id="Section2">
                                  <th scope="row">2</th>
                                  <td>Section 2</td>
                                </tr>
                                 <tr onclick="SelectLigne(this);" id="Section3">
                                  <th scope="row">3</th>
                                  <td>Section 3</td>
                                </tr>
                                                       

                            </tbody>
                            </table>
                         
                        </div>


                            
                        </div>
                    </dir>
            
                    <dir class="col-lg-8 col-sm-6 ">
                        <div class="card ">
                            <div class="card-body">
                                <h4 style="color: gray;border-bottom: 1px solid gray">Articles de la section :</h4>
                            <table class="table " >
                              <thead style="background-color: #f2f2f2">
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Titre</th>
                                  
                                </tr>
                              </thead>
                              <tbody id ="listArticle">
                              
                            

                            </tbody>
                            </table>
                            <div style="float: right;margin-top: 15px;" id="AjoutArticleboutton">
                           
                            
                            </div>

                            </div>
                            
                        </div>
                    </dir>

                    
                </div>
                <div id="myModal" class="modal">
                	<div class="modal-content">
                		<div class="row">
                		<div class="col-lg-6 col-sm-6">
                		<div class="card">
                            <div class="card-body">
                                <h4 style="color: gray;border-bottom: 1px solid gray">Articles Non ajoutés :</h4>
                            <table class="table " >
                              <thead style="background-color: #f2f2f2">
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Titre</th>
                                  <th scope="col">NomAuteur</th>
                                  <th scope="col">Date publication</th>
                                </tr>
                              </thead>
                              <tbody  style="overflow-y: auto;overflow-x: hidden;">
                                <?php
                                $i=0;
                                while ($donner = $requet->fetch()) {
                                    
                                ?>
                                <tr onclick="SelectArticle(this)" id=<?php echo "art" . $i;?>>
                                  <th scope="row"><?php echo ++$i; ?></th>
                                  <td><?php echo $donner["titre"]; ?></td>
                                  <td><?php echo $donner["nomAuteur"]; ?></td>
                                  <td><?php echo $donner["dateRedaction"]; ?></td>
                                </tr>
                               <?php
                           }
                           ?>
                                

                            

                            </tbody>
                            </table>


                            </div>
                            
                        </div>
                        </div>
                	
                	<div class="col-lg-6 col-sm-6">
                		<div class="card m-t-0" style="background-color: #F1F1F1">
                            <div class=" card-body">
                                <h4 style="border-bottom: 1px solid gray"><b> Multimédia :</b> </h4>

                                <div class="btn-group-left">
                                    <div class="tab-pane active show" id="home" role="tabpanel">
                                        <div class="p-20">
                                            <div class="row" style="overflow-y: hidden;overflow-x: auto;" >
                                         <?php 
                                                $i=0;
                                                 while ($donner = $resulta->fetch())
                                                {
                                   ?>
                                
                                                <div class="col-sm-3 m-t-5">
                                                <img src= <?php echo $donner["path"] . ".jpg";?> alt="Card image cap" class="defautimg" id=<?php echo "img" .++$i; ?> onclick="imageselect(this);" >
                                                </div>
                                    <?php
                                }
                                ?>
                                           
                                           
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                 

                            </div>
                                
                            
                            
                        </div>
                	</div>
                	</div>
                	<div style="float: right;">
                         <button type="button" id="bntAdd2" class="btn btn-info btn-flat btn-addon m-b-10 m-l-5" ><i class="fa fa-check"></i>Ajouter</button>
                            </div>
                	</div>
                </div>
             
                <!-- End PAge Content -->
            </div>




                
                </div>


              


                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/lib/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="js/lib/html5-editor/bootstrap-wysihtml5.js"></script>
    <script src="js/lib/html5-editor/wysihtml5-init.js"></script>
    <!--Custom JavaScript -->

    <!-- Amchart -->
     <script src="js/lib/morris-chart/raphael-min.js"></script>
    <script src="js/lib/morris-chart/morris.js"></script>
    <script src="js/lib/morris-chart/dashboard1-init.js"></script>
<script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel-init.js"></script>
    <script src="js/scripts.js"></script>
    <!-- scripit init-->

    <script src="js/custom.min.js"></script>
    <script type="text/javascript">
        var articleSelec = [false,false,false,false];

        function choisireArticle()
        {
    	var modal = document.getElementById('myModal');
    	var btn = document.getElementById('bntAdd');
    	var span = document.getElementById('bntAdd2')

    	btn.onclick = function(){
			modal.style.display = "block";
    	}

    	span.onclick = function(){
    		modal.style.display = "none";

    var elemArticl = new Array();
    article = ObjSelec;
    
    n=0;
      for(i=0;i<article.childNodes.length;i++)
      {
         if (article.childNodes[i].nodeName=="TD" || article.childNodes[i].nodeName=="td")
         {
             elemArticl[n] = article.childNodes[i].innerHTML;
             n++;
         }
      }
      encien.className = "griser";
      encien.onclick = "";
      switch (encien.id) {
          case "sec1art1":
              articleSelec[0] = true;
              break;
        case "sec1art2":
              articleSelec[1] = true;
              break;
        case "sec2art1":
              articleSelec[2] = true;
              break;
        case "sec3art1":
              articleSelec[3] = true;
              break;
      
      }

      
      section.push([imgSelect.src,elemArticl,encien.id]);
      





    
    	}

    	window.onclick =function(){
    		if(event.target == modal){
    			modal.style.display = "none";
    		}
    	}
        }

    	var loadFile = function(event) {
		    var output = document.getElementById('photo1');
		    output.src = URL.createObjectURL(event.target.files[0]);
		  };
        function enregistrePage(){
    $.post(PageSelected + '.php',{sec:section},function(data){
        
        $.post('doudi.php',{dat:data,nompg:PageSelected},function(data2){
            alert(data2);
            window.location.href = "telechargement.php";
            

        });


    });

        }
    </script>


</body>
</html>