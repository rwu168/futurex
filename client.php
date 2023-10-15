<!DOCTYPE html>
<html>
<head>

<style>body {font-family: Arial, Helvetica, sans-serif; font-size: 16px;}</style>
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
.login {
  position: fixed;
  width: 70px;
  margin: auto;
  height: 275px;
  width: 25%;
  top: 100px;
  background-color: lightgrey;
  border: 3px solid #73AD21;
  color: black;
}

.tot {
  position: fixed;
  width: 60px;
  left: 5px;
  height: 40px;
  width: 20%;
  top: 360px;
  border: 3px solid #73AD21;
  color: black;
  
}


.ytd{
  position: fixed;
  width: 600px;
  left: 5px;
  height: 20px;
  width: 50%;
  top: 470px;
  background-color: lightyellow;
  border: 3px solid #73AD21;
  color: black;
}

.data {
  position: fixed;
  width: 300px;
  left: 5px;
  height: 20px;
  width: 50%;
  top: 530px;
  background-color: lightyellow;
  border: 3px solid #73AD21;
  color: black;
}

.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  top:550px;
}
</style>

<body>


	<canvas id="canvas"></canvas>
	<script>
		// Initiate a canvas instance
		var canvas = new fabric.Canvas("canvas");
		canvas.setWidth(document.body.scrollWidth);
		canvas.setHeight(400);

		// Initiate a textbox object
   
        $act=2;

        if ($act == 0)
        {
            $status="[STATUS]: Account in Live Trading";
        }
        if ($act == 1)
        {
            $status="[STATUS]: Account in Paper Money trading. Ready for Real Live Trade - Click Upgrade button - any questions, please contact us at futurex168168@gmail.com";
        }
        if ($act == 2)
        {
            $status="[STATUS]: Test Trading Expired .... any questions, please contact us at futurex168168@gmail.com";
        }
        if ($act == 3)
        {
            $status="[STATUS]: Invalid TD Ameritrade User name or Password - please contact us at futurex168168@gmail.com";
        }
        if ($act == 4)
        {
            $status="[STATUS]: Account missing secondary phone#.  Please add this #626-353-3808 to allow access - any questions, please contact us at futurex168168@gmail.com";
        }
        if ($act == 5)
        {
            $status="[STATUS]: Account waiting for Future Trading approve by TD Ameritrade (take 2-3 business days after your applied)  - Any questions,please contact us at futurex168168@gmail.com";
        }


		var textbox = new fabric.Textbox($status, 
        {
			width: 510,
			left: 500,
			top: 40,
			fill: "orange",
			strokeWidth: 2,
			stroke: "green",
		});

		// Add it to the canvas
		canvas.add(textbox);
	</script>


    <canvas id1="canvas1"></canvas>
	<script>
		// Initiate a canvas instance
		var canvas1 = new fabric.Canvas("canvas1");
		canvas1.setWidth(document.body.scrollWidth);
		canvas1.setHeight(250);

		// Initiate a textbox object
		var textbox = new fabric.Textbox("TradeXinvestment.com", 
        {
			width: 550,
			left: 100,
			top: 40,
			fill: "red",
			strokeWidth: 2,
			stroke: "red",
		});

		// Add it to the canvas
		canvas.add(textbox);
	</script>

   
	

<!//opacity=transparency>
<!div id="button" class="fourth" onmouseover="this.style.opacity='0.4';this.style.width='140px'" 
onmouseout="this.style.opacity='1';this.style.width='120px';
<!//calling function
Onclick=topaction();">



<img id="firstimg" src="logox.png"; style="position:absolute;top:5px;left:20px;height:100px;width:100px;border-radius:90px;";/>




