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

    
	<canvas id="canvas"></canvas>
    <script>
		// Initiate a canvas instance
		var canvas = new fabric.Canvas("canvas");
		canvas.setWidth(document.body.scrollWidth);
		canvas.setHeight(300);


		// Initiate a textbox object
		var textbox = new fabric.Textbox("Please READ instruction below before upgrade to LIVE trading! This site is under development!!!  Any questions, feel free to contact us at futurex168168@gmail.com", 
        {
			width: 500,
			left: 500,
			top: 70,
			fill: "orange",
			strokeWidth: 2,
            fontSize: 31,
			stroke: "green",
		});

		// Add it to the canvas
		canvas.add(textbox);
	</script>

	<img id="firstimg" src="logox.png"; style="position:absolute;top:5px;left:20px;height:100px;width:100px;border-radius:90px;";/>
    <canvas id1="canvas1"></canvas>
	<script>
		// Initiate a canvas instance
		var canvas1 = new fabric.Canvas("canvas1");
		canvas1.setWidth(document.body.scrollWidth);
		canvas1.setHeight(250);

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
		Enter code from your email: <input type="text" name="code">  <input type="hidden" name="ecode" value=$ecode> <input type="hidden" name="email" value=$email> <input type="hidden" name="ph" value=$ph>
		<?php
	
			print "<input type='hidden' name='email' value=$email/> ";
			print "<input type='hidden' name='password' value=$password/> ";
			print "<input type='hidden' name='ecode' value='$ecode' /> ";

		
		?>
		<input type="submit">
	</form>
	<br>

    <?php
	if (isset($_POST['ecode']))
    {
		$email=$_POST['email'];
		$password=$_POST['password'];
		$ecode=$_POST['ecode'];
		$code=$_POST["code"];
		echo $ecode .$code .$email;
		DateTime();
		RemoteDb();
		
        if ($code==$ecode)
        {
									$id='fx' .strval($ecode);
                                    $sql = "insert into control(status,mkt_cond,spriceout,spriceselldown,micro,contracts,legs,ntoken,seckey,amt,qty,bal,sys,trade,active,rge,mnq,updn,rty,ym,seccont,m2k,secbuy,id,pw1,rpl,buyl3,selll3,pdate,rtoken,sprice,mmy,email,pw) values(0,10,0,'y',1,1,'',0,200000,1,0,0,'td',-2,0,0,0,0,0,0,0,0,$id,0,0,0,$today,'',10,0,$email,$password));";
                                    //$rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 

                                    $sql = "insert into plper(name,dnt,dm,dy,sellp,buyp,per,qty, plamt) values($id,$today,$cm,$cy,0,0,0,0,0));";
                                    //$rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 

                                    $sql = "insert into control(status,mkt_cond,spriceout,spriceselldown,micro,contracts,legs,ntoken,seckey,amt,qty,bal,sys,trade,active,rge,mnq,updn,rty,ym,seccont,m2k,secbuy,id,pw1,rpl,buyl3,selll3,pdate,rtoken,sprice,mmy,email,pw) values(0,10,0,'y',1,1,'',0,200000,1,0,0,'td',-2,0,0,0,0,0,0,0,0,$id,0,0,0,$today,'',10,0,$email,$password));";
                                    //$rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
                                    
                                    $id="acw";
                                    $url=$url ."client.php?name=$id";
                                    header("Location: $url");
		}
		else 
		{
	
				print "Invalid Code - Please go back and try again";
				sleep(1);
				$url=$url ."index.php";
                //header("Location: $url");

        }
	
	}
	?>
	

	</h3>
	</body>
	</html>