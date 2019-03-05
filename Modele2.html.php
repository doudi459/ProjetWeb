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
   

    <title>Justified Nav Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="justified-nav.css" rel="stylesheet">
    <script type="text/javascript">
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
$urle ="./bibliotheque/" . sha1_file($_POST['sec'][$i][0]) . ".jpg";
copy($_POST['sec'][$i][0],$urle);
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

    <div class="container">

      <div class="masthead">
        <h3 class="text-muted">Project name</h3>

      </div>

      <!-- Jumbotron -->
      <div class="jumbotron m-t-10" style="background: url(img.jpg);background-repeat: no-repeat;background-size: 100%;color: white">
        <h1>Marketing stuff!</h1>
        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet.</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-4">
          <h2 style="border-bottom: 1px solid gray;color : black;"> Section 1</h2>
          <section>
          <h3 class="sec1art1">Article 1</h3>
          <p class="sec1art1">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          </section>
            <section style="display:one">
            <img class="sec1art1" src="../images/c2.jpg" alt="Card image cap" style="border: 3px solid gray;width: 100%;height: 100%">
            </section>

          <section>
          <h3 class="sec1art2" >Article 2</h3>
          <p class="sec1art2">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          </section>
            <section style="display:one">
            <img class="sec1art2" src="../images/c1.jpg" alt="Card image cap" style="border: 3px solid gray;width: 100%;height: 100%">
            </section>
          
        </div>
        <div class="col-lg-4">
          <h2 style="border-bottom: 1px solid gray;color : black;"> Section 2</h2>
          <section>
          <h3 class="sec2art1" >Heading</h3>
          <p class="sec2art1">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          </section>
          <section style="display:one">
            <img class="sec2art1" src="../images/c2.jpg" alt="Card image cap" style="border: 3px solid gray;width: 100%;height: 100%">
          </section>
       </div>
        <div class="col-lg-4">
          <h2 style="border-bottom: 1px solid gray;color : black;"> Section 3</h2>
          <section style="display:one">
            <img class="sec3art1" src="../images/c1.jpg" alt="Card image cap" style="border: 3px solid gray;width: 100%;height: 100%">
          </section>
          <section>
          <h3 class="sec3art1">Heading</h3>
          <p class="sec3art1">Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
          </section>
        </div>
      </div>

      <!-- Site footer -->
      <footer class="footer">
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



 