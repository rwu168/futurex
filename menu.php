<!DOCTYPE html>
<html>
<head>
<body>
<?php
		error_reporting(E_ERROR | E_PARSE);
		$email=$_GET['email'];
		$ph=$_GET['password'];
		$ecode=$_GET['ecode'];
		//echo "     dsdsdsds" .$ecode .$email .$ph;
	?>
	</body>
<style>body {font-family: Arial, Helvetica, sans-serif; font-size: 15px;}</style>
<!link rel="stylesheet" type="text/css" href="css/basic.css" />
<body style="font-family: Arial, Helvetica, sans-serif; color: Blue; background-color: white;">
<form id="myform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
<!h2 style="background-color: white; "</h2>
<title>HTML <td> bgcolor Attribute</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/510/fabric.min.js"></script>



<style>

 
form { 
  display: block;
  margin-top: 0em;
  margin-left: 0em;
}


.login1 {
  position: fixed;
  width: 100px;
  margin: auto;
  height: 200px;
  width: 20%;
  background-color: lightgrey;
  border: 3px solid #73AD21;
  color: black;
}

</style>

<body>
	
	
	 <h3 class="login1";color:black;">
	<form action="site.php" method="post" top="120px">
		
		1) Support & resistence <br>
		2) Start, Stop & Backup<br>
		3) Config Data<br>
		4) Client Data<br><br>

		Enter option # above: <input type="text" size=1 name="select">
		<input type="submit" name="submit"<br><br>
	</form>
	<br>

    <?php

	$select=$_POST['select'];

	if (isset($_POST['select']))
	{
			if ($select==1)
			{
					$url=$url ."sr.php?";
					header("Location: $url");
			}
			else if ($select==2)
			{
				$url=$url ."startstop.php?";
				header("Location: $url");
			}
			else if ($select==3)
			{
				$url=$url ."config.php?";
				header("Location: $url");
			}
			else if ($select==4)
			{

			?>
				<h3 class="login1";color:black;">
				<form action="cd.php?name=$_POST['name']" method="post" top="120px">
					Name: <input type="text" size=10 name="name">
					<input type="submit" name="submit"<br><br>
				</form>
			<?php
				
		}
	}
	
	?>
	

	</h3>
	</body>
	</html>