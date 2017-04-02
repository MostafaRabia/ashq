<?php
session_start();
include 'config.php';
if (isset($_POST['submit'])){
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars(sha1(md5($_POST['password'])));
	if (!$username||!$password){
		echo '<p class="text-danger">You must complete form</p>';
	}else{
		$result = "SELECT * FROM `login_reg` WHERE `username`='$username' AND `password`='$password'";
		$query = mysqli_query($link,$result);
		$rows = mysqli_num_rows($query);
		if ($rows>0){
			$_SESSION['login'] = true;
			header("LOCATION: index.php");
		}
	}
}
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
  	<form action="login.php" method="post">
  	  <div class="form-group">
	    <label for="exampleInputEmail1">Username</label>
	    <input type="text" class="form-control" name='username' id="exampleInputEmail1" placeholder="Username">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Password</label>
	    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
	  </div>
	  <button type="submit" class="btn btn-default" name="submit">Submit</button>
	</form>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
