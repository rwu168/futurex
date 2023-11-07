<!DOCTYPE html>
<html>
<head>
<body>
<?php
		error_reporting(E_ERROR | E_PARSE);
		$email=$_GET['email'];
		$pw=$_GET['pw'];
		$ecode=$_GET['ecode'];
		//echo "     dsdsdsds" .$ecode .$email .$pw;
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
  width: 30px;
  margin: auto;
  height: 210px;
  width: 27%;
  top: 120px;
  background-image: url("htech1.png");
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
	<img id="firstimg" src="logox.png"; style="position:absolute;top:5px;left:20px;height:100px;width:100px;border-radius:90px;";/>
    
	<canvas id="canvas"></canvas>
    <script>
		// Initiate a canvas instance
		var canvas = new fabric.Canvas("canvas");
		canvas.setWidth(document.body.scrollWidth);
		canvas.setHeight(500);


		// Initiate a textbox object
		var textbox = new fabric.Textbox("AlgoXinvestment.com", 
        {
			width: 550,
			left: 90,
			top: 45,
			fill: "red",
			strokeWidth: 2,
			stroke: "red",
		});

		// Add it to the canvas
		canvas.add(textbox);
	</script>



	

	 <h3 class="login1";color:black;">
	<form action="site.php" method="post" top="120px">
		Enter code from your email: <input type="text" name="code">  
				<input type="hidden" name="ecode" value=$ecode> 
				<input type="hidden" name="email" value=$email> 
				<input type="hidden" name="pw" value=$pw>
		<?php
	
			print "<input type='hidden' name='email' value=$email /> ";
			print "<input type='hidden' name='pw' value=$pw /> ";
			print "<input type='hidden' name='ecode' value=$ecode /> ";

		
		?>
		<input type="submit"><br>
		Not receive email, check your junk mail.
	</form>
	<br>

    <?php
	if (isset($_POST['ecode']))
    {
		$email=$_POST['email'];
		$pw=$_POST['pw'];
		$ecode=$_POST['ecode'];
		$code=$_POST["code"];
		echo $code .$pw .$ecode .$email;
		DateTime();
		RemoteDb();
		
        if ($code==$ecode)		
        {
									$sql = "SELECT id1 FROM control order by id1 desc;";
                                    $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
                                    $row=pg_fetch_row($rs);

									$id='fx' .strval($ecode) .strval($row[0]);
									$sql = "INSERT INTO control(status,mkt_cond,spriceout,spriceselldown,micro,contracts,legs,ntoken,seckey,amt,qty,bal,sys,trade,active,rge,mnq,updn,rty,ym,seccont,m2k,secbuy, pw1,rpl,buyl3,selll3,rtoken, sprice,mmy,pw,email,pdate,nq,id,rate1,flag2,shlevel,s1) values(0,1,20,0,'y',1,1,'0','0',200000,0,0,'$id','td',-2,0,0,0,0,0,0,0,0,'0',0,0,0,'0',10,0,'$pw','$email','$today',0,'',0,1,10,'ES');";
                                    $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 

                                    $sql = "INSERT INTO plper(name,dnt,dm,dy,sellp,buyp,per,qty, plamt) values('$id','$today','$cm','$cy',0,0,0,0,0);";
                                    $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
									pg_query("COMMIT") or die("Transaction commit failed\n");
                                    //$id="acw";
                                    $url=$url ."client.php?name=$id";
                                    header("Location: $url");
		}
		else 
		{
				//echo $pw .$ecode .$code .$email;
				print "Invalid Code - Please go back and try again";
				sleep(1);
				$url=$url ."index.php";
                header("Location: $url");

        }
	
	}
	?>
	

	</h3>
	</body>
	</html>