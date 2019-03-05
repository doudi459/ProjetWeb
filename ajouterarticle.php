
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
<html>
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Ela - Bootstrap Admin Dashboard Template</title>
  
    <link href="css/editor.css" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="css/lib/html5-editor/bootstrap-wysihtml5.css" />
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link herf="css/doudi.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style type="text/css">
      .page-wrapper{
       background-color: #e6e6e6;
    }
    </style>
    <script type="text/javascript">
var loadFile = function(event) {
            var output = document.getElementById('photo');
            output.src = URL.createObjectURL(event.target.files[0]);
          };
function post(){
    var i = 0;
    var LesLien = new Array();
    var LesCat = new  Array();
    var LesMotCle = new  Array();
    var values= $('#txtedit').Editor('getText');
    var titre = $('#titre').val();
   $('#listeLien').children('li').each( function(){

      LesLien[i] =$(this).text();
      i++;
  });
 i = 0;
   $('#listeCategorie').children('li').each( function(){

      LesCat[i] =$(this).text();
      i++;
  });
 i = 0;
   $('#listeMotCle').children('li').each( function(){

      LesMotCle[i] =$(this).text();
      i++;
  });

    $.post('AjouterArticleBDD.php',{Text:values,liens:LesLien,categories:LesCat,MotCles:LesMotCle,titr:titre},
        function(data)
        {
  Swal(
      'Ajouter Article!',
      'votre Article a été coréctement ajouter. ',
      'success'
    );

   $('#txtedit').Editor('setText',"");
   $('#titre').val("");

});

    
  }

    function add(obj)
    {
        alert(obj.id);
        switch (obj.id)
        {
            case "addLien":
          var div2  = document.getElementById("lien");
          
          var para = document.createElement("li");

          var node = document.createTextNode(div2.value);
            para.appendChild(node);

          var element = document.getElementById("listeLien");
            element.appendChild(para);
            div2.value = ""
                break;
            case "addCategorie":
          var div2  = document.getElementById("categorie");
          
          var para = document.createElement("li");

          var node = document.createTextNode(div2.value);
            para.appendChild(node);

          var element = document.getElementById("listeCategorie");
            element.appendChild(para);
            div2.value = ""
                break; 
            case "addMotCle":
          var div2  = document.getElementById("motCl");
          
          var para = document.createElement("li");

          var node = document.createTextNode(div2.value);
            para.appendChild(node);

          var element = document.getElementById("listeMotCle");
            element.appendChild(para);
            div2.value = ""
                break;

        } 


    }
    </script>

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
                    <h3 class="text-primary">Nouveau Article</h3> </div>
            </div>
            <!-- End Bread crumb -->
            
            <div class="container-fluid" style="background-color:  rgb(30,30,30);">
                
                <div class="row "  style="background-color:  rgb(30,30,30);">
                    
    <form action="AjouterArticleBDD.php" id="forme">           
        <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    
                        
                    
                    <div class="col-lg-8 col-sm-8">
                        <input type="text" class="form-control input-rounded" id="titre" placeholder="Entrez le titre ici">
                        
                    
                        <div class="card" id="car">
                            <div class="card-body">
                                <h4 class="card-title" style="border-bottom: 1px solid gray">Article</h4>
                                
                                    <div class="form-group ">
                                        <div class="form-control" id ="txtedit" name="txtedit"  placeholder="Enter text ..." 
                                        style="height:450px"></div>
                                        

                                    </div>
                                

                            </div>
                            <button type="button" class="btn btn-success btn-rounded" name = "doudi" id = "doudi" style="color : black;font-size:20px;" onclick="post();">Enregistrer</button>
                        </div>
                    
                    </div>

                    <div class="col-lg-4 col-sm-4">
                        <div class="card m-t-0">
                                <div class="card-body" >
                                    
                                    <h4 style="border-bottom: 1px solid gray"><b> Liens :</b> </h4>
                                    <ul id="listeLien">
                                        
                                    </ul>
                                    <hr>
                               <div class="input-group input-group-rounded">
                                               
                                 <input type="text" placeholder="Entrez un lien ici" id="lien" class="form-control input-sm">
                                 <button class="btn btn-info btn-group-right btn-sm " type="button" id="addLien" onclick="add(this)"><i class="fa fa-check"></i></button>
                               </div>
                                
                                </div>
                        </div>        
                    
                    <div class=" card ">
                        <div class="card-body">
                            <h4 style="border-bottom: 1px solid gray"><b> Mots clés :</b> </h4>
                                
                                    <ul id="listeMotCle">
                                        

                                    </ul>
                                    <hr>
                               <div class="input-group input-group-rounded">
                                               
                                 <input type="text" placeholder=" mot clé " id="motCl" class="form-control input-sm">
                                 <button class="btn btn-info btn-group-right btn-sm " type="button" id="addMotCle" onclick="add(this)"><i class="fa fa-check"></i></button>
                               </div>

                        </div>
                    </div>
                       <div class=" card ">
                        <div class="card-body">
                            <h4 style="border-bottom: 1px solid gray"><b> Catégories :</b> </h4>
                                    <ul id="listeCategorie">
                                        
                                    </ul>
                                    <hr>
                               <div class="input-group input-group-rounded">
                                               
                                 <input type="text" placeholder=" catégorie " id="categorie" class="form-control input-sm">
                                 <button class="btn btn-info btn-group-right btn-sm " type="button" id="addCategorie"
                               onclick="add(this);" ><i class="fa fa-check"></i></button>
                               </div>

                        </div>
                    </div>


                      <!--end col -->  
                    </div>
                
                </form>
                    
                </div><!-- End PAge Content -->
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
    <<script src="jquery.js" type="text/javascript"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->

    <script src="editor.js"></script>
    <script>
    $('#txtedit').Editor();
    </script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="js/lib/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="js/lib/html5-editor/bootstrap-wysihtml5.js"></script>
    <script src="js/lib/html5-editor/wysihtml5-init.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>


</body>

</html>