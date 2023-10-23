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

		//DateTime();
		RemoteDb();
		$sql = "select active from config where symbol = 'trade';";
		$rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
		$row=pg_fetch_row($rs);
		$active=$row[0];

		$sql = "select es,nq,tk,smscode,status from control where active<=0;";
		$rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
        $row=pg_fetch_row($rs);
        //$rowcount= pg_num_rows($rs); 
		
		$backup=$row[0];$txt=$row[1];$tk=$row[2];$sms=$row[3];$forcebk=$row[4];

		
		

	?>

	 <h3 class="login1";color:black;">
	<form action="site.php" method="post" top="120px">

		Please Enter 1=enable & 0=Distable backup:
			<input type="text" size=2 name="backup" value="<?=$backup?>"><br>
		Enter 0=Enable & 1=Disable SMS Text Alert: 
			<input type="text" size=5 name="sms" value="<?=$sms?>"><br>

		Enter 1=active & 0=Inactive.  [Must 1 for working]: 
			<input type="text" size=2 name="active" value="<?=$active?>"><br>

		Enter 1=Need New Token default=0:
			<input type="text" size=2 name="tk" value="<?=$tk?>"><br>

		Enter 1= force backup run: 
			<input type="text" size=2 name="forcebk" value="<?=$forcebk?>"><br><br>

		
		<input type="submit"> <input type="submit" name="quit" value="Return">
	</form>
	<br>

    <?php


	if (isset($_POST['backup']))
    {
		$backup=$_POST['backup'];
		$sms=$_POST['sms'];
		$active=$_POST['active'];
		$tk=$_POST['tk'];
		$forcebk=$_POST['forcebk'];

		if ($backup==0) # disable backup
		{
			$forcebk=2;
		}
		else 
		{
			if ($forcebk==2)
			{
				$forcebk=0;
			}
			else 
			{
				$forcebk=$_POST['forcebk'];
			}

		}



		
		//print $equd ."sdsdsd" .$sl1;
		$sql = "update config set active=$active where symbol = 'trade';";
		$rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 

		$sql = "update control set es=$backup,nq=$txt,tk=$tk,smscode=$sms,status=$forcebk;";
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