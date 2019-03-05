<?php


                   
                             try {
                    $bdd = new PDO('mysql:host=sql105.epizy.com;dbname=epiz_22036246_CMS_BDD' , 'epiz_22036246','KNYrcBfNYin5', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                                        }
                                    catch (Exception $e)
                                        {
                                    die('Erreur : ' . $e->getMessage());
                                        }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title id="nomPage">Page1</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
    <script type="text/javascript" src="dist/js/bootstrap.js"></script>
    <script type="text/javascript" >
    window.onload = function () {
<?php
  if(isset($_POST['sec']))
{
  $i=0;
  while ($i < count($_POST["sec"]) ) {
      
  if(isset($_POST['sec'][$i][1]) and isset($_POST['sec'][$i][0]))
  {
$requete=$bdd->prepare("SELECT Num,contenu From article where titre =? and nomAuteur =? and dateRedaction =?");
$requete->execute($_POST['sec'][$i][1]);
$donner=$requete->fetch();
$urle ="bibliotheque/" . sha1_file($_POST['sec'][$i][0]) . ".jpg";
copy($_POST['sec'][$i][0],"Modeleutilisateur/" . $urle);
}

?>
      
        var classe = '<?php echo $_POST['sec'][$i][2]; ?>';

      elem=document.getElementsByClassName(classe)[0];
      elem1=document.getElementsByClassName(classe)[1];
      elem2=document.getElementsByClassName(classe)[2];


      if(elem.nodeName =="img" || elem.nodeName =="IMG")
      {
      elem.src = '<?php echo $urle ; ?>';
      elem1.innerHTML = '<?php echo $_POST['sec'][$i][1][0]; ?>';
      elem2.innerHTML = '<?php echo $donner['contenu'] ; ?>';
      }
      else{
      elem.innerHTML = '<?php echo $_POST['sec'][$i][1][0]; ?>';
      elem1.innerHTML = '<?php echo $donner['contenu'] ; ?>';
      elem2.src = '<?php echo $urle ; ?>';
    }
      


      
   
       <?php
       $i++;
     }

   }

     ?>

}
      
    </script>

 
  </head>

  <body>

    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
      <a class="navbar-brand" href="#">Navbar</a>

    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-3" id="title">Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->

        <div class="card" id="section1">  
         <div class="card-header">
          <h2> Section 1</h2>
        </div>  
        <div class="card-body p-4">
          <div class="row ">
        <div class="col-md-6 ">
          <article>
          <h3 class="sec1art1">Article 1</h3>
          <p class="sec1art1">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          
        </article>
        </div>
        
        <div class="col-md-6" style="display:one">

         <img class="sec1art1" src="../images/c1.jpg" alt="Card image cap" style="border: 3px solid gray;float: right;height:90%;width=90%" >
       </div>
        
        <div class="col-md-6" style="display:none">
        </div>
              
        <div class="col-md-6">
          <article>
          <h3 class="sec1art2">Article 2</h3>
          <p class="sec1art2">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          
        </article>
       </div>
         <div class="col-md-6" style="display:one">
         <img class="sec1art2" src="../images/c3.jpg" alt="Card image cap" style="border: 3px solid gray;float: right;height:90%;width=90%" >
       </div>
      </div>
      </div>

      </div>

      <br>

        <div class="card " id="section2"> 
        <div class="card-header">
          <h2 > Section 2</h2>
        </div>  
        <div class="card-body p-4">       
          <div class="row ">
        <div class="col-md-6">
          <article>
          <h3 class="sec2art1">Article 3</h3>
          <p class="sec2art1">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          
        </article>
       </div>
       <div class="col-md-6" style="display:one">
         <img class="sec2art1" src="../images/c2.jpg" alt="Card image cap" style="border: 3px solid gray;float: right;height:90%;width=90%">
       </div>
      </div>
      </div>


    </div>
  

     <br>

        <div class="card " id="section3"> 
        <div class="card-header">
          <h2 > Section 3</h2>
        </div>  
        <div class="card-body p-4">      
          <div class="row ">
         <div class="col-md-6" style="display:one">
         <img class="sec3art1" src="../images/c2.jpg" alt="Card image cap" style="border: 3px solid gray;float: left;height:90%;width=90%">
       </div>
        <div class="col-md-6">
          <article>
          <h2 class="sec3art1">Article 4</h2>
          <p class="sec3art1">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          
        </article>
       </div>

      </div>
      </div>


    </div>
 

      <hr>

      <footer>
        <p>&copy; Company 2017</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
