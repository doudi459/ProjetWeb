
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
  

    <title>Off Canvas Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
  <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="offcanvas.css" rel="stylesheet">
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

  <body><div class="container">
<div class="row row-offcanvas row-offcanvas-right">
<div class="col-12 col-md-9">
<p class="float-right hidden-md-up"><button class="btn btn-primary btn-sm" type="button" data-toggle="offcanvas">Toggle nav</button></p>
<div class="jumbotron">
<h1>Hello, world!</h1>
<p>This is an example to show the potential of an offcanvas layout pattern in Bootstrap. Try some responsive-range viewport sizes to see it in action.</p>
</div>
<div class="row">
<div class="col-6 col-lg-4">
<h2 class="sec1art1">Article 1</h2>
<p class="sec1art1">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
</div>
<!--/span-->
<div class="col-6 col-lg-4">
<h2 class="sec2art1">Article 2</h2>
<p class="sec2art1">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
</div>
<!--/span-->
<div class="col-6 col-lg-4">
<h2 class="sec3art1">Article 3</h2>
<p class="sec3art1">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
</div>
<!--/span--></div>
<div class="row">
<div class="col-6 col-lg-4" style="display: one;"><img class="sec1art1" style="border: 3px solid gray; width: 100%; height: 100%;" src="../images/c1.jpg" alt="Card image cap" /></div>
<!--/span-->
<div class="col-6 col-lg-4" style="display: one;"><img class="sec2art1"style="border: 3px solid gray; width: 100%; height: 100%;" src="../images/c1.jpg" alt="Card image cap" /></div>
<!--/span-->
<div class="col-6 col-lg-4" style="display: one;"><img class="sec3art1" style="border: 3px solid gray; width: 100%; height: 100%;" src="../images/c1.jpg" alt="Card image cap" /></div>
<!--/span--></div>
<!--/row--></div>
<!--/span-->
<div id="sidebar" class="col-6 col-md-3 sidebar-offcanvas">
<div class="list-group"><a class="list-group-item active" href="#">Link</a> <a class="list-group-item" href="#">Link</a> <a class="list-group-item" href="#">Link</a> <a class="list-group-item" href="#">Link</a> <a class="list-group-item" href="#">Link</a> <a class="list-group-item" href="#">Link</a> <a class="list-group-item" href="#">Link</a> <a class="list-group-item" href="#">Link</a> <a class="list-group-item" href="#">Link</a> <a class="list-group-item" href="#">Link</a></div>
</div>
<!--/span--></div>
<!--/row--><hr />
<p>&copy; Company 2017</p>
</div>
<!--/.container--><!-- Bootstrap core JavaScript
    ================================================== --><!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script type="text/javascript">// <![CDATA[
window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')
// ]]></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script type="text/javascript" src="assets/js/ie10-viewport-bug-workaround.js"></script>
<script type="text/javascript" src="offcanvas.js"></script></body>
</html>
