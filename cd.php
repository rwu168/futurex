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
  height: 600px;
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
				$sql = "select mkt_cond,spriceout,spriceselldown,micro,contracts,ph,trade,amt,active,email,m2k,seccontqty,qty,smscode,tk,secbuy,rpl,buyl3,selll3,sprice,mmy,flag2,pw,nq,shprice,shbuy,shqty,shlevel,rty,seccont1qty,reserve,s2,s1 from control where sys='$name';";
				$rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
				$row=pg_fetch_row($rs);
				pg_query("COMMIT") or die("Transaction commit failed\n");
				$mkt_cond=$row[0];$spriceout=$row[1];$spriceselldown=$row[2];$micro=$row[3];$contracts=$row[4];$ph=$row[5];$trade=$row[6];$amt=$row[7];$active=$row[8];$email=$row[9];$m2k=$row[10];$seccontqty=$row[11];$qty=$row[12];$smscode=$row[13];$tk=$row[14];$secbuy=$row[15];$rpl=$row[16];$buyl3=$row[17];$selll3=$row[18];$sprice=$row[19];$mmy=$row[20];$flag2=$row[21];$pw=$row[22];$nq=$row[23];$shprice=$row[24];$shbuy=$row[25];$shqty=$row[26];$shlevel=$row[27];$rty=$row[28];$seccont1qty=$row[29];$reserve=$row[30];$forcebs=$row[31];$tsymbol=$row[32];

	
	?>

				<h3 class="login1";color:black;">
				<form action="menu.php" method="post" top="120px">
				
					Name: <input readonly type="text" size=10 name="name" value="<?=$name?>">

					TradeClass(0-5LevelTrade, 6+ all-In Trade):
					<input type="text" size=2 name="flag2" value="<?=$flag2?>"><br><br>

					**Mkt_Condition:
					<input type="text" size=5 name="mkt_cond" value="<?=$mkt_cond?>">

					Auto Mkt_cond(0=auto/1=no): 
					<input type="text" size=2 name="m2k" value="<?=$m2k?>">

					Trade Micro (y/n):
					<input type="text" size=2 name="micro" value="<?=$micro?>">

					Number of Contracts:
					<input type="text" size=2 name="contracts" value="<?=$contracts?>"><br>
			
					
					Symbol (ES/NQ):
					<input type="text" size=2 name="tsymbol" value="<?=$tsymbol?>">

					Brokerage Firm like td,ts,cs etc...(td):
					<input type="text" size=2 name="trade" value="<?=$trade?>">

					Password for Web:
					<input type="text" size=10 name="pw" value="<?=$pw?>"><br><br>

					Cell Phone #: 
					<input type="text" size=25 name="ph" value="<?=$ph?>">

					Email:
					<input type="text" size=20 name="email" value="<?=$email?>"><br>

					*Buying Range:(0,35,70)'):
					<input type="text" size=2 name="sprice" value="<?=$sprice?>">

					*Sellying Range:(0,20,70)'):
					<input type="text" size=2 name="spriceout" value="<?=$spriceout?>"><br>

					*Ins Adjustment default=0:
					<input type="text" size=2 name="spriceselldown" value="<?=$spriceselldown?>"><br><br>

					Investment Amount:
					<input type="text" size=10 name="amt" value="<?=$amt?>">

					Adjust Amt:
					<input type="text" size=10 name="rty" value="<?=$rty?>">

					Active (0=enable(Live)/1=disable,-2=Web(Test)):
					<input type="text" size=2 name="active" value="<?=$active?>"><br>

					Force EQ (s=buy,s=sell, h=hold, & n=None):
					<input type="text" size=2 name="forcebs" value="<?=$forcebs?>">

					INS QTY:
					<input type="text" size=2 name="seccontqty" value="<?=$seccontqty?>">

					INS QTY1:
					<input type="text" size=5 name="seccont1qty" value="<?=$seccont1qty?>"><br><br>

					Enter SMSCode for StreetSmart:
					<input type="text" size=2 name="smscode" value="<?=$smscode?>">

					New Token (default=0):
					<input type="text" size=2 name="tk" value="<?=$tk?>"><br>
				
					My rate:
					<input type="text" size=2 name="mmy" value="<?=$mmy?>">

					No Buy after sold(1= yes & 0=use default):
					<input type="text" size=2 name="secbuy" value="<?=$secbuy?>"><br><br>
					
					Save for reserve(%):
					<input type="text" size=2 name="shlevel" value="<?=$shlevel?>">
					
					Reserve$:
					<input type="text" size=5 name="reserve" value="<?=$reserve?>"><br>

					Ins Retire Price at(default=60): 
					<input type="text" size=2 name="shprice" value="<?=$shprice?>">
					Ins ES QTY Adj:  <input type="text" size=2 name="shbuy" value="<?=$shbuy?>">	
					Not use: <input type="text" size=2 name="shqty" value="<?=$shqty?>"><br><br>

					Pivot Contracts:
					<input type="text" size=2 name="rpl" value="<?=$rpl?>"><br><br>

					<input type="submit"> <input type="submit" name="quit" value="Return">
			</form>
			<br>



    <?php

	if (isset($_POST['mkt_cond']))
    {
		//print "dsdsdsdsd111" .$name .$mkt_cond .$flag2."<br>";
		$name=$_POST['name'];
		$flag2=$_POST['flag2']; #tradeclass
		$mkt_cond=$_POST['mkt_cond'];
		$micro=strval($_POST['micro']);
		$contracts=$_POST['contracts'];
		$ph=strval($_POST['ph']);
		$trade=$_POST['trade'];
		$sprice=$_POST['sprice'];
		$spriceout=$_POST['spriceout'];
		$spriceselldown=$_POST['spriceselldown'];
		$amt=$_POST['amt'];
		$active=$_POST['active'];
		$email=$_POST['email'];
		$seccontqty=$_POST['seccontqty'];
		$seccont1qty=$_POST['seccont1qty'];
		//$qty=$_POST['qty'];
		$smscode=$_POST['smscode'];
		$tk=$_POST['tk'];
		$rpl=$_POST['rpl'];
		$mmy=$_POST['mmy'];
		$pw=$_POST['pw'];
		$shprice=$_POST['shprice'];
		$shbuy=$_POST['shbuy'];
		$shlevel=$_POST['shlevel'];
		$secbuy=$_POST['secbuy'];
		$m2k=$_POST['m2k'];
		$rty=$_POST['rty'];
		$reserve=$_POST['reserve'];
		$forcebs=$_POST['forcebs'];
		$tsymbol=strtoupper($_POST['tsymbol']);
	
		


		
		$sql = "update control set shbuy=$shbuy,spriceselldown=$spriceselldown,mkt_cond=$mkt_cond,micro='y',contracts=$contracts,ph='$ph',trade='$trade',spriceout=$spriceout,amt=$amt,email='$email',seccontqty=$seccontqty,seccont1qty=$seccont1qty,smscode=$smscode,active=$active,tk=$tk,secbuy=$secbuy,rpl=$rpl,legs=1,sprice=$sprice,mmy=$mmy,flag2=$flag2,pw='$pw',shprice=$shprice,shlevel=$shlevel,m2k=$m2k,rty=$rty,reserve=$reserve,s2='$forcebs',s1='$tsymbol' where sys='$name';";
		//$sql = "update control set smscode=$smscode,active=$active,tk=$tk,secbuy=$secbuy,rpl=$rpl,buyl3=$buyl3,selll3=$selll3,legs=1,sprice=$sprice,mmy=$mmy,flag2=$flag2 where sys='$name';";
		$rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
		pg_query("COMMIT") or die("Transaction commit failed\n");
		
		//$url="cd.php?name=$name";
		//header("refresh:0; url={$url}");
		header("refresh:0");
	}

	if (isset($_POST['quit']))
	{

            header("Location: menu.php");
	}
	?>
	

	</h3>
	</body>
	</html>
	