<body>

    
    <?php
        /* =========Color and letter size=======================*/
		$sec = date('s');
		$colorArray = array('blue', 'green', 'red', 'maroon', 'gray');
		$colorIndex = $sec % 1;

		/*print '<h1 style="color: '.$colorArray[$colorIndex].';">Hello World</h1>';*/
	?>

    
    <?php
        /*=================date & time function=========================*/
        function DateTime()
        {   
            global $today;
		    $today = date('Y-m-d');
		    print "<p><b>Today is $today </b></p>";

		    $time = date('h:g:s');
		    echo "<p><b>and the Time is $time </b></p>";

        }
	?>

    <?php
        /*======================validateion function===============================*/
        function ValEntry()
        { 
            global $name,$comments;

            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {

                $name = $_POST['firstname'];
                if (empty($name)) 
                {
                    echo "Name is empty";
                } 
                else 
                {
                    echo $name;
                }
                $comments = $_POST['comments'];
		        print "<p>Congratulations $name</p>";
		        print $comments;
            }
        }
    ?>
    
    <?php
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
    /*=================Display YTD P/L==================================*/
        function disp_ytd($conn,$name)
        {
                global $data;

                $fmt = new NumberFormatter("en_US",  NumberFormatter::CURRENCY);
                $sql = "SELECT  jan1,feb1,mar1,apr1,may1,jun1,jul1,aug1,sep1,oct1,nov1,dec1 FROM plapr where name='$name';";
          
                //$sql = "SELECT bal,sys,email,ph FROM control limit 4;";
          
                $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
                $row=pg_fetch_row($rs);
                $rowcount= pg_num_rows($rs);
                $k=1;

                //print "testttttttt" .$row[9];

       
                while ($k<=$rowcount)
                {
                    $data=array(round($row[0],5),round($row[1],5),round($row[2],5),round($row[3],5),round($row[4],5),round($row[5],5),round($row[6],5),round($row[7],5),round($row[8],5),round($row[9],5),round($row[10],5),round($row[11],5),);
                    //$data=array(21,22,36,21,25.20,25.20,20.40,16.80,4.33,round($row[9],5),round($row[10],5),round($row[11],5),);

                    $row=pg_fetch_row($rs);
                    $k++;
                    
                }
           
    ?>
                <table  class="ytd" bgcolor="lightblue" width="20px" height="10px" color="red">

                 <tr>
                            <th>Jan</th>
                            <th>Feb</th>
                            <th>Mar</th>
                            <th>Apr</th>
                            <th>May</th>
                            <th>Jun</th>
                            <th>Jul</th>
                            <th>Aug</th>
                            <th>Sep</th>
                            <th>Oct</th>
                            <th>Nov</th>
                            <th>Dec</th>    
                           
                            
                </tr>

                <?php
                    $max_columns=12;
                    $record_id=0;
                    //$data=array(1,2,3,4,5,6,7,8,round($data[9],5),10,11,12);
                    //print "test...." .$data[0] . " second...." .round($data[9],3);
                    while(True)
                    {
                        for ($columns=0;$columns<$max_columns;$columns++)
                        {
                            if (!isset($data[$record_id]))
                            {
                                return;
                            }
                    
                            if ($columns==0)
                            {
                                echo "<tr>";
                            }
                    
                ?>

                            <td valign="top" bgcolor="lightblue" width="20px" height="10px" color="red" >
                         
                            <?php 
                                $usd = $fmt->formatCurrency($data[$record_id], "USD");
                                echo $usd ?>
                                </td>
                            <?php
                        
                            if ($columns==$max_columns)
                            {
                                echo "<tr>";
                            }
                            $record_id++;
                            ?>

        <?php
               

                        }
                    }
                    
           
        ?>
    </table>
    <?php
        }
           
    ?>

    
     <?php
    /*=================Display detail of trading activities==================================*/
        function disp_detail($conn,$name)
        {
                $fmt = new NumberFormatter("en_US",  NumberFormatter::CURRENCY);
                $sql = "SELECT dnt,plamt,sellp,buyp,qty FROM plper where name='$name' order by dnt desc limit 4;";

                //$sql = "SELECT bal,sys,email,ph FROM control where sys='py' limit 4;";

                $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
                $row=pg_fetch_row($rs);
                $rowcount= pg_num_rows($rs);
                $k=1;
                $data=array();
                //print "testttttttt" .$row[0];
                while ($k<=$rowcount)
                {
                    $data=array_merge($data,array($row[0],round($row[1],5),$row[2],$row[3],$row[4]));
                    $row=pg_fetch_row($rs);
                    $k++;
 

                }
                
    ?>
                <table  class="data" bgcolor="lightblue" width="20px" height="10px" color="red">

                 <tr>
                            <th>Date & time</th>
                            <th>Profit this trade</th>
                            <th>Sold at</th>
                            <th>Brought at</th>
                            <th>MES Position sold</th>
                           
                            
                </tr>

                <?php
                    $max_columns=5;
                    $record_id=0;
                    
                    //$data=array("10/11/2023 11:30am", "0.0078%","4430.25", "4410.50","1");
                    while(True)
                    {
                        for ($columns=0;$columns<$max_columns;$columns++)
                        {
                            if (!isset($data[$record_id]))
                            {
                                return;
                            }
                    
                            if ($columns==0)
                            {
                                echo "<tr>";
                            }
                    
                ?>

                            <td valign="top" bgcolor="lightblue" width="20px" height="10px" color="red" >
                         
                            <?php 
                                if ($columns==1)
                                {
                                    $usd = $fmt->formatCurrency($data[$record_id], "USD");
                                    echo $usd;
                                }
                                else 
                                {
                                        echo $data[$record_id]; 
                                }
                                ?>

                                </td>
                             <?php
                        
                             if ($columns==$max_columns)
                                {
                                    echo "<tr>";
                             }
                             $record_id++;
                             ?>

        <?php
               
                        
                            }
                            if (!isset($data[$record_id]))
                            {
                                print "<br><font color='red'>Real LIVE trading activities below: </font>"; 
                            }
                        }

    ?>
           
        ?>
    </table>
    <?php
    }
           
    ?>


    <?php RemoteDb();  ?> 
 
   
    <h2 class="login";color:black;>Real Time Account Info
 
        <?php
                $usd = 100000;
                
                $fmt = new NumberFormatter("en_US",  NumberFormatter::CURRENCY);
                $usd = $fmt->formatCurrency($usd, "USD");
	            print "<table> ";

	            print "<tr> ";
	                print "<td>Investment Amount: $usd <td> <size='25' /><br /> ";
	            print "</tr> ";

	            print "<tr> ";
                    $usd=1000.25;
                    $usd = $fmt->formatCurrency($usd, "USD");
	                print "<td>Unajusted Profit &nbsp;&nbsp;&nbsp;&nbsp: $usd <td> <size='25' /><br /> ";
	            print "</tr> ";

                print "<tr> ";
                    $usd=10000.25;
                    $usd = $fmt->formatCurrency($usd, "USD");
	                print "<td>Unrealized P/L &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp: $usd <td> <size='25' /><br /> ";
	            print "</tr> ";

                print "<tr> ";
                    $qty=5;
	                print "<td>Holding Positions &nbsp: $qty <td> <size='25' /><br /> ";
	            print "</tr> ";

                print "<tr> ";
                    $usd=1000000.25;
                    $usd = $fmt->formatCurrency($usd, "USD");
	                print "<td>Avaiable Cash &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp: $usd <td> <size='25' /><br /> ";
	            print "</tr> ";

                print "<tr> ";
                    $usd=1000000.25;
                    $usd = $fmt->formatCurrency($usd, "USD");
	                print "<td>Account Balance &nbsp;&nbsp: $usd <td> <size='25' /><br /> ";                   
	            print "</tr> ";

               
?>
                

                <button></button>
                <a href="http://localhost:8080/futurexweb/form_input1.php" class="button">Upgrade</a>

<?php
                /*
                print "<tr> ";
	            print "<td>Comments:</td><td><input type='textarea' name='comments' rows='7' cols='50' /></td> ";
	            print "</tr> ";
                */
	            print "</table> ";




          ?>
    </h2>


    <h3 class="tot"> 
    <?php
        $name=$_GET['name'];
        disp_ytd($conn,$name);
        disp_detail($conn,$name);
        $k=0;
        
        
    ?>
    </h3>


</body>
</html>
