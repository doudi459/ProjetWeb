
<?php
session_start();

                            try {
                    $bdd = new PDO('mysql:host=localhost;dbname=cmsbdd' , 'root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                                        }
                                    catch (Exception $e)
                                        {
                                    die('Erreur : ' . $e->getMessage());
                                        }                         
                            

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
          <script type="text/javascript">

ObjSelec = null;





function SelectLigne(obj)
{
 var idLigne=obj.id;
 obj.className="selection";
 
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
var output = document.getElementById('img');

output.src = "uploads/" + document.getElementById(idLigne).childNodes[7].innerHTML;
output.onerror = function() {output.src = "uploads/1.jpg";}

    



}
 
function ConfirmChoix(obj)
{
var objId, elmt, resultat, i, n;
var Tab=new Array();
var msg = "Vous ete sur le point de supprimer cette perssone: ";
var msg2 = "vous ete sur le point de modifier les information de cette perssone: ";
if (ObjSelec != null)
 {
    objId = ObjSelec.id;
   
 if (obj.id =="BNom")
    resultat = window.confirm(msg + "\n Continuer ?");

 if (obj.id == "Bdom")
    resultat = window.confirm(msg2 + "\n Continuer ?");
 
    if (resultat)
    {
      elmt = document.getElementById(objId);                                            // confirmer choix de supression et/ou de modification 
      n=0;
      for(i=0;i<elmt.childNodes.length;i++)
      {
         if (elmt.childNodes[i].nodeName=="TD" || elmt.childNodes[i].nodeName=="td")
         {
             Tab[n] = elmt.childNodes[i].innerHTML;
             n++;
         }
      }
 if (obj.id =="BNom")
     document.location.href="?Email=" + Tab[3];

 if (obj.id == "Bdom")
 {
    document.location.href="?Email=" + Tab[3] + "?Fonction=" + Tab[2] + "?Prenom=" + Tab[1] + "?Nom=" + Tab[0];
         
 }

    }
 }
 else
 {
    alert("Vous n'avez rien sélectionné !!");
 }




}
 
//-->
</script>

<style type="text/css" media="screen">
.defaut{
border-style: solid;
border-color: #AAAAAA;
border-width: 2px;
}
 
.selection{
border-style: solid;
border-color: #AAAAAA;
border-width: 2px;
background-color: #8888DD;
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
                    <h3 class="text-primary">UTILISATEUR</h3> </div>
            </div>
            <!-- End Bread crumb -->
            
            <div class="container-fluid" style="background-color: rgb(30,30,30);">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-lg-8" style="background-color: rgb(30,30,30);" >

                     <div class="row m-t-15" >
                           <div class="col-sm-8">
                           <a href="ajouteruser.php">
                           <button type="button" class="btn btn-info btn-sm">Ajouter user </button>
                           </a>
                           </div>

                           <div class="col-sm-4">
                               <div class="input-group input-group-rounded">
                                               
                                                <input type="text" placeholder="Recherche" name="Search" class="form-control input-sm" required="">
                                               
                                                <button class="btn btn-info btn-group-right btn-sm " type="submit"><i class="ti-search"></i></button>
                               </div>
                           </div>
                    </div>
                     
                       <div class="card" >
                           <div class="card-body" >
                             <table class="table">
                              <thead style="background-color: #f2f2f2 ">
                                <tr>
                                  <th scope="col">Nom</th>
                                  <th scope="col">Prenom</th>
                                  <th scope="col">Fonction</th>
                                  <th scope="col">Email</th>
                                  
                                  
                              </tr>
                          </thead>
                          <tbody>
                          <?php
                                  
                                $rapance= $bdd->query('SELECT * FROM utilisateur');
                                $i=0;
                                
                                                                                                                /*
                                                                                                            romplissage du tableaux

                                                                                                                */
                                while ($donner = $rapance->fetch())
                                {
                                    ?>
                            <tr class="defaut" id=<?php echo "ligne" .$i ; ?> onclick="SelectLigne(this); "  > 
                                <td><?php echo $donner['nom'];?></td> 
                                <td><?php echo $donner['prenom']; ?></td>  
                                <td><?php echo $donner['Fonction']; ?></td>  
                                <td><?php echo $donner['Email']; ?></td>
                            </tr>
                            <?php

                                $i++;
                                }
                                $rapance->closeCursor(); 
                              ?>
                        </tbody>
                      </table> 
                       
                          <div style="float: right;margin-top: 15px;" >
                            <button type="button" id="Bdom"  onclick="ConfirmChoix(this)" class="btn btn-outline-secondary btn-sm">Modifier</button>
                            <button type="button" id="BNom" onclick="ConfirmChoix(this)"  class="btn btn-outline-danger btn-sm">Supprimer</button>
                          </div>
                        
                        
 
                    </div>
                     <?php 
                    if(isset($_GET['Email']) and $_GET['Email'] != "")
                        {
                            
                            
                        $requete = $bdd->prepare('DELETE FROM utilisateur WHERE Email = ? ; ');       /* supression du tableaux */
                        $requete->execute(array($_GET['Email'])); 
                         
                        
                         }

                    if(isset($_GET['Nom']) and $_GET['Nom'] != "" )
                    {}
                         ?>

 
                           <!--end card -->
                       </div>
                       <?php
                     if(isset($_SESSION['ajouteruser']) and $_SESSION['ajouteruser'] == True )
                            {
                                ?>
                                 <script type="text/javascript">
                                 Swal(    'Deleted!',
                                          'Your imaginary file has been deleted.',
                                          'success'
                                        );
                                 </script>
                                 <?php
                                $_SESSION['ajouteruser'] = false;
                            }
                                ?>
                       <!-- end 1st col -->
                    </div>
                    <div class="col-lg-4 ">
                        <div class="card" style="border-bottom: 18px solid #3C8DBC;padding-bottom: 5px">
                           <div class="card-header" style="text-align: center;">
                                <strong class="card-title mb-3">Votre profile</strong>
                            </div>
                            <div class="card-body">
                                
                                <div class="mx-auto d-block m-t-5">
                                    <img class="rounded-circle mx-auto d-block img-responsive" id = "img" src="uploads/1.jpg" alt="Card image cap" style="height: 200px;width: 200px;">
                                    <h5 class="text-sm-center mt-2 mb-1">Steven Lee</h5>
                                    <div class="location text-sm-center"><i class="fa fa-map-marker"></i> California, United States</div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    <a href="#"><i class="fa fa-facebook pr-1"></i></a>
                                    <a href="#"><i class="fa fa-twitter pr-1"></i></a>
                                    <a href="#"><i class="fa fa-linkedin pr-1"></i></a>
                                    <a href="#"><i class="fa fa-pinterest pr-1"></i></a>
                                </div>
                            </div>
                        </div>
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



</body>

</html>