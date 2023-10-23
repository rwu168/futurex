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
  width: 40%;
  background-color: lightgrey;
  border: 3px solid #73AD21;
  color: black;
}

</style>

<body>
	
	<?php
        /*=================date & time function=========================*/
        function DateTime()
        {   
           global $today,$day,$time,$cm,$cy;


		    $today = date('Y-m-d');
            $day=date('l', strtotime($today));
            $cm=date('m');
            $cy=date('y');
            //print "<br><br> <br>dsfsdfsdddddddddddddddddddddddddddddddddddddddddddddddddddddfdfsdfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff" .$day;

		    //print "<p><b>Today is $today </b></p>";

		    $time = date('h:g:s');
		    //echo "<p><b>and the Time is $time </b></p>";

        }


	/*====================open postgresql database================================*/
        function RemoteDb()
        {
            global $conn;

            $conn = pg_connect("host=db-postgresql-sfo3-13662-do-user-8718724-0.b.db.ondigitalocean.com  
                port=25060
                dbname=defaultdb
                user=doadmin  
                password=daezjaybtk964jyw"); 
            if (!$conn) 
            {
	            die('Could not connect to Cloud server! ');
            }
        }

    ?>

	<?php 

		DateTime();
		RemoteDb();
		$sql = "select equd,sl1,sl2,sl3,rl1,rl2,rl3,eq from priceaction where symbol='ES';";
		$rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
        $row=pg_fetch_row($rs);
        $rowcount= pg_num_rows($rs); 
		$equd=$row[0];$sl1=$row[1];$sl2=$row[2];$sl3=$row[3];$rl1=$row[4];$rl2=$row[5];$rl3=$row[6];$eq=$row[7];
	
	?>

	 <h3 class="login1";color:black;">
	<form action="site.php" method="post" top="120px">

		Please enter Enable=1 and Disable=0:
			<input type="text" size=2 name="equd" value="<?=$equd?>"><br>
		Enter Equilibrum: 
			<input type="text" size=5 name="eq" value="<?=$eq?>"><br>

		Enter Support Level1, 2 & 3: 
			<input type="text" size=5 name="sl1" value="<?=$sl1?>">
			<input type="text" size=5 name="sl2" value="<?=$sl2?>">
			<input type="text" size=5 name="sl3" value="<?=$sl3?>"><br>
		Enter Resistance Level1, 2 & 3: 
			<input type="text" size=5 name="rl1" value="<?=$rl1?>">
			<input type="text" size=5 name="rl2" value="<?=$rl2?>">
			<input type="text" size=5 name="rl3" value="<?=$rl3?>">
		
		<input type="submit"> <input type="submit" name="quit" value="Return">
	</form>
	<br>

    <?php

	if (isset($_POST['equd']))
    {
		$equd=$_POST['equd'];
		$eq=$_POST['eq'];
		$sl1=$_POST['sl1'];
		$sl2=$_POST['sl2'];
		$sl3=$_POST['sl3'];
		$rl1=$_POST['rl1'];
		$rl2=$_POST['rl2'];
		$rl3=$_POST['rl3'];
		
		//print $equd ."sdsdsd" .$sl1;
		$sql = "UPDATE priceaction SET equd=$equd,eq=$eq,sl1=$sl1,sl2=$sl2,sl3=$sl3,rl1=$rl1,rl2=$rl2,rl3=$rl3;";
        $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
	    pg_query("COMMIT") or die("Transaction commit failed\n");
		
		

		header("Refresh:0");
	}

	if (isset($_POST['quit']))
	{
			$url=$url ."menu.php";
            header("Location: $url");
	}
	?>
	

	</h3>
	</body>
	</html>