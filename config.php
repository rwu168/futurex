﻿<!DOCTYPE html>
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

 //   body {
 // background-image: url("htech1.png");
 // background-color: lightgrey;
}


form { 
  display: block;
  margin-top: 0em;
  margin-left: 0em;
}


.login1 {
  position: fixed;
  width: 400px;
  margin: auto;
  height: 400px;
  width: 80%;
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

		RemoteDb();
		
		$sql = "select mkt_cond,sprice,spriceout,spricesell,spriceselldown,spricebuy,spricebuydown,smy,nobuy,buysell,nsmy from config where symbol = 'trade';";
		$rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
        $row=pg_fetch_row($rs);
		$mkt_cond=$row[0];$sprice=$row[1];$spriceout=$row[2];$spricesell=$row[3];$spriceselldown=$row[4];$spricebuy=$row[5];$spricebuydown=$row[6];$smy=$row[7];$nobuy=$row[8];$buysell=$row[9];$nsmy=$row[10];

		$trade10=0;$m2k=0;
		$smscode=0;$legs=0;

	?>

	 <h3 class="login1";color:black;">
	<form action="site.php" method="post" top="120px">

		**Mkt_Condition default=0:
			<input type="text" size=2 name="mkt_cond" value="<?=$mkt_cond?>"><br>

		Month&Year Symbol like M23 etc... Required:
			<input type="text" size=2 name="smy" value="<?=$smy?>">
			Back Month<input type="text" size=2 name="nsmy" value="<?=$nsmy?>"><br>

		Buying Range default=0 (0,35): 
			<input type="text" size=5 name="sprice" value="<?=$sprice?>"><br>

		*Sellying Range:(35,70):
			<input type="text" size=2 name="spriceout" value="<?=$spriceout?>"><br>

		Not Use(spricesell):
			<input type="text" size=2 name="spricesell" value="<?=$spricesell?>"><br><br>

		Not Use:
			<input type="text" size=2 name="spriceselldown" value="<?=$spriceselldown?>"><br>

		No Use:
			<input type="text" size=2 name="spricebuy" value="<?=$spricebuy?>"><br>

		Not USe:
			<input type="text" size=2 name="spricebuydown" value="<?=$spricebuydown?>"><br>

		Not Use:
			<input type="text" size=2 name="nobuy" value="<?=$nobuy?>"><br>

		*Set buy for trade25(MNQ) Mkt_Condition(default=0):
			<input type="text" size=2 name="trade10" value="<?=$trade10?>">
		 Auto (1=disable & 0=enable):
			<input type="text" size=2 name="m2k" value="<?=$m2k?>"><br><br>

		*Wave buy for (MES) Mkt_Condition(default=0):
			<input type="text" size=2 name="smscode" value="<?=$smscode?>">
		 Auto (1=disable & 0=enable):
			<input type="text" size=2 name="legs" value="<?=$legs?>"><br><br>

		

		<input type="submit" name="quit" value="Save">
	</form>
	<br>

    <?php

	if (isset($_POST['mkt_cond']))
    {
		$mkt_cond=$_POST['mkt_cond'];
		$smy=strval($_POST['smy']);
		$nsmy=strval($_POST['nsmy']);
		$sprice=$_POST['sprice'];
		$spriceout=$_POST['spriceout'];
		$spricesellk=$_POST['spricesell'];
		$spriceselldown=$_POST['spriceselldown'];
		$spricebuy=$_POST['spricebuy'];
		$spricebuydown=$_POST['spricebuydown'];
		$nobuy=strval($_POST['nobuy']);
		$trade10=$_POST['trade10'];
		$m2k=$_POST['m2k'];
		$legs=$_POST['legs'];
		$smscode=$_POST['smscode'];


		
		//print $mkt_cond ."sdsdsd" .$smy;
		$sql = "update config set mkt_cond=$mkt_cond,sprice=$sprice,spriceout=$spriceout,spricesell=$spricesell,spriceselldown=$spriceselldown,spricebuy=$spricebuy,spricebuydown=$spricebuydown,smy='$smy',nsmy='$nsmy',nobuy='$nobuy' where symbol='trade';";
		$rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 

		if ($trade10>0)
		{
			$sql = "update control set mkt_cond=$trade10,m2k=$m2k where sprice=25 and sys!='test';";
			$rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
			pg_query("COMMIT") or die("Transaction commit failed\n");
		}
		
		if ($smscode>0)
		{
			$sql = "update control set legs=$legs,smscode=$smscode where s2='w';";
			$rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
			pg_query("COMMIT") or die("Transaction commit failed\n");
		}


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
	