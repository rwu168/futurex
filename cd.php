<!DOCTYPE html>
<html>
<head>
<body>

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
  width: 700px;
  margin: auto;
  height: 500px;
  width: 95%;
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
				//print($name ."dsdsds" .$_POST['name'];
				//$name=@$_POST['name'];
				session_start(); 
				if(isset($_POST['name'])) 
				{ 
					$_SESSION['name'] = serialize($_POST['name']);
					$name=$_POST['name'];
				} 
				if(isset($_SESSION['name'])) 
				{ 
				$name = unserialize($_SESSION['name']); 
				} 
				$sql = "select mkt_cond,spriceout,spriceselldown,micro,contracts,ph,trade,amt,active,email,ym,seccont,qty,smscode,tk,secbuy,rpl,buyl3,selll3,sprice,mmy,flag2,pw,nq,shprice,shbuy,shqty,shlevel from control where sys='$name';";
				$rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
				$row=pg_fetch_row($rs);
				$mkt_cond=$row[0];$spriceout=$row[1];$spriceselldown=$row[2];$micro=$row[3];$contracts=$row[4];$ph=$row[5];$trade=$row[6];$amt=$row[7];$active=$row[8];$email=$row[9];$ym=$row[10];$seccont=$row[11];$qty=$row[12];$smscode=$row[13];$tk=$row[14];$secbuy=$row[15];$rpl=$row[16];$buyl3=$row[17];$selll3=$row[18];$sprice=$row[19];$mmy=$row[20];$flag2=$row[21];$pw=$row[22];$nq=$row[23];$shprice=$row[24];$shbuy=$row[25];$shqty=$row[26];$shlevel=$row[27];
			
	
	?>

				<h3 class="login1";color:black;">
				<form action="menu.php" method="post" top="120px">
				
					Name: <input readonly type="text" size=10 name="name" value="<?=$name?>">

					WebAcctStatus(0=live, -2=web test, -3=self test):
					<input type="text" size=2 name="flag2" value="<?=$flag2?>"><br><br>

					**Mkt_Condition:
					<input type="text" size=5 name="mkt_cond" value="<?=$mkt_cond?>">

					Trade Micro (y/n):
					<input type="text" size=2 name="micro" value="<?=$micro?>"><br>

					Number of Contracts:
					<input type="text" size=2 name="contracts" value="<?=$contracts?>">

					Cell Phone #: 
					<input type="text" size=15 name="ph" value="<?=$ph?>"><br>

					Brokerage Firm like td,ts,cs etc...(td):
					<input type="text" size=2 name="trade" value="<?=$trade?>">

					Password for Web:
					<input type="text" size=2 name="pw" value="<?=$pw?>"><br><br>

					*Buying Range:(0,35,70)'):
					<input type="text" size=2 name="sprice" value="<?=$sprice?>">

					*Sellying Range:(0,20,70)'):
					<input type="text" size=2 name="spriceout" value="<?=$spriceout?>">

					*Sell when market BackDown to this point:
					<input type="text" size=2 name="spriceselldown" value="<?=$spriceselldown?>"><br><br>

					Investment Amount:
					<input type="text" size=10 name="amt" value="<?=$amt?>">

					Active (0=enable):
					<input type="text" size=2 name="active" value="<?=$active?>"><br>

					Email:
					<input type="text" size=20 name="email" value="<?=$email?>">

					Level Two trading Range(Top to bottom), 0=level one:
					<input type="text" size=2 name="ym" value="<?=$ym?>"><br>

					Second contracts:
					<input type="text" size=2 name="seccont" value="<?=$seccont?>">

					Total Positions:
					<input type="text" size=2 name="qty" value="<?=$qty?>"><br><br>

					Enter SMSCode for StreetSmart:
					<input type="text" size=2 name="smscode" value="<?=$smscode?>">

					New Token (default=0):
					<input type="text" size=2 name="tk" value="<?=$tk?>"><br>
				
					My rate:
					<input type="text" size=2 name="mmy" value="<?=$mmy?>">

					No Buy after sold(1= yes & 0=use default):
					<input type="text" size=2 name="secbuy" value="<?=$secbuy?>"><br><br>
					
					Risk Level(0-10):
					<input type="text" size=2 name="shlevel" value="<?=$shlevel?>"><br>

					Short to cover long risk(Enter first field only): 
					<input type="text" size=2 name="shprice" value="<?=$shprice?>">
					at:  <input type="text" size=2 name="shbuy" value="<?=$shbuy?>">	
					qty: <input type="text" size=2 name="shqty" value="<?=$shqty?>"><br><br>

					Lvl3 BuySell 0=disable/ -1=buy & needs all 3 fields] :
					<input type="text" size=2 name="rpl" value="<?=$rpl?>">
					Buy: <input type="text" size=2 name="buyl3" value="<?=$buyl3?>">
					Sell:<input type="text" size=2 name="selll3" value="<?=$selll3?>"><br><br>

					<input type="submit"> <input type="submit" name="quit" value="Return">
			</form>
			<br>



    <?php

	if (isset($_POST['mkt_cond']))
    {
		//print "dsdsdsdsd111" .$name .$mkt_cond .$flag2."<br>";
		$name=$_POST['name'];
		$flag2=$_POST['flag2'];
		$mkt_cond=$_POST['mkt_cond'];
		$micro=strval($_POST['micro']);
		$contracts=$_POST['contracts'];
		$ph=$_POST['ph'];
		$trade=$_POST['trade'];
		$sprice=$_POST['sprice'];
		$spriceout=$_POST['spriceout'];
		$spriceselldown=$_POST['spriceselldown'];
		$amt=$_POST['amt'];
		$active=$_POST['active'];
		$email=$_POST['email'];
		$ym=$_POST['ym'];
		$seccont=$_POST['seccont'];
		$qty=$_POST['qty'];
		$smscode=$_POST['smscode'];
		$tk=$_POST['tk'];
		$rpl=$_POST['rpl'];
		$buyl3=$_POST['buyl3'];
		$selll3=$_POST['selll3'];
		$mmy=$_POST['mmy'];
		$pw=$_POST['pw'];
		$shprice=$_POST['shprice'];
		$shlevel=$_POST['shlevel'];
		$secbuy=$_POST['secbuy'];
		


		
		$sql = "update control set mkt_cond=$mkt_cond,micro='$micro',contracts=$contracts,ph='$ph',trade='$trade',spriceselldown=$spriceselldown,spriceout=$spriceout,amt=$amt,email='$email',ym=$ym,seccont=$seccont,qty=$qty,smscode=$smscode,active=$active,tk=$tk,secbuy=$secbuy,rpl=$rpl,buyl3=$buyl3,selll3=$selll3,legs=1,sprice=$sprice,mmy=$mmy,flag2=$flag2,pw=$pw,shprice=$shprice,shlevel=$shlevel where sys='$name';";
		//$sql = "update control set smscode=$smscode,active=$active,tk=$tk,secbuy=$secbuy,rpl=$rpl,buyl3=$buyl3,selll3=$selll3,legs=1,sprice=$sprice,mmy=$mmy,flag2=$flag2 where sys='$name';";
		$rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
		pg_query("COMMIT") or die("Transaction commit failed\n");
		
		//$url="cd.php?name=$name";
		//header("refresh:0; url={$url}");
		header("refresh:0");
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
	