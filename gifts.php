<?php
session_start();
include 'config.php';
if ($_SESSION['login']==true){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href='gifts.php'>هدايا</a></li>
            <li><a href='logout.php' class="btn btn-danger">logout</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  	<div class="container">
  		<div class="row">
  			<?php
  			$result = "SELECT * FROM `gifts`";
  			$query = mysqli_query($link,$result);
  			while ($show = mysqli_fetch_array($query)) {
  				echo "<div class='col-lg-4 col-md-6 col-sm-12'>";
  				echo "<img src='http://localhost/Ashq/images/".$show['image']."' class='img-responsive'/>";
  				echo "<h3>".$show['name']."</h3>";
  				echo "<h4 style='word-wrap:break-word;'>".$show['details']."</h4>";
  				echo "<a href='javascript:;' class='btn btn-success' style='margin-right:5px;'>Buy</a>";
  				echo "<a href='javascript:;' class='btn btn-info'>Details</a>";
  				echo '</div>';
  			}
  			?>
  			
  		</div>
  	</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php
}else{
	header("LOCATION: login.php");
}
?>