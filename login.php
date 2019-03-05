<?php
session_start()
?>


<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Ela - Bootstrap Admin Dashboard Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar mini-sidebar" style="background-color: rgb(70,70,70);background:url(notebook.jpg) no-repeat;background-size:cover
;">

    <!-- Main wrapper  -->
    <div id="main-wrapper">

        <div class="unix-login" >
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4" >
                        <div class="login-content card"  style="background-color: rgba(0,30,30,0.5);">
                            <div class="login-form" style="background-color: rgb(0,30,30);" >
                                <h4>S'authentifier</h4>
                                <?php
                                    $bool = False;
                                if (isset($_POST['email']) and isset($_POST['Password']))
                                {
                                    try {
                                $bdd = new PDO('mysql:host=localhost;dbname=cmsbdd' , 'root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                                        }
                                    catch (Exception $e)
                                        {
                                    die('Erreur : ' . $e->getMessage());
                                        }

                                    $requete = $bdd->prepare('SELECT * From utilisateur where Email = ? and  password = ? ; ');

                                    $repance=$requete->execute(array($_POST['email'],$_POST['Password']));
                                    $nomb=$requete->rowCount();
                                    
                                    
                                    if($nomb == 0)
                                        $bool = True;
                                    else
                                        {
                                        $valeur = $requete->fetch();
                                        $_SESSION['nom'] = $valeur['nom'];
                                        $_SESSION['prenom'] = $valeur['prenom'];
                                        $_SESSION['email'] = $valeur['Email'];
                                        $_SESSION['fonction'] = $valeur['Fonction'];
                                        $_SESSION['img'] = $valeur['img'];

                                        header('Location: index.php');
                                    }
                                }
                                
                                ?>
                                <form action="login.php"   method="post" >
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input type="email" class="form-control" placeholder="Email"  name = "email">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password" name= "Password">
                                    </div>
                               
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Se connecter</button>
                                
                                </form>
                                <?php 
                                if ($bool)
                                {
                                ?>
                                <p style="color: red"> MOTE DE PASSE OU EMAIL INCORECT</p>
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
    <script src="js/custom.min.js"></script>



</body>

</html